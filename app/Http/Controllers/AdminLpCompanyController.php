<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\TaxAccountantList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class AdminLpCompanyController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $company_list = TaxAccountantList::all();
        return view('admin/lpcompany/lp_company', [
            'company_list' => $company_list,
        ]);
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit($id)
    {
        $company = TaxAccountantList::where('id', $id)->first();

        return view('admin/lpcompany/edit_lp_company', [
            'company' => $company,
            'id' => $id
        ]);
    }


    public function update($id, Request $req)
    {
        // フォームから渡されたデータの取得
        $name = $req->name ?? '-';
        $img_path = $req->img_path ?? '-';
        $slogan = $req->slogan ?? '-';
        $about_us = $req->about_us ?? '-';
        $point = $req->point ?? '-';
        $positions = $req->positions ?? '-';
        $site_url = $req->site_url ?? '-';
        $time = date("Y/m/d H:i:s");

        $message = "処理に失敗しました。";
//          削除
        if ($req->delete) {
            TaxAccountantList::where('id', $id)->update([
                'deleted_at' => $time,
            ]);
            $message = "削除が完了しました。";

//              更新
        } elseif ($id != 0) {
            $company = TaxAccountantList::find($id);
            $company->name = $name;
            $company->img_path = $img_path;
            $company->slogan = $slogan;
            $company->about_us = $about_us;
            $company->point = $point;
            $company->positions = $positions;
            $company->site_url = $site_url;

            $company->updated_at = $time;

            $company->save();
            $message = "更新が完了しました。";

//            新規登録
        } else {

            $last_id = TaxAccountantList::insertGetId([
                'name' => $name,
                'img_path' => $img_path,
                'slogan' => $slogan,
                'about_us' => $about_us,
                'point' => $point,
                'positions' => $positions,
                'site_url' => $site_url,
            ]);
            $message = "新規登録が完了しました。";

        }

        return redirect('/admin/lp_company')->with('message', $message);
    }
}
