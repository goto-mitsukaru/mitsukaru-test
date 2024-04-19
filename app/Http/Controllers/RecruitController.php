<?php

namespace App\Http\Controllers;

use App\Models\FormSpreadSheet;
use App\Models\Income;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use App\Mail\CompanyMail;
use App\Models\Company;
use App\Models\License;
use App\Models\Occupation;
use App\Models\Profile;
use App\Models\PrefectureMaster;
use App\Models\Recruit;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Models\Article;
use App\Models\Category;
use HubSpot\Client\Crm\Contacts\ApiException;
use HubSpot\Client\Crm\Contacts\Model\SimplePublicObjectInput;
use DateTime;
use DateTimeZone;


class RecruitController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $area_array = [
        '指定なし',
        '北海道',
        '青森県',
        '岩手県',
        '宮城県',
        '秋田県',
        '山形県',
        '福島県',
        '茨城県',
        '栃木県',
        '群馬県',
        '埼玉県',
        '千葉県',
        '東京都',
        '神奈川県',
        '新潟県',
        '富山県',
        '石川県',
        '福井県',
        '山梨県',
        '長野県',
        '岐阜県',
        '静岡県',
        '愛知県',
        '三重県',
        '滋賀県',
        '京都府',
        '大阪府',
        '兵庫県',
        '奈良県',
        '和歌山県',
        '鳥取県',
        '島根県',
        '岡山県',
        '広島県',
        '山口県',
        '徳島県',
        '香川県',
        '愛媛県',
        '高知県',
        '福岡県',
        '佐賀県',
        '長崎県',
        '熊本県',
        '大分県',
        '宮崎県',
        '鹿児島県',
        '沖縄県'
    ];

    private $region = [
        '指定なし',
        '北海道・東北',
        '関東・甲信越',
        '東海・北陸',
        '関西',
        '中国・四国',
        '九州・沖縄',
    ];

    private $feature = [
        '指定なし',
        '高年収',
        '資格者優遇',
        '税理士試験サポート',
        '研修制度充実',
        '評価制度明確',
        '月残業時間20時間以下',
        'リモートワーク可',
        '税理士業界未経験歓迎'
    ];

    private $scale = [
        '指定なし',
        '大手税理士事務所（100名以上・地域最大手級）',
        '中堅税理士事務所',
        '30名未満の事務所 or 特化型事務所',
    ];

    private $status = [
        '指定なし',
        '正社員',
        '派遣社員',
        'アルバイト',
        'その他',
    ];

    private $income = [
        '指定なし',
        '400万円未満',
        '400～600万円',
        '600～800万円',
        '800～1000万円',
        '1000万円以上'
    ];

    private $career_array = [
        '未経験',
        '1年未満',
        '1～4年',
        '5～7年',
        '8年以上',
    ];

    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        return view('article/index', [
            'area_array' => $this->area_array
        ]);

    }

    public function search()
    {
        $license_list = License::get();
        $occupation_list = Occupation::get();
        $feature_list = $this->feature;
        $scale_list = $this->scale;
        $area_list = $this->area_array;
        $income_list = Income::get();
        $recruit_list = Recruit::latest('updated_at')->get();
        $company_list = Company::get();

        return view('recruit/search', [
            'license_list' => $license_list,
            'occupation_list' => $occupation_list,
            'feature_list' => $feature_list,
            'scale_list' => $scale_list,
            'area_list' => $area_list,
            'income_list' => $income_list,
            'recruit_list' => $recruit_list,
            'company_list' => $company_list,
        ]);
    }

    public function joblist(Request $req)
    {
        //検索条件1つだけの場合、joblinkメソッドにとばす
        $keys = array_keys($req->all());

        //local1つだけ選択時のarea選択の判定回避
        if (count($keys) === 2 && in_array('area', $keys) && in_array('local', $keys)) {
            foreach ($req->all() as $key => $value) {
                if ($key === 'local' && count($value) === 1) {

                    $local_area_id = PrefectureMaster::where('region_id', $req->local)->pluck('id')->toArray();

                    if (!array_diff($req->area, $local_area_id)) {
                        return redirect()->route('job_link', ['category' => 'local', 'id' => $value[0]]);
                    }
                }
            }
        }

        if (count($req->all()) === 1) {
            foreach ($req->all() as $key => $value) {
                if (count($value) !== 1) {
                    continue;
                }
                return redirect()->route('job_link', ['category' => $key, 'id' => $value[0]]);
            }
        }

        $license_list = License::get();
        $occupation_list = Occupation::get();
        $feature_list = $this->feature;
        $scale_list = $this->scale;
        $area_list = $this->area_array;
        $income_list = Income::get();
        $company_list = Company::get();
        $area_master_list = PrefectureMaster::get();
        $region_list = $this->region;
        $nearly_list = null;

//        検索
        if (!empty($req)) {
            $search_data['area_id'] = $area_id = isset($req->area) && $req->area[0] != 999 ? $req->area : null;
            $search_data['feature_id'] = $feature_id = isset($req->feature) && $req->feature[0] != 999 ? $req->feature : null;
            $search_data['scale_id'] = $scale_id = isset($req->scale) && $req->scale[0] != 999 ? $req->scale : null;
            $search_data['license_id'] = $license_id = isset($req->license) && $req->license[0] != 999 ? $req->license : null;
            $search_data['occupation_id'] = $occupation_id = isset($req->occupation) && $req->occupation[0] != 999 ? $req->occupation : null;
            $search_data['income_id'] = $income_id = isset($req->income) && $req->income[0] != 999 ? $req->income : null;
            $search_data['local_id'] = $local_id = isset($req->local) && $req->local[0] != 999 ? $req->local : null;

            //検索記述
            $query = Recruit::query();
            $recruit_list = $query
                ->when($income_id, function ($query, $income_id) { //年収
                    return $query->whereHas('incomes', function ($q) use ($income_id) {
                        $q->whereIn('income_recruit.income_id', $income_id);
                    });
                })
                ->when($license_id, function ($query, $license_id) { //資格
                    return $query->whereHas('licenses', function ($q) use ($license_id) {
                        $q->whereIn('license_recruit.license_id', $license_id);
                    });
                })
                ->when($occupation_id, function ($query, $occupation_id) { //ポジション
                    return $query->whereHas('occupations', function ($q) use ($occupation_id) {
                        $q->whereIn('occupation_recruit.occupation_id', $occupation_id);
                    });
                })
                ->when($feature_id, function ($query, $feature_id) { //特徴
                    return $query->whereHas('features', function ($q) use ($feature_id) {
                        $q->whereIn('feature_recruit.feature_id', $feature_id);
                    });
                })
                ->when($area_id, function ($query, $area_id) { //地域
                    return $query->whereIn('recruits.area_id', $area_id);

                })
                ->when($scale_id, function ($query, $scale_id) { //スケール
                    return $query->whereIn('recruits.scale_id', $scale_id);
                })
                ->where('status_flag', '1')->latest('updated_at')->get();

            //0件のとき、類似求人を表示
            $id = $area_id;
            if ($recruit_list->isEmpty()) {
                $region_ids = $area_master_list->whereIn('id', $id)->pluck('region_id')->toArray();
                $prefectures = $area_master_list->whereIn('region_id', $region_ids)->pluck('id')->toArray();
                $nearly_list = Recruit::whereIn('area_id', $prefectures)->where('status_flag', '1')->latest('updated_at')->get();
            }

        } else {
            //検索未入力
            $search_data[] = "";
            $recruit_list = Recruit::where('status_flag', '1')->latest('updated_at')->get();
        }

        $local_area_id = PrefectureMaster::where('region_id', $search_data['local_id'])->pluck('id')->toArray();

        return view('recruit/joblist', [
            'license_list' => $license_list,
            'occupation_list' => $occupation_list,
            'feature_list' => $feature_list,
            'scale_list' => $scale_list,
            'area_list' => $area_list,
            'recruit_list' => $recruit_list,
            'income_list' => $income_list,
            'company_list' => $company_list,
            'search_data' => $search_data,
            'area_master_list' => $area_master_list,
            'region_list' => $region_list,
            'nearly_list' => $nearly_list,
            'local_area_id' => $local_area_id,
        ]);
    }

    //TOPのリンク集用URL作成
    public function job_link($category, $id)
    {
        $license_list = License::get();
        $occupation_list = Occupation::get();
        $feature_list = $this->feature;
        $scale_list = $this->scale;
        $area_list = $this->area_array;
        $income_list = Income::get();
        $company_list = Company::get();
        $area_master_list = PrefectureMaster::get();
        $region_list = $this->region;
        $local_area_links = '';

        if ($category && $id) {
            $id = explode(',', $id);
            $query = Recruit::query();
            $nearly_list = null;

            //希望年収
            if ($category == 'income') {
                $search_data['income_id'] = isset($id) && is_array($id) && $id[0] != 999 ? $id : null;
                $recruit_list = $query->whereIn('id', function ($q) use ($id) {
                    $q->select('recruit_id')->from('income_recruit')->where('income_id', $id);
                })->where('status_flag', '1')->latest('updated_at')->get();

                //特徴
            } elseif ($category == 'feature') {
                $search_data['feature_id'] = isset($id) && is_array($id) && $id[0] != 999 ? $id : null;
                $recruit_list = $query->whereIn('id', function ($q) use ($id) {
                    $q->select('recruit_id')->from('feature_recruit')->where('feature_id', $id);
                })->where('status_flag', '1')->latest('updated_at')->get();

                //保有資格
            } elseif ($category == 'license') {
                $search_data['license_id'] = isset($id) && is_array($id) && $id[0] != 999 ? $id : null;
                $recruit_list = $query->whereIn('id', function ($q) use ($id) {
                    $q->select('recruit_id')->from('license_recruit')->where('license_id', $id);
                })->where('status_flag', '1')->latest('updated_at')->get();

                //ポジション
            } elseif ($category == 'occupation') {
                $search_data['occupation_id'] = isset($id) && is_array($id) && $id[0] != 999 ? $id : null;
                $recruit_list = $query->whereIn('id', function ($q) use ($id) {
                    $q->select('recruit_id')->from('occupation_recruit')->where('occupation_id', $id);
                })->where('status_flag', '1')->latest('updated_at')->get();

                //事務所規模
            } elseif ($category == 'scale') {
                $search_data['scale_id'] = isset($id) && is_array($id) && $id[0] != 999 ? $id : null;
                $recruit_list = $query->where('scale_id', $id)->where('status_flag', '1')->latest('updated_at')->get();

                //勤務地（都道府県）
            } elseif ($category == 'area') {
                $search_data['area_id'] = isset($id) && is_array($id) && $id[0] != 999 ? $id : null;
                $recruit_list = $query->where('area_id', $id)->where('status_flag', '1')->latest('updated_at')->get();

                //0件のとき、類似求人を表示
                $id = implode(',', $id);
                if ($recruit_list->isEmpty()) {
                    $region_ids = $area_master_list->whereIn('id', $id)->pluck('region_id')->toArray();
                    $prefectures = $area_master_list->whereIn('region_id', $region_ids)->pluck('id')->toArray();//region_idの地域idで指定したPrefectureMaster::からidカラムの値のみを取得している。そしてそれを配列型式に変換
                    $nearly_list = Recruit::whereIn('area_id', $prefectures)->where('status_flag', '1')->latest('updated_at')->get();
                }

                //勤務地（地域）
            } elseif ($category == 'local') {

                $id = implode(',', $id);
                // where(カラムの名前, 演算子, カラムの値と比較する値)
                // pluck() は指定カラム1つだけをコレクションでカラム値を全て取得する
                // toArray()はコレクションを配列に変換する
                $fetched_ids = PrefectureMaster::where('region_id', $id)->pluck('id')->toArray();
                $ids = $fetched_ids;

                $search_data['local_id'] = !empty($id) && $id[0] != 999 ? explode(',', $id) : null;
                $search_data['area_id'] = !empty($ids) && $ids[0] != 999 ? $ids : null;

                $ids = array_map('intval', $ids);
                $recruit_list = $query->whereIn('area_id', $ids)->where('status_flag', '1')->latest('updated_at')->get();

                //検索結果の地方下の都道府県リンク表示
                $local_area_links = PrefectureMaster::where('region_id', $search_data['local_id'])->get();

                //検索未入力
            } else {
                $search_data[] = "";
                $recruit_list = Recruit::where('status_flag', '1')->latest('updated_at')->get();
            }

            //検索のエラー回避
            $local_area_id = '';
            if (!empty($search_data['local_id'])) {
                $local_area_id = PrefectureMaster::where('region_id', $search_data['local_id'])->pluck('id')->toArray();
            }
            return view('recruit/joblist', [
                'license_list' => $license_list,
                'occupation_list' => $occupation_list,
                'feature_list' => $feature_list,
                'scale_list' => $scale_list,
                'area_list' => $area_list,
                'recruit_list' => $recruit_list,
                'income_list' => $income_list,
                'company_list' => $company_list,
                'search_data' => $search_data,
                'area_master_list' => $area_master_list,
                'region_list' => $region_list,
                'nearly_list' => $nearly_list,
                'local_area_id' => $local_area_id,
                'local_area_links' => $local_area_links,
            ]);
        }
    }

    public function detail($id)
    {
        $recruit = Recruit::where('id', $id)->first();
        $company_id = $recruit->company_id;
        $scale_list = $this->scale;
        $company = Company::where('id', $company_id)->first();

        return view('recruit/detail', [
            'recruit' => $recruit,
            'company' => $company,
            'status' => $this->status,
            'area_array' => $this->area_array,
            'scale_list' => $scale_list,
        ]);
    }

    public function form($id = 0)
    {
        if ($id) {
            $recruit = Recruit::where('id', $id)->first();


            return view('recruit/form', [
                'id' => $id,
                'recruit' => $recruit,
            ]);

        } else {
            return view('recruit/form', [
                'id' => $id
            ]);
        }
    }

    function token_chk($token)
    {
        $key = '6LcxybIjAAAAALaAzDy_oAcU93Rd7vfsQxcF4RGu';
        $sts = false;

        $result = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$key&response=$token");
        $chk = json_decode($result);

        if ($chk->success == true) {
            $sts = true;
        }

        return $sts;
    }

    public function mail(Request $request)
    {
        // 現在のUTC日時を取得
        $utcDateTime = new DateTime('now', new DateTimeZone('UTC'));
        // 日本時間のタイムゾーンをセット
        $utcDateTime->setTimezone(new DateTimeZone('Asia/Tokyo'));

        if (isset($request->recaptchaToken) == true) {
            $token = $request->recaptchaToken;

            if ($this->token_chk($token) == true) {
                // チェックOKの処理
                Mail::send(new ContactMail($request));
                Mail::send(new CompanyMail($request));
                $this->postHubspot($request);

                // スプレッドシート連携処理
                $spread_sheet = new FormSpreadSheet();
                try {
                    $this->src = $request['src'];
                    $title = 'エントリー問い合わせ（フォームからの連携）';
                    if (preg_match('/facebook/', $this->src) || preg_match('/fbclid/', $this->src)) $title = '【facebook】' . $title;
                    elseif (preg_match('/sms/', $this->src)) $title = '【SMS】' . $title;
                    elseif (preg_match('/email/', $this->src) || preg_match('/utm_source=hs_email/', $this->src)) $title = '【メルマガ】' . $title;

                    $insert_data = [
                        'title' => strval($title),
                        'name' => strval($request->lastname) . ' ' . strval($request->firstname),
                        'mail_address'  => strval($request->mail_address),
                        'phone_number' => strval($request->phone_number),
                        'area' => strval($request->region[0]),
                        'age' => $request->age == 1 ? '未回答':strval($request->age),
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


                return redirect('thanks/');

            } else {
                // チェックNGの処理
                return redirect('recruit/');
            }
        }
    }

    public function postHubspot($request)
    {
        $apiKey = 'pat-na1-14185715-8c19-4f6a-8111-dbac1b4ed819';
        $hubspot = \HubSpot\Factory::createWithAccessToken($apiKey);
        $diagnose_type = 'オーガニック';
//        if (preg_match('/utm_source=facebook/', $request->src) || preg_match('/fbclid/', $request->src)) $channel = 'Facebook広告';
//        elseif (preg_match('/utm_source=sms/', $request->src)) $channel = 'SMS';
//        elseif (preg_match('/utm_source=email/', $request->src) || preg_match('/utm_source=hs_email/', $request->src)) $channel = 'メルマガ';
//        else $channel = '';
        $channel = 'オーガニック';

        $skillArray = [
            '税理士' => 'skill_zeirishi',
            '会計士' => 'skill_cpa',
            '税理士未登録' => '税理士未登録',
            '科目合格者' => 'skill_Subjectpasser',
            '税理士科目合格者' => 'skill_Subjectpasser',
            '簿記2級' => 'skill_bokinikyu',
            'その他' => 'skill_others',
        ];
        $skill = '';
        if ($request->license) {
            foreach ($request->license as $item) {
                $skill .= $skillArray[$item] . ';';
            }
        }

        $properties1 =
            [
                'diagnose_type' => $diagnose_type,
                'state' => $request->region[0],
                'skill' => $skill,
                'lastname' => $request->lastname,
                'firstname' => $request->firstname,
                'mobilephone' => $request->phone_number,
                'email' => $request->mail_address,
                'experience' => $this->career_array[$request->career],
                'birth_year' => ($request->age == 1) ? 0 : $request->age, // 選択項目の確認必須
                'channel' => $channel, // 選択項目の確認必須
                'response' => strtotime(date('Y/m/d 00:00:00', strtotime('now -9h'))) . '000', // ミリ秒の timestamp の型で登録可能
                'employment_status' => $request->style,
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

    public function thanks()
    {
        return view('recruit/thanks');
    }
}
