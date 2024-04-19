<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Feature;
use App\Models\Income;
use App\Models\License;
use App\Models\Occupation;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Models\Recruit;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class AdminRecruitController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
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
        '中堅事務所（30名以上100名未満）',
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

    public function index()
    {
        $recruit_list = Recruit::latest('updated_at')->get();
        $company_list = Company::get();
        return view('admin/recruit/recruit', [
            'recruit_list' => $recruit_list,
            'company_list' => $company_list,
        ]);
    }

    public function edit($id)
    {
        $recruit = Recruit::where('id', $id)->first();
        $occupations = Occupation::latest()->get();
        $companies = Company::latest()->get();
        $license_list = License::get();
        $income_list = Income::get();
        $feature_list = Feature::get();
        $scale_list = $this->scale;
        if ($id) {
            $company = Company::where('id', $recruit->id)->first();
            $licensed = Recruit::find($id)->licenses()->get();
            $occupated = Recruit::find($id)->occupations()->get();
            $featured = Recruit::find($id)->features()->get();
            $incomed = Recruit::find($id)->incomes()->get();

        } else {
            $company = [];
            $licensed = [];
            $occupated = [];
            $featured = [];
            $incomed = [];
        }

        $license_ids = [];
        $occupation_ids = [];
        $feature_ids = [];
        $income_ids = [];
        foreach ($licensed as $license) {
            if (!in_array($license->id, $license_ids)) {
                $license_ids[] += $license->id;
            }
        }

        foreach ($occupated as $occupation) {
            $occupation_ids[] += $occupation->id;
        }

        foreach ($featured as $feature) {
            $feature_ids[] += $feature->id;
        }

        foreach ($incomed as $income) {
            $income_ids[] += $income->id;
        }
        $area_array = $this->area_array;

        return view('admin/recruit/edit_recruit', [
            'id' => $id,
            'recruit' => $recruit,
            'occupations' => $occupations,
            'companies' => $companies,
            'company' => $company,
            'license_list' => $license_list,
            'license_ids' => $license_ids,
            'occupation_ids' => $occupation_ids,
            'feature_ids' => $feature_ids,
            'income_ids' => $income_ids,
            'area_array' => $area_array,
            'feature_list' => $feature_list,
            'scale_list' => $scale_list,
            'income_list' => $income_list,
        ]);
    }

    public function create(Request $req, $id)
    {
        if ($req->delete) {
            Recruit::where('id', $id)->update([
                'deleted_at' => date('Y-m-d H:i'),
            ]);
            return redirect('admin/recruit');
        }

        $name = $req->name ?? '-';
        $company_id = $req->company_id ?? '0';
        $license_list = $req->license_id ?? [];
        $occupation_list = $req->occupation_id ?? [];
        $feature_list = $req->feature_id ?? [];
        $income_list = $req->income_id ?? [];
        $status_id = $req->status_id ?? '0';
        $category = $req->category ?? '-';
        $income = $req->income ?? '-';
        $content = $req->content ?? null;
        $job_description = $req->job_description ?? null;
        $specific_content = $req->specific_content ?? null;
        $work_environment = $req->work_environment ?? null;
        $position_worthwhile = $req->position_worthwhile ?? null;
        $job_worthwhile = $req->job_worthwhile ?? null;
        $career_path = $req->career_path ?? null;
        $match = $req->match ?? null;
        $required_condition = $req->required_condition ?? null;
        $welcome_condition = $req->welcome_condition ?? null;
        $ideal_image = $req->ideal_image ?? null;
        $area_id = $req->area_id ?? '0';
        $time = $req->time ?? '-';
        $overtime = $req->overtime ?? '-';
        $welfare = $req->welfare ?? '-';
        $holiday = $req->holiday ?? '-';
        $movie = $req->movie ?? '';
        $movie_title = $req->movie_title ?? '';
        $recommendation_flag = $req->recommendation_flag ?? '0';
        $status_flag = $req->status_flag ?? '0';
        $scale_id = $req->scale_id ?? '0';

        $image_path = "";
        $thumb_path = "";

        if ($req->hasFile('image')) {

            $dir_name = 'recruit';

            // オリジナルの画像をS3へ保存
            $file = $req->file('image');
            $image_path = Storage::disk('s3')->putFile('/' . $dir_name, $file, 'public');

            // サムネイル画像を生成してS3へ保存
            $thumb = Image::make($file)
                ->resize(500, null, function ($constraint) {
                    $constraint->aspectRatio();
                });

            $thumb_path = str_replace($dir_name . '/', $dir_name . '/thumb/', $image_path);
            Storage::disk('s3')->put('/' . $thumb_path, (string)$thumb->encode(), 'public');
        }


        $recruit_id = Recruit::insertGetId([
            'name' => $name,
            'company_id' => $company_id,
            'status_id' => $status_id,
            'category' => $category,
            'income' => $income,

            'content' => $content,
            'job_description' => $job_description,
            'specific_content' => $specific_content,
            'work_environment' => $work_environment,
            'position_worthwhile' => $position_worthwhile,
            'job_worthwhile' => $job_worthwhile,
            'career_path' => $career_path,

            'match' => $match,
            'required_condition' => $required_condition,
            'welcome_condition' => $welcome_condition,
            'ideal_image' => $ideal_image,

            'area_id' => $area_id,
            'time' => $time,
            'overtime' => $overtime,
            'welfare' => $welfare,

            'holiday' => $holiday,
            'movie' => $movie,
            'movie_title' => $movie_title,
            'image' => $image_path,
            'thumb_image' => $thumb_path,

            'recommendation_flag' => $recommendation_flag,
            'status_flag' => $status_flag,
            'scale_id' => $scale_id,
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        if (isset($occupation_list)) {
            foreach ($occupation_list as $occupation) {
                Recruit::find($recruit_id)->occupations()->attach($occupation);
            }
        }

        if (isset($license_list)) {
            foreach ($license_list as $license) {
                Recruit::find($recruit_id)->licenses()->attach($license);
            }
        }

        if (isset($feature_list)) {
            foreach ($feature_list as $feature) {
                Recruit::find($recruit_id)->licenses()->attach($feature);
            }
        }

        if (isset($income_list)) {
            foreach ($income_list as $income) {
                Recruit::find($recruit_id)->licenses()->attach($income);
            }
        }

        return redirect('admin/recruit');
    }

    public function update(Request $req, $id)
    {
        $recruit = Recruit::find($id);
        $recruit->name = $req->name ?? '-';
        $recruit->company_id = $req->company_id ?? '0';
        $recruit->status_id = $req->status_id ?? '0';
        $recruit->category = $req->category ?? '-';
        $recruit->income = $req->income ?? '-';
        $recruit->content = $req->content ?? null;
        $recruit->job_description = $req->job_description ?? null;
        $recruit->specific_content = $req->specific_content ?? null;
        $recruit->work_environment = $req->work_environment ?? null;
        $recruit->position_worthwhile = $req->position_worthwhile ?? null;
        $recruit->job_worthwhile = $req->job_worthwhile ?? null;
        $recruit->career_path = $req->career_path ?? null;
        $recruit->match = $req->match ?? null;
        $recruit->required_condition = $req->required_condition ?? null;
        $recruit->welcome_condition = $req->welcome_condition ?? null;
        $recruit->ideal_image = $req->ideal_image ?? null;
        $recruit->area_id = $req->area_id ?? '0';
        $recruit->time = $req->time ?? '-';
        $recruit->overtime = $req->overtime ?? '-';
        $recruit->welfare = $req->welfare ?? '-';
        $recruit->holiday = $req->holiday ?? '-';
        $recruit->movie = $req->movie ?? '';
        $recruit->movie_title = $req->movie_title ?? '';
        $recruit->recommendation_flag = $req->recommendation_flag ?? '0';
        $recruit->status_flag = $req->status_flag ?? '0';
        $recruit->scale_id = $req->scale_id ?? '0';
        $recruit->updated_at = date('Y-m-d H:i:s');

        if ($req->hasFile('image')) {
            if (!empty($recruit->image) && Storage::disk('s3')->exists($recruit->image)) Storage::disk('s3')->delete($recruit->image);
            if (!empty($recruit->thumb_image) && Storage::disk('s3')->exists($recruit->thumb_image)) Storage::disk('s3')->delete($recruit->thumb_image);

            $dir_name = 'recruit';

            // オリジナルの画像をS3へ保存
            $file = $req->file('image');
            $image_path = Storage::disk('s3')->putFile('/' . $dir_name, $file, 'public');

            // サムネイル画像を生成してS3へ保存
            $thumb = Image::make($file)
                ->resize(500, null, function ($constraint) {
                    $constraint->aspectRatio();
                });

            $thumb_path = str_replace($dir_name . '/', $dir_name . '/thumb/', $image_path);
            Storage::disk('s3')->put('/' . $thumb_path, (string)$thumb->encode(), 'public');

            $recruit->image = $image_path;
            $recruit->thumb_image = $thumb_path;
        }

        $recruit->save();

        $license_array = $req->license_id ?? [];
        $license_ids = [];
        foreach ($license_array as $id){
            if (!in_array($id, $license_ids)) {
                $license_ids[] += $id;
            }
        }

        $income_array = $req->income_id ?? [];
        $income_ids = [];
        foreach ($income_array as $id){
            if (!in_array($id, $income_ids)) {
                $income_ids[] += $id;
            }
        }

        $feature_array = $req->feature_id ?? [];
        $feature_ids = [];
        foreach ($feature_array as $id){
            if (!in_array($id, $feature_ids)) {
                $feature_ids[] += $id;
            }
        }
        $recruit->licenses()->detach();
        $recruit->licenses()->sync($license_ids);
        $recruit->incomes()->detach();
        $recruit->incomes()->sync($income_ids);
        $recruit->occupations()->sync($req->occupation_id);
        $recruit->features()->detach();
        $recruit->features()->sync($req->feature_id);

        return redirect('admin/recruit');
    }
}
