<?php

namespace App\Http\Controllers;

use App\Mail\FreeConsultation;
use App\Models\FormSpreadSheet;
use App\Models\PrefectureMaster;
use App\Models\TaxAccountantList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use HubSpot\Client\Crm\Contacts\ApiException;
use HubSpot\Client\Crm\Contacts\Model\SimplePublicObjectInput;
use DateTime;
use DateTimeZone;


class MitsukaruController
{
    public function index(Request $request)
    {
        $user_agent = $request->header('User-Agent');
        if ((strpos($user_agent, 'iPhone') !== false)
            || (strpos($user_agent, 'iPod') !== false)
            || (strpos($user_agent, 'Android') !== false)) {
            $device = 'mobile';
        } else {
            $device = 'pc';
        }

        // 現在のUTC日時を取得
        $utcDateTime = new DateTime('now', new DateTimeZone('UTC'));
        // 日本時間のタイムゾーンをセット
        $utcDateTime->setTimezone(new DateTimeZone('Asia/Tokyo'));

        if ($request->has('action') && $request->action == 'consultation_mail') {

            DB::beginTransaction();
            try {
                $params = [
                    'firstname' => $request->firstname,
                    'lastname' => $request->lastname,
                    'email' => $request->email,
                    'tel' => $request->tel,
                    'place' => $request->place,
                    'birthyear' => ($request->age == 1) ? 0 : $request->age,
                    'experience' => $request->experience,
                    'employment_status' => $request->employment_status,
                    'src' => $request->src
                ];

                $email = $request->email;
                $this->postHubspot($request);

                $env = config('environment.env');
                if ($env == 'develop') {
                    // 開発用の送り先
                    $company_mail = 'greentea.4k@gmail.com';
                }else{
                    //本番用の送り先
                    $company_mail = 'agent@mitsukaru-jpn.com';
                }

                //問い合わせた人用
                Mail::send('taxmitsukaru.mails.done_lp_contact', [
                    'firstname' => $request->firstname,
                    'lastname' => $request->lastname,
                ], function ($message) use ($email) {
                    $message->to($email)
                        ->subject('お問合せが完了しました');
                });

                //会社側用
                Mail::to($company_mail)
                    ->bcc('moncson@gmail.com')
                    ->bcc('cocoa2647@gmail.com')
                    ->bcc('k-yokoo@hion-tech.com')
                    ->send(new FreeConsultation($params));

                DB::commit();
            } catch (\Exception $e) {
                DB::rollback();
                echo $e->getMessage();
                exit();
            }

            // スプレッドシート連携処理
            $spread_sheet = new FormSpreadSheet();
            try {
                $this->src = $request['src'];
                $title = '【MITSUKARU】無料相談（フォームからの連携）';
                if (preg_match('/facebook/', $this->src) || preg_match('/fbclid/', $this->src)) $title = '【facebook】' . $title;
                elseif (preg_match('/sms/', $this->src)) $title = '【SMS】' . $title;
                elseif (preg_match('/email/', $this->src) || preg_match('/utm_source=hs_email/', $this->src)) $title = '【メルマガ】' . $title;

                $insert_data = [
                    'title' => strval($title),
                    'name' => strval($request->lastname) . ' ' . strval($request->firstname),
                    'mail_address'  => strval($request->email),
                    'phone_number' => strval($request->tel),
                    'area' => strval($request->place),
                    'age' => $request->age == 1 ? '未回答':strval($request->age),
                    'cv_date' => strval($utcDateTime->format('Y-m-d')),
                    'cv_time' => strval($utcDateTime->format('H:i:s')),
                    'p' => '',
                    'license' => '',
                    'career' => strval($request->experience),
                    'management_experience' => '',
                    't' => '',
                    'env' => strval($request->employment_status),
                    'charge_number' => '',
                    'annual_sales' => '',
                    'yearly_income' => '',
                    'plus_3' => '',
                    'text_form' => '',
                ];

                $spread_sheet->insert_spread_sheet($insert_data);

            } catch (\Exception $e) {

            }

            return redirect('/mitsukaru-taxtennsyoku/thanks')->with('flash_message', 'お問合せが完了しました。');
        }

        return view('taxmitsukaru/top/index', [
            'device' => $device,
            'prefectures' => PrefectureMaster::all(),
            'company_list' => TaxAccountantList::all(),
        ]);
    }

    public function thanks(Request $request)
    {
        $user_agent = $request->header('User-Agent');
        if ((strpos($user_agent, 'iPhone') !== false)
            || (strpos($user_agent, 'iPod') !== false)
            || (strpos($user_agent, 'Android') !== false)) {
            $device = 'mobile';
        } else {
            $device = 'pc';
        }

        return view('taxmitsukaru/top/thanks', [
            'device' => $device,
        ]);
    }

    public function postHubspot($request)
    {
        $apiKey = 'pat-na1-14185715-8c19-4f6a-8111-dbac1b4ed819';
        $hubspot = \HubSpot\Factory::createWithAccessToken($apiKey);
        $diagnose_type = '職場LP';
        if (preg_match('/utm_source=facebook/', $request->src) || preg_match('/fbclid/', $request->src)) $channel = 'Facebook広告';
        elseif (preg_match('/utm_source=sms/', $request->src)) $channel = 'SMS';
        elseif (preg_match('/utm_source=email/', $request->src) || preg_match('/utm_source=hs_email/', $request->src)) $channel = 'メルマガ';
        else $channel = '';

        $properties1 =
            [
                'diagnose_type' => $diagnose_type,
                'state' => $request->place,
                'lastname' => $request->lastname,
                'firstname' => $request->firstname,
                'mobilephone' => $request->tel,
                'email' => $request->email,
                'experience' => $request->experience,
                'birth_year' => ($request->age == 1) ? 0 : $request->age, // 選択項目の確認必須
                'channel' => $channel, // 選択項目の確認必須
                'response' => strtotime(date('Y/m/d 00:00:00', strtotime('now -9h'))) . '000', // ミリ秒の timestamp の型で登録可能
                'leadsource' => 'leadsource_inquiry'
            ];

        $simplePublicObjectInput = new SimplePublicObjectInput([
            'properties' => $properties1,
        ]);

        try {
            $apiResponse = $hubspot->crm()->contacts()->basicApi()->create($simplePublicObjectInput);
            return [true, "Success basic_api->create"];
        } catch (ApiException $e) {
            $errorMessage = $e->getMessage();
            // エラーメッセージが "Contact already exists. Existing" を含まない場合のみメールを送信する
            if (strpos($errorMessage, "Contact already exists. Existing") === false) {
                Mail::send([], [], function ($message) use ($errorMessage) {
                    $message->to('k-yokoo@hion-tech.com')
                        ->to('cocoa2647@gmail.com')
                        ->to('8wakawo@gmail.com')
                        ->subject('HubSpot連携エラーメッセージ')
                        ->setBody($errorMessage);
                });
            }
            return false;
        }
    }

}
