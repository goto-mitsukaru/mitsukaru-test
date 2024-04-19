<?php

namespace App\Http\Controllers;

use App\Jobs\NennsyuJob;
use App\Models\FormSpreadSheet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\NennsyuContactMail;
use App\Mail\NennsyuCompanyMail;
use App\Mail\NennsyuContactMailNew;
use App\Mail\NennsyuCompanyMailNew;
use App\Mail\TennsyokuContactMail;
use App\Mail\TennsyokuCompanyMail;
use App\Mail\BlackContactMail;
use App\Mail\BlackCompanyMail;
use App\Mail\BlackContactMailNew;
use App\Mail\BlackCompanyMailNew;
use Illuminate\Support\Facades\Validator;
use HubSpot\Client\Crm\Contacts\ApiException;
use HubSpot\Client\Crm\Contacts\Model\SimplePublicObjectInput;
use App\Mail\SendLpController;
use DateTime;
use DateTimeZone;


class MailController extends Controller
{
    private $career_array = [
        '未経験',
        '1年未満',
        '1～4年',
        '5～7年',
        '8年以上',
        '未経験(経理経験あり)',
    ];

    private $career_income = [
        0,
        20,
        30,
        40,
        50,
        10,
    ];

    private $yearly = [
        '400万円未満' => 453,
        '400～500万円未満' => 543,
        '500～600万円未満' => 673,
        '600～700万円未満' => 763,
        '700～800万円未満' => 831,
        '800～900万円未満' => 924,
        '900～1000万円未満' => 1132,
        '1000万円以上' => 1165,
    ];

    public function send(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'lastname' => 'required',
            'firstname' => 'required',
            'mail_address' => 'required',
        ]);

        // 現在のUTC日時を取得
        $utcDateTime = new DateTime('now', new DateTimeZone('UTC'));
        // 日本時間のタイムゾーンをセット
        $utcDateTime->setTimezone(new DateTimeZone('Asia/Tokyo'));

        if ($this->hasReCaptchaError($request)) {
            return redirect()->back()->withInput($request->all())->with('isRecaptchaError', true);
        } else {
            if ($id == 1) {
                if ($validator->fails()) {
                    return redirect('nennsyushinndann/')
                        ->withErrors($validator)
                        ->withInput($request->all());
                } else {
                    $result = $this->postHubspot($request, $id);
                    // var_dump($result);
                    Mail::send(new NennsyuContactMail($request));
                    Mail::send(new NennsyuCompanyMail($request));

                    // スプレッドシート連携処理
                    $spread_sheet = new FormSpreadSheet();
                    try {
                        $this->src = $request['src'];
                        $title = '年収診断問い合わせ（フォームからの連携）';
                        if (preg_match('/facebook/', $this->src) || preg_match('/fbclid/', $this->src)) $title = '【facebook】' . $title;
                        elseif (preg_match('/sms/', $this->src)) $title = '【SMS】' . $title;
                        elseif (preg_match('/email/', $this->src) || preg_match('/utm_source=hs_email/', $this->src)) $title = '【メルマガ】' . $title;

                        $career = $this->career_income[$request->career];
                        $yearly = $this->yearly[$request->yearly_income[0]];
                        $over = $request->yearly_income[0] == '1000万円以上';

                        if ($over)
                            $amount = ($yearly + $career) . '〜' . (2500 + $career) . '万円';
                        else
                            $amount = ($yearly + $career) . '万円';

                        $insert_data = [
                            'title' => strval($title),
                            'name' => strval($request->lastname) . ' ' . strval($request->firstname),
                            'mail_address' => strval($request->mail_address),
                            'phone_number' => strval($request->phone_number),
                            'area' => implode(', ', $request->region),
                            'age' => $request->age == 1 ? '未回答' : strval($request->age),
                            'cv_date' => strval($utcDateTime->format('Y-m-d')),
                            'cv_time' => strval($utcDateTime->format('H:i:s')),
                            'p' => strval($amount),
                            'license' => implode(', ', $request->license),
                            'career' => strval($this->career_array[$request->career]),
                            'management_experience' => implode(', ', $request->management_experience),
                            't' => '',
                            'env' => implode(', ', $request->env),
                            'charge_number' => implode(', ', $request->charge_number),
                            'annual_sales' => implode(', ', $request->annual_sales),
                            'yearly_income' => implode(', ', $request->yearly_income),
                            'plus_3' => '財務コンサル：' . strval($request->plus_finance_consulting) . ' 相続：' . strval($request->plus_inheritance) . ' その他：' . strval($request->plus_others),
                            'text_form' => strval($request->text_form),
                        ];

                        $spread_sheet->insert_spread_sheet($insert_data);

                    } catch (\Exception $e) {

                    }

                    // return redirect('nennsyushinndann/thanks')->with('name', $request->lastname . ' ' . $request->firstname);
                }

            } else if ($id == 2) {
                if ($validator->fails()) {
                    return redirect('tennsyokusinndann/')
                        ->withErrors($validator)
                        ->withInput($request->all());
                } else {
                    $this->postHubspot($request, $id);
                    Mail::send(new TennsyokuContactMail($request));
                    Mail::send(new TennsyokuCompanyMail($request));

                    // スプレッドシート連携処理
                    $spread_sheet = new FormSpreadSheet();
                    try {
                        $this->src = $request['src'];
                        $title = '職場診断問い合わせ（フォームからの連携）';
                        if (preg_match('/facebook/', $this->src) || preg_match('/fbclid/', $this->src)) $title = '【facebook】' . $title;
                        elseif (preg_match('/sms/', $this->src)) $title = '【SMS】' . $title;
                        elseif (preg_match('/email/', $this->src) || preg_match('/utm_source=hs_email/', $this->src)) $title = '【メルマガ】' . $title;

                        $insert_data = [
                            'title' => strval($title),
                            'name' => strval($request->lastname) . ' ' . strval($request->firstname),
                            'mail_address' => strval($request->mail_address),
                            'phone_number' => strval($request->phone_number),
                            'area' => implode(', ', $request->region),
                            'age' => $request->age == 1 ? '未回答' : strval($request->age),
                            'cv_date' => strval($utcDateTime->format('Y-m-d')),
                            'cv_time' => strval($utcDateTime->format('H:i:s')),
                            'p' => '',
                            'license' => implode(', ', $request->license),
                            'career' => strval($this->career_array[$request->career]),
                            'management_experience' => '',
                            't' => '',
                            'env' => '',
                            'charge_number' => '',
                            'annual_sales' => '',
                            'yearly_income' => '',
                            'plus_3' => '',
                            'text_form' => strval($request->text_form),
                        ];

                        $spread_sheet->insert_spread_sheet($insert_data);


                    } catch (\Exception $e) {

                    }

                    return redirect('tennsyokusinndann/thanks');
                }

            } else if ($id == 3) {
                if ($validator->fails()) {
                    return redirect('blacksinndann/')
                        ->withErrors($validator)
                        ->withInput($request->all());
                } else {
                    $this->postHubspot($request, $id);
                    Mail::send(new BlackContactMail($request));
                    Mail::send(new BlackCompanyMail($request));

                    // スプレッドシート連携処理
                    // $spread_sheet = new FormSpreadSheet();
                    // try {
                    //     $this->src = $request['src'];
                    //     $title = 'ブラック診断問い合わせ（フォームからの連携）';
                    //     if (preg_match('/facebook/', $this->src) || preg_match('/fbclid/', $this->src)) $title = '【facebook】' . $title;
                    //     elseif (preg_match('/sms/', $this->src)) $title = '【SMS】' . $title;
                    //     elseif (preg_match('/email/', $this->src) || preg_match('/utm_source=hs_email/', $this->src)) $title = '【メルマガ】' . $title;

                    //     $insert_data = [
                    //         'title' => strval($title),
                    //         'name' => strval($request->lastname) . ' ' . strval($request->firstname),
                    //         'mail_address' => strval($request->mail_address),
                    //         'phone_number' => strval($request->phone_number),
                    //         'area' => $request->region == 1 ? '未回答' : strval($request->region),
                    //         'age' => $request->age == 1 ? '未回答' : strval($request->age),
                    //         'cv_date' => strval($utcDateTime->format('Y-m-d')),
                    //         'cv_time' => strval($utcDateTime->format('H:i:s')),
                    //         'p' => '',
                    //         'license' => 'ブラック度：' .array_sum($request->score). '％' ,
                    //         'career' => strval($this->career_array[$request->career]),
                    //         'management_experience' => in_array("転職したいが、その時間が取れない", $request->my_situation) ? '転職したいが、その時間が取れない' : '',
                    //         't' => '',
                    //         'env' => '',
                    //         'charge_number' => '',
                    //         'annual_sales' => '',
                    //         'yearly_income' => '',
                    //         'plus_3' => '',
                    //         'text_form' => strval($request->text_form),
                    //     ];
                    //     $spread_sheet->insert_spread_sheet($insert_data);
                    // } catch (\Exception $e) {
                    // }
                    return redirect('blacksinndann/thanks')->with('name', $request->lastname . ' ' . $request->firstname);
                }
            } else if ($id == 4) {
                $validator = Validator::make($request->all(), [
                    'お名前' => 'required',
                    'メールアドレス' => 'required',
                ]);
                if ($validator->fails()) {
                    return redirect('/store/test/step.php')
                        ->withErrors($validator)
                        ->withInput($request->all());
                } else {
                    $result = $this->postHubspot($request, $id);
                    echo('result：');
                    var_dump($result);
                    Mail::send(new NennsyuContactMailNew($request));
                    Mail::send(new NennsyuCompanyMailNew($request));
                    return redirect('/nennsyushinndann/thanks.html');
                }
            } else if ($id == 5) {
                $validator = Validator::make($request->all(), [
                    'firstname' => 'required',
                    'email' => 'required',
                ]);
                if ($validator->fails()) {
                    return redirect('blacksinndann/')
                    ->withErrors($validator)
                        ->withInput($request->all());
                } else {
                    $result = $this->postHubspot($request, $id);
                    // echo('result：');
                    // var_dump($result);
                    Mail::send(new BlackContactMailNew($request));
                    Mail::send(new BlackCompanyMailNew($request));
                    return redirect('/blacksinndann/thanks.html');
                }
            }
        }
    }

    public function postHubspot($request, $id){
        // 開発環境では送信されない
//        $env = config('environment.env');
//        if ($env == 'develop') {
//            return false;
//        }
        $apiKey = 'pat-na1-14185715-8c19-4f6a-8111-dbac1b4ed819';
        $hubspot = \HubSpot\Factory::createWithAccessToken($apiKey);
        $diagnose_type = [
            '',
            '年収診断',
            '転職診断',
            'ブラック企業診断',
            '年収診断',
            'ブラック企業診断',
        ];
        $contents_type = [
            '',
            '年収診断',
            '職場診断',
            'ブラック診断',
            '年収診断',
            'ブラック診断',
        ];
        $years_experience = [
            'years_inexperienced',
            'years_zero',
            'years_one',
            'years_five',
            'years_seven',
        ];
        if (preg_match('/facebook/', $request->src) || preg_match('/fbclid/', $request->src)) $channel = 'Facebook広告';
        elseif (preg_match('/sms/', $request->src) || preg_match('/utm_source=hs_sms/', $request->src)) $channel = 'SMS';
        elseif (preg_match('/email/', $request->src) || preg_match('/utm_source=hs_email/', $request->src)) $channel = 'メルマガ';
        else $channel = '';

        if ($id == 5) {
            // $skillArray = [
            //     '税理士' => 'skill_zeirishi',
            //     '税理士未登録' => '税理士未登録',
            //     '公認会計士' => 'skill_cpa',
            //     '科目合格者' => 'skill_Subjectpasser',
            //     '簿記2級' => 'skill_bokinikyu',
            //     'その他' => 'skill_others',
            // ];
            // $skill = '';
            // if ($request->license) {
            //     foreach ($request->license as $item) {
            //         $skill .= $skillArray[$item] . ';';
            //     }
            // }
            $properties1 =
                [
                    'diagnose_type' => $diagnose_type[$id],
                    'state' => $request->region,
                    'motivation' => strpos($request->my_situation, "転職したいが、その時間が取れない") ? '転職したいが、その時間が取れない' : '',
                    'firstname' => $request->firstname,
                    'mobilephone' => $request->phone_number,
                    'email' => $request->email,
                    'years_experience' => $years_experience[$request->career],
                // 'birth_year' => ($request->age == 1) ? 0 : $request->age, // 選択項目の確認必須
                'birthyear' => $request->input('age'), // 選択項目の確認必須
                    'channel' => $channel ?? '', // 選択項目の確認必須
                    // 'message' => $request->text_form ?? '',
                    'response' => strtotime(date('Y/m/d 00:00:00', strtotime('now -9h'))) . '000', // ミリ秒の timestamp の型で登録可能
                    'leadsource' => 'leadsource_inquiry',
                    'toc_tob___' => '【toC】メールアドレスあり',
                    'contents_history' => $contents_type[$id],
                    'first_contact' => $contents_type[$id],
                ];
        } else if ($id == 4) {
            $skillArrayNew = [
                '税理士(登録済み)' => 'skill_zeirishi',
                '税理士(未登録)' => '税理士未登録',
                '公認会計士' => 'skill_cpa',
                '科目合格者' => 'skill_Subjectpasser',
                '日商簿記2級' => 'skill_bokinikyu',
                'その他' => 'skill_others',
            ];
            $skill = '';
            if ($request->input('現在の資格')) {
                $inputString = $request->input('現在の資格');
                $inputString = str_replace(' ', '', $inputString); // 半角スペースを削除する
                // dd($inputString);
                $array = explode(',',$inputString);
                foreach ($array as $item) {
                    $skill .= $skillArrayNew[$item] . ';';
                }
                // dd($skill);
            }
            // hub spot用プロパティ
            $properties1 =
                [
                    'diagnose_type' => $diagnose_type[$id],
                    'motivation' => $request->reason,
                    'state' => $request->input('prefecture'),
                    // 'number_of_advisors' => $request->input('担当件数'),
                    'nn' => $request->input('担当件数'),
                    'annual_sales' => $request->input('年間売上'),
                    'skill' => $skill, // 選択項目の確認必須
                'n2233' => $request->yearly_income ? $request->yearly_income : '',
                    'management' => $request->input('マネジメント経験'),
                    'financial_consulting' => $request->input('財務コンサル'),
                    'inheritance' => $request->input('相続'),
                    'added_value_others' => $request->input('その他'),
                    'lastname' => $request->input('お名前'),
                    'mobilephone' => $request->input('携帯電話番号'),
                    'email' => $request->input('メールアドレス'),
                    'years_experience' => $years_experience[$request->career],
                'birthyear' => $request->input('year'),
                    'channel' => $channel ?? '', // 選択項目の確認必須
                    'message' => $request->text_form ?? '',
                    'response' => strtotime(date('Y/m/d 00:00:00', strtotime('now -9h'))) . '000', // ミリ秒の timestamp の型で登録可能
                    'leadsource' => 'leadsource_inquiry',
                    'toc_tob___' => '【toC】メールアドレスあり',
                    'contents_history' => $contents_type[$id],
                    'first_contact' => $contents_type[$id],
                    //                    'working_environment' => $env
                ];
        } else if ($id !== 3) {
            $skillArray = [
                '税理士' => 'skill_zeirishi',
                '税理士未登録' => '税理士未登録',
                '公認会計士' => 'skill_cpa',
                '科目合格者' => 'skill_Subjectpasser',
                '簿記2級' => 'skill_bokinikyu',
                'その他' => 'skill_others',
            ];
            $skill = '';
            if ($request->license) {
                foreach ($request->license as $item) {
                    $skill .= $skillArray[$item] . ';';
                }
            }
            // 問9
            $env = '';
            if ($request->env) {
                foreach ($request->env as $item) {
                    $env .= $item . ', ';
                }
            }
            $properties1 =
                [
                    'diagnose_type' => $diagnose_type[$id],
                    'motivation' => $request->reason,
                    'state' => $request->region[0],
                    'number_of_advisors' => $request->charge_number ? $request->charge_number[0] : '',
                    'annual_sales' => $request->annual_sales ? $request->annual_sales[0] : '',
                    'skill' => $skill, // 選択項目の確認必須
                    'income_lp' => $request->yearly_income ? $request->yearly_income[0] : '',
                    'management' => $request->management_experience ? $request->management_experience[0] : '',
                    'financial_consulting' => $request->plus_finance_consulting,
                    'inheritance' => $request->plus_inheritance,
                    'added_value_others' => $request->plus_others,
                    'lastname' => $request->lastname,
                    'firstname' => $request->firstname,
                    'mobilephone' => $request->phone_number,
                    'email' => $request->mail_address,
                    'years_experience' => $years_experience[$request->career],
                    'birth_year' => ($request->age == 1) ? 0 : $request->age, // 選択項目の確認必須
                    'channel' => $channel ?? '', // 選択項目の確認必須
                    'message' => $request->text_form ?? '',
                    'response' => strtotime(date('Y/m/d 00:00:00', strtotime('now -9h'))) . '000', // ミリ秒の timestamp の型で登録可能
                    'leadsource' => 'leadsource_inquiry',
                    'toc_tob___' => '【toC】メールアドレスあり',
                    'contents_history' => $contents_type[$id],
                    'first_contact' => $contents_type[$id],
                    //'working_environment' => $env
            ];
        } else {
            $skillArray = [
                '税理士' => 'skill_zeirishi',
                '税理士未登録' => '税理士未登録',
                '公認会計士' => 'skill_cpa',
                '科目合格者' => 'skill_Subjectpasser',
                '簿記2級' => 'skill_bokinikyu',
                'その他' => 'skill_others',
            ];
            $skill = '';
            if ($request->license) {
                foreach ($request->license as $item) {
                    $skill .= $skillArray[$item] . ';';
                }
            }
            // 問9
            $env = '';
            if ($request->env) {
                foreach ($request->env as $item) {
                    $env .= $item . ', ';
                }
            }
            $properties1 =
                [
                    'diagnose_type' => 'ブラック企業診断',
                    'state' => ($request->region == 1) ? 0 : $request->region,
                    'motivation' => in_array("転職したいが、その時間が取れない", $request->my_situation) ? '転職したいが、その時間が取れない' : '',
                    'lastname' => $request->lastname,
                    'firstname' => $request->firstname,
                    'mobilephone' => $request->phone_number,
                    'email' => $request->mail_address,
                    'years_experience' => $years_experience[$request->career],
                    'birth_year' => ($request->age == 1) ? 0 : $request->age, // 選択項目の確認必須
                    'channel' => $channel ?? '', // 選択項目の確認必須
                    'message' => $request->text_form ?? '',
                    'response' => strtotime(date('Y/m/d 00:00:00', strtotime('now -9h'))) . '000',// ミリ秒の timestamp の型で登録可能
                    'leadsource' => 'leadsource_inquiry',
                    'toc_tob___' => '【toC】メールアドレスあり',
                    'contents_history' => $contents_type[$id],
                    'first_contact' => $contents_type[$id],
                ];
        }
        $simplePublicObjectInput = new SimplePublicObjectInput([
            'properties' => $properties1,
        ]);
        try {
            $apiResponse = $hubspot->crm()->contacts()->basicApi()->create($simplePublicObjectInput);
            return [true, "Success basic_api->create", $apiResponse];
        } catch (ApiException $e) {
            $errorMessage = $e->getMessage();
            // エラーメッセージが "Contact already exists. Existing" を含まない場合のみメールを送信する
            if (strpos($errorMessage, "Contact already exists. Existing") === false) {
                // Mail::send([], [], function ($message) use ($errorMessage) {
                //     $message->
                //             to('bugright.9w1v2.510@gmail.com')
                //             // to('k-yokoo@hion-tech.com')
                //             // ->to('cocoa2647@gmail.com')
                //             // ->to('8wakawo@gmail.com')
                //             ->subject('HubSpot連携エラーメッセージ')
                //             ->setBody($errorMessage);
                // });
            }
            if ($e->getCode() == '409') { // Email重複時はコンタクト内容をアップデートする
                $pattern = '/Contact already exists\. Existing ID: (\d+)/';
                preg_match($pattern, $errorMessage, $matches);
                $contactId = '';
                if (isset($matches[1])) {
                    $contactId = $matches[1];
                    // return $contactId;
                }
                try {
                    $apiResponse = $hubspot->crm()->contacts()->basicApi()->update($contactId, $simplePublicObjectInput);
                    return [true, "Success basic_api->update", $apiResponse];
                } catch (ApiException $e) {
                    $errorMessageUpdate = $e->getMessage();
                    return [false, "False basic_api->update", $errorMessageUpdate];
                }
            }
            return $e;
        }
    }

    private function hasReCaptchaError(Request $request): bool
    {
        // recaptcha 開発で無効化
//        $env = config('environment.env');
//        if ($env == 'develop') {
//            return false;
//        }
        // recaptcha 一時無効化
        return false;

        /** @var Response $recaptchaResponse */
        $recaptchaResponse = no_captcha()->verify(strval($request->input('g-recaptcha-response')));

        if (!$recaptchaResponse->isSuccess()) {
            return true;
        }

        if ($recaptchaResponse->getScore() <= 0.1) {
            return true;
        }

        return false;
    }

    public function lpSendMail()
    {
        $FORM_DATA = [
            [
                'propertyName' => 'status',
                'filter' => FILTER_SANITIZE_STRING,
                'required' => true,
            ],
            [
                'propertyName' => 'points',
                'filter' => FILTER_SANITIZE_STRING,
                'required' => false,
            ],
            [
                'propertyName' => 'licenses',
                'filter' => FILTER_SANITIZE_STRING,
                'required' => false,
            ],
            [
                'propertyName' => 'timing',
                'filter' => FILTER_SANITIZE_STRING,
                'required' => true,
            ],
            [
                'propertyName' => 'area',
                'filter' => FILTER_SANITIZE_STRING,
                'required' => true,

            ],
            [
                'propertyName' => 'experience',
                'filter' => FILTER_SANITIZE_STRING,
                'required' => true,
            ],
            [
                'propertyName' => 'birthYear',
                'filter' => FILTER_SANITIZE_STRING,
                'required' => true,
            ],
            [
                'propertyName' => 'birthMonth',
                'filter' => FILTER_SANITIZE_STRING,
                'required' => true,
            ],
            [
                'propertyName' => 'birthDay',
                'filter' => FILTER_SANITIZE_STRING,
                'required' => true,
            ],
            [
                'propertyName' => 'lastName',
                'filter' => FILTER_SANITIZE_STRING,
                'required' => true,
            ],
            [
                'propertyName' => 'firstName',
                'filter' => FILTER_SANITIZE_STRING,
                'required' => true,
            ],
            [
                'propertyName' => 'tel',
                'filter' => FILTER_SANITIZE_STRING,
                'required' => true,
            ],
            [
                'propertyName' => 'mail',
                'filter' => FILTER_SANITIZE_STRING,
                'required' => true,
            ],
            [
                'propertyName' => 'media',
                'filter' => FILTER_SANITIZE_STRING,
                'required' => false,
            ],
        ];

// メールの設定
        $FROM_NAME = '転職サービス【ミツカル】'; // 送信者名
        $FROM_EMAIL = 'info@taxtennsyokusinndann.com'; // 送信元アドレス

// $ADMIN_EMAIL = 'y.kambayashi@flexbox.co.jp'; // 管理者用メールアドレス
        $ADMIN_CC = 't-nonaka@hion-tech.com'; // 管理者用 CC メールアドレス

// 本番はこちらに送る
        $ADMIN_EMAIL = 'agent@mitsukaru-jpn.com';
// $ADMIN_CC = '';

// コンテンツ
        date_default_timezone_set('Asia/Tokyo');
        $now = date("Y年m月d日 H時i分s秒");

        $ADMIN_SUBJECT = '公認会計士LPから登録を受け付けました';// 管理者用メールタイトル
        $ADMIN_BODY = "以下のLPから登録を受け付けました。\r\n";
        $ADMIN_BODY .= "ご対応お願いいたします。\r\n";
        $ADMIN_BODY .= "\r\n";
        $ADMIN_BODY .= "https://mitsukaru.cc/lp_kaikeishi_01\r\n";
        $ADMIN_BODY .= "──────────────────────────\r\n";
        $ADMIN_BODY .= "①転職活動状況：{{status}}\r\n";
        $ADMIN_BODY .= "②今回の転職で重視するポイント：{{points}}\r\n";
        $ADMIN_BODY .= "③お持ちの資格：{{licenses}}\r\n";
        $ADMIN_BODY .= "④希望転職時期：{{timing}}\r\n";
        $ADMIN_BODY .= "⑤希望勤務地：{{area}}\r\n";
        $ADMIN_BODY .= "⑥経験年数：{{experience}}\r\n";
        $ADMIN_BODY .= "⑦生まれ年：{{birthYear}}/{{birthMonth}}/{{birthDay}}\r\n";
        $ADMIN_BODY .= "⑦姓：{{lastName}}\r\n";
        $ADMIN_BODY .= "⑦名：{{firstName}}\r\n";
        $ADMIN_BODY .= "⑧電話番号：{{tel}}\r\n";
        $ADMIN_BODY .= "⑧アドレス：{{mail}}\r\n";
        $ADMIN_BODY .= "──────────────────────────\r\n";
        $ADMIN_BODY .= "\r\n";

        $USER_SUBJECT = '【重要】公認会計士特化の転職サービス【ミツカル】にご登録ありがとうございます。';
        $USER_BODY = "※こちらは自動返信メールとなります。\r\n";
        $USER_BODY .= "\r\n";
        $USER_BODY .= "{{lastName}} {{firstName}}様\r\n";
        $USER_BODY .= "\r\n";
        $USER_BODY .= "ミツカルにご登録いただきありがとうございました。\r\n";
        $USER_BODY .= "以下、今後の流れになります。\r\n";
        $USER_BODY .= "あなたのより良い転職を実現するために、目を通していただけますと幸いです。\r\n";
        $USER_BODY .= "\r\n";
        $USER_BODY .= "～今後の流れ～\r\n";
        $USER_BODY .= "①お電話にて詳細をヒアリングさせて下さい。\r\n";
        $USER_BODY .= "あなたにあった企業、法人を紹介させていただくために、\r\n";
        $USER_BODY .= "希望やご状況をお聞かせください。\r\n";
        $USER_BODY .= "\r\n";
        $USER_BODY .= "数時間以内に下記の電話番号からお電話いたします。\r\n";
        $USER_BODY .= "\r\n";
        $USER_BODY .= "担当電話番号：090-8506-6780 or 080-4449-0163\r\n";
        $USER_BODY .= "※最初のお電話には必ずご対応頂けますようお願い致します。\r\n";
        $USER_BODY .= "\r\n";
        $USER_BODY .= "②キャリアコンシェルジュとのzoom面談の日程を調整してください。\r\n";
        $USER_BODY .= "面談にてあなたの希望に合った事務所をお伝えします。\r\n";
        $USER_BODY .= "地域専門のキャリアコンシェルジュが対応致します。\r\n";
        $USER_BODY .= "すぐに転職したい方も、そうでない方も、その方の状況に合わせてアドバイスを差し上げます。\r\n";
        $USER_BODY .= "\r\n";
        $USER_BODY .= "▼日程調整URL\r\n";
        $USER_BODY .= "・東日本在住の方はこちら（北海道・東北・関東・東海・中部・北陸）\r\n";
        $USER_BODY .= "https://nitte.app/LdDNwczz5La5U9G7oIcIx1KrhZv2/0e87294b\r\n";
        $USER_BODY .= "\r\n";
        $USER_BODY .= "・西日本在住の方はこちら（関西・中国・四国・九州・沖縄）\r\n";
        $USER_BODY .= "https://nitte.app/yZwMF3XqloRzQO2AqMv67ZgJBZo2/f8174d79\r\n";
        $USER_BODY .= "\r\n";
        $USER_BODY .= "③カジュアル面談\r\n";
        $USER_BODY .= "ミツカルでは監査法人、会計事務所の求人を多数保有しています。\r\n";
        $USER_BODY .= "ご希望の企業、事務所がありましたら、代表の方とのカジュアルzoom面談を設定させていただきます。\r\n";
        $USER_BODY .= "入社に向けた選考に参加することも可能です。\r\n";
        $USER_BODY .= "\r\n";
        $USER_BODY .= "どうぞよろしくお願いいたします。\r\n";
        $USER_BODY .= "…………………………………………………………………………………………………………\r\n";
        $USER_BODY .= "会社名： 株式会社ミツカル\r\n";
        $USER_BODY .= "住 所： 〒141-0021 東京都品川区上大崎3-2-1 目黒センタービル 8階\r\n";
        $USER_BODY .= "E-mail： info@mitsukaru-jpn.com\r\n";
        $USER_BODY .= "URL： https://mitsukaru.cc/\r\n";
        $USER_BODY .= "\r\n";

        /*
         * ここまでがデータの設定。
         * 以下は変更する必要がない
         */

// フィルタを作って POST DATA を SANITIZE
        $filters = [];
        foreach ($FORM_DATA as $data) {
            $filters[$data['propertyName']] = $data['filter'];
        }
        $post_data = filter_input_array(INPUT_POST, $filters);

// フィルタ結果のチェック
        foreach ($FORM_DATA as $data) {
            if ($data['required'] && !$post_data[$data['propertyName']]) {
                http_response_code(400);
                echo json_encode(array('error' => $post_data));
                return;
            }
        }

// フォームデータに置き換え
        foreach ($FORM_DATA as $data) {
            $key = $data['propertyName'];
            $value = (isset($post_data[$key]) && $post_data[$key] !== '') ? $post_data[$key] : "選択なし";
            $ADMIN_BODY = str_replace("{{{$key}}}", $value, $ADMIN_BODY);
            $USER_BODY = str_replace("{{{$key}}}", $value, $USER_BODY);
            $ADMIN_SUBJECT = str_replace("{{{$key}}}", $value, $ADMIN_SUBJECT);
            $USER_SUBJECT = str_replace("{{{$key}}}", $value, $USER_SUBJECT);
        }

// 確認用にユーザーへ送信
        $toAddress = $post_data['mail'];
        $subject = $USER_SUBJECT;

        Mail::raw($USER_BODY, function ($message) use ($toAddress, $subject) {
            $message->to($toAddress)
                ->subject($subject);
        });

// 管理者に送信（こちらが重要なのでこちらの結果だけ確認）
        $toAddress = $ADMIN_EMAIL;
        $subject = $ADMIN_SUBJECT;
        $env = config('environment.env');
        if ($env == 'develop') $toAddress = $post_data['mail'];

        Mail::raw($ADMIN_BODY, function ($message) use ($toAddress, $subject) {
            $message->to($toAddress)
                ->subject($subject);
        });

// レスポンスを返す。正常に完了していれば200（正常コード）、そうでなければ内部エラーと判断して500（異常コード）を返す
        return 'ポメ';
    }
}
