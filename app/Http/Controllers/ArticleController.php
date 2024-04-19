<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Models\Article;
use App\Models\Category;

class ArticleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        return view('article/index');
    }

    public function article_list(Request $request, $category_id = null)
    {
        $article_list = Article::where('status_flag',1)->orderby('created_at','desc');
        if($category_id){
            // article_list()に引数が入っていたら、その引数と等しいcategory_idカラムを持つ記事のみに絞る
            $article_list->where('category_id', $category_id);
        }

        return view('article/list', [
            'article_list' => $article_list->get(),
        ]);
    }

    public function writer_article_list(Request $request, $writer_id)
    {
        $article_list = Article::where('writer_id', $writer_id)->where('status_flag',1)->orderby('created_at','desc');
        $writer = Profile::where('id', $writer_id)->first();


        return view('article/list', [
            'article_list' => $article_list->get(),
            'writer' => $writer,
        ]);
    }

    public function get_article($slug, $id, Request $req)
    {
        $article = Article::where('id', $id)->first();
        $writer = Profile::where('id', $article->writer_id)->first();
        $category = Category::where('id', $article->category_id)->first();
        $tags = $article->tag->toArray();
        $relations = Article::where('status_flag',1)->where('id','!=',$id)->take(6)->get();
        $category_list = Category::get();

        return view('article/index', [
            'article' => $article,
            'writer' => $writer,
            'category' => $category,
            'tags' => $tags,
            'relations' => $relations,
            'category_list' => $category_list
        ]);
    }

    public function get_test($id, Request $req)
    {
        $article = Article::where('id', $id)->first();
        $writer = Profile::where('id', $article->writer_id)->first();
        $category = Category::where('id', $article->category_id)->first();
        $tags = $article->tag->toArray();
        $relations = Article::where('status_flag',1)->where('id','!=',$id)->take(6)->get();
        $category_list = Category::get();

        return view('article/index', [
            'article' => $article,
            'writer' => $writer,
            'category' => $category,
            'tags' => $tags,
            'relations' => $relations,
            'category_list' => $category_list
        ]);
    }

    public function get_article_link(Request $req)
    {
        $article = Article::find($req->id);

        return $article;
    }
}
