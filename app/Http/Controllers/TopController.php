<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Company;
use App\Models\Income;
use App\Models\License;
use App\Models\Feature;
use App\Models\Movie;
use App\Models\Occupation;
use App\Models\PrefectureMaster;
use App\Models\Recruit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;

class TopController extends Controller
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

    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $movie_list = Movie::where('status_id', 0)->orderby('created_at', 'desc')->get();

        $pickup_article_list = Article::where('status_flag', 1)->where('pickup_flag', 1)->orderby('created_at', 'desc')->get();

        $top_article_list = Article::where('status_flag', 1)->orderby('created_at', 'desc')->take(2)->get();
        $new_recruit_list = Recruit::where('status_flag', 1)->latest('updated_at')->take(10)->get();
        $recommendation_recruit_list = Recruit::where('status_flag', 1)->where('recommendation_flag', 1)->inRandomOrder()->take(10)->get();
        $company_list = Company::get();

        $top_id = array();
        foreach ($top_article_list as $value) {
            array_push($top_id, $value->id);
        }

        $other_article_list = Article::where('status_flag', 1)->where('id', '!=', $top_id[0])->where('id', '!=', $top_id[1])->orderby('created_at', 'desc')->take(4)->get();

        $occupation_list = Occupation::get();
        $income_list = Income::get();
        $license_list = License::get();

        $publish_area = Recruit::where('status_flag', 1)->select('area_id') ->groupBy('area_id')->havingRaw('COUNT(DISTINCT area_id) = 1')->pluck('area_id')->toArray();

        return view('top/index', [
            'area_list' => $this->area_array,
            'feature_list' => $this->feature,
            'scale_list' => $this->scale,
            'occupation_list' => $occupation_list,
            'movie_list' => $movie_list,
            'pickup_article_list' => $pickup_article_list,
            'top_article_list' => $top_article_list,
            'other_article_list' => $other_article_list,
            'recommendation_recruit_list' => $recommendation_recruit_list,
            'new_recruit_list' => $new_recruit_list,
            'company_list' => $company_list,
            'income_list' => $income_list,
            'license_list' => $license_list,
            'region_list' => $this->region,
            'publish_area' => $publish_area,
        ]);
    }
    public function indexlist(){
        return view('whitepaper/index');
    }
    public function showPage1(){
        return view('whitepaper/wp01');
    }
    public function showPage2() {
        return view('whitepaper/wp02');
    }
    public function showPage3() {
        return view('whitepaper/wp03');
    }
    public function showPage4() {
        return view('whitepaper/wp04');
    }
    public function showPage5() {
        return view('whitepaper/wp05');
    }
    public function showPage6() {
        return view('whitepaper/wp06');
    }
    public function showPage7() {
        return view('whitepaper/wp07');
    }
    public function showPage8() {
        return view('whitepaper/wp08');
    }
    public function showPage9() {
        return view('whitepaper/wp09');
    }
    public function thanks(){
        return view('whitepaper/thanks');
    }
}
