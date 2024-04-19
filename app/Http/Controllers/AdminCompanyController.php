<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class AdminCompanyController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $company_list = Company::latest()->get();
        return view('admin/company/company', [
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
        $company = Company::where('id', $id)->first();

        return view('admin/company/edit_company', [
            'company' => $company,
            'id' => $id
        ]);
    }


    public function update($id, Request $req)
    {
        // フォームから渡されたデータの取得
        $name = $req->name ?? '-';
        $workplace = $req->workplace ?? '-';
        $profile = $req->profile ?? null;
        $mvv = $req->mvv ?? null;
        $scale = $req->scale ?? null;
        $number = $req->number ?? null;
        $business = $req->business ?? null;
        $average_number = $req->average_number ?? null;
        $feature = $req->feature ?? '-';
        $income = $req->income ?? '-';
        $adviser = $req->adviser ?? '-';
        $matter = $req->matter ?? '-';
        $soft = $req->soft ?? '-';
        $url = $req->url ?? '-';
        $employee = $req->employee ?? '-';
        $time = date("Y/m/d H:i:s");

        $message = "処理に失敗しました。";
//          削除
        if ($req->delete) {
            Company::where('id', $id)->update([
                'deleted_at' => $time,
            ]);
            $message = "削除が完了しました。";

//              更新
        } elseif ($id != 0) {
            $company = Company::find($id);
            $company->name = $name;
            $company->workplace = $workplace;
            $company->profile = $profile;
            $company->mvv = $mvv;
            $company->scale = $scale;
            $company->number = $number;
            $company->business = $business;
            $company->average_number = $average_number;
            $company->feature = $feature;
            $company->income = $income;
            $company->adviser = $adviser;
            $company->matter = $matter;
            $company->soft = $soft;
            $company->url = $url;
            $company->employee = $employee;

            $company->updated_at = $time;

            $company->save();
            $message = "更新が完了しました。";

//            新規登録
        } else {

            $last_id = Company::insertGetId([
                'name' => $name,
                'workplace' => $workplace,
                'profile' => $profile,
                'mvv' => $mvv,
                'scale' => $scale,
                'number' => $number,
                'business' => $business,
                'average_number' => $average_number,
                'feature' => $feature,
                'income' => $income,
                'adviser' => $adviser,
                'matter' => $matter,
                'soft' => $soft,
                'url' => $url,
                'employee' => $employee,
            ]);
            $message = "新規登録が完了しました。";

        }

        return redirect('/admin/company')->with('message', $message);
    }
}
