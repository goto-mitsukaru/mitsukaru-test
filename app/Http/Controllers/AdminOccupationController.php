<?php

namespace App\Http\Controllers;

use App\Models\Occupation;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class AdminOccupationController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $occupation_list = Occupation::latest()->get();
        return view('admin/occupation/occupation', [
            'occupation_list' => $occupation_list,
        ]);
    }

    public function create(Request $req)
    {
        $name = $req->name ?? '';
        $message = "新規登録が完了しました。";

        Occupation::insert([
            'name' => $name,
        ]);

        return redirect('https://kaikeizimusyotennsyoku.com/admin/occupation')->with('message', $message);
    }

    public function update(Request $req)
    {
        $name = $req->name ?? '';
        $id = $req->occupation_id;
        $message = "更新が完了しました。";

        Occupation::where('id', $id)->update([
            'name' => $name,
        ]);

        return redirect('https://kaikeizimusyotennsyoku.com/admin/occupation')->with('message', $message);
    }
}
