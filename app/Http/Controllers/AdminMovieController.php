<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Profile;
use App\Models\Tag;
use App\Models\Movie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class AdminMovieController extends Controller
{
    public function index()
    {
        $movie_list = Movie::latest()->get();
        return view('admin/movie/movie', [
            'movie_list' => $movie_list,
        ]);
    }

    public function movie_create(Request $req)
    {
        $title = $req->movie_title;
        $src = $req->movie_src;
        $time = date("Y/m/d H:i:s");
        $message = "新規登録が完了しました。";

        Movie::insert([
            'title' => $title,
            'src' => $src,
            'created_at' => $time
        ]);

        return redirect('admin/movie')->with('message', $message);
    }

    public function movie_edit(Request $req)
    {
        $id = $req->movie_id;
        $title = $req->movie_title;
        $src = $req->movie_src;
        $message = "更新が完了しました。";


        Movie::where('id', $id)->update([
            'title' => $title,
            'src' => $src,
        ]);

        return redirect('admin/movie')->with('message', $message);
    }

    public function movie_status($id, Request $req)
    {
        $status_id = $req->status_id;
        $message = "公開ステータスを変更しました。";

        Movie::where('id', $id)->update([
            'status_id' => $status_id,
        ]);

        return redirect('admin/movie')->with('message', $message);
    }

    public function edit_modal(Request $req)
    {
        $data['movie'] = Movie::where('id', $req->id)->first();
        return $data;
    }
}
