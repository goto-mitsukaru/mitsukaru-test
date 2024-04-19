<?php

namespace App\Http\Controllers;

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

class AdminArticleController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $article_list = Article::latest()->get();
        return view('admin/article/top', [
            'article_list' => $article_list,
        ]);
    }

    public function preview(Request $req, $id = 0){
        $movie = $req->movie;
        $title = $req->title;
        $text = $req->text;
        $category_id = $req->category;
        $release = $req->release;
        $pickup_flag = $req->pickup_flag;
        $tags_list = $req->tags;
        $writer_id = $req->writer;
        $tags = explode(",", $tags_list);
        $slug = $req->slug != null ? $req->slug : 'others';
        $time = date("Y/m/d H:i:s");

        $article = $id ? Article::where('id', $id)->first() : '';
        $writer = $writer_id ? Profile::where('id', $writer_id)->first() : '';
        $relations = $id ? Article::where('status_flag',1)->where('id','!=',$id)->take(6)->get() : [];
        $category = $category_id ? Category::where('id', $category_id)->first()->name : '';


        return view('admin/article/preview', [
            'movie' => $movie,
            'title' => $title,
            'text' => $text,
            'category' => $category,
            'tags' => $tags,
            'release' => $release,
            'pickup_flag' => $pickup_flag,
            'writer_id' => $writer_id,
            'slug' => $slug,
            'time' => $time,

            'article' => $article,
            'writer' => $writer,
            'relations' => $relations,
        ]);
    }

    public function category()
    {
        $category_list = Category::latest()->get();
        return view('admin/article/category', [
            'category_list' => $category_list,
        ]);
    }

    public function category_add(Request $req)
    {
        $name = $req->category;
        $time = date("Y/m/d H:i:s");
        $message = "新規登録が完了しました。";

        Category::insert([
            'name' => $name,
            'created_at' => $time
        ]);

        return redirect('admin/article/category')->with('message', $message);
    }

    public function category_update(Request $req)
    {
        $name = $req->category;
        $id = $req->category_id;
        $message = "更新が完了しました。";

        Category::where('id', $id)->update([
            'name' => $name,
        ]);

        return redirect('admin/article/category')->with('message', $message);
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit($id){
        $article = Article::where('id', $id)->first();
        $categories = Category::get();
        $c_first_id = Category::select('id')->first();
        $writer_list = Profile::latest()->get();

        if($id){
            $tags = $article->tag->toArray();
            if($tags != null){
                foreach ($tags as $tag) {
                    $tags_list[] = $tag['tag'];
                }
            }else{
                $tags_list = "";
            }
        }else{
            $tags_list = "";
        }

        return view('admin/article/edit', [
            'article' => $article,
            'categories' => $categories,
            'id' => $id,
            'c_first_id' => $c_first_id,
            'tags_list' => $tags_list,
            'writer_list' => $writer_list
        ]);
    }

    public function update($id, Request $req)
    {
        // フォームから渡されたデータの取得
        $movie = $req->movie;
        $title = $req->title;
        $text = $req->text;
        $category = $req->category;
        $release = $req->release;
        $pickup_flag = $req->pickup_flag;
        $tags_list = $req->tags;
        $writer_id = $req->writer;
        $tags = explode(",", $tags_list);
        $slug = $req->slug != null ? $req->slug : 'others';
        $time = date("Y/m/d H:i:s");

        $image_path = "";
        $thumb_path = "";

        $message = "処理に失敗しました。";

//        更新
        if ($id != 0) {
            $article = Article::find($id);

            $article->movie = $movie;
            $article->writer_id = $writer_id;
            $article->title = $title;
            $article->text = $text;
            $article->category_id = $category;
            $article->status_flag = $release;
            $article->pickup_flag = $pickup_flag;
            $article->updated_at = $time;

            if ($req->hasFile('image')) {
                if (!empty($article->image) && Storage::disk('s3')->exists($article->image)) Storage::disk('s3')->delete($article->image);
                if (!empty($article->thumb_image) && Storage::disk('s3')->exists($article->thumb_image)) Storage::disk('s3')->delete($article->thumb_image);

                $dir_name = 'article';

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

                $article->image = $image_path;
                $article->thumb_image = $thumb_path;
            }

            $article->save();

            foreach ($tags as $tag) {
                $last_tag_id[] = Tag::insertGetId([
                    'tag' => $tag,
                    'created_at' => $time,
                ]);
                Article::find($id)->tag()->sync($last_tag_id,$id);
            }

            $message = "更新が完了しました。";
//            新規登録
        } else {
            if ($req->hasFile('image')) {

                $dir_name = 'article';

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

            $last_id = Article::insertGetId([
                'title' => $title,
                'text' => $text,
                'movie' => $movie,
                'writer_id' => $writer_id,
                'image' => $image_path,
                'thumb_image' => $thumb_path,
                'category_id' => $category,
                'status_flag' => $release,
                'pickup_flag' => $pickup_flag,
                'created_at' => $time,
                'slug' => $slug
            ]);

            foreach ($tags as $tag) {
                $last_tag_id = Tag::insertGetId([
                    'tag' => $tag,
                    'created_at' => $time,
                ]);

                Article::find($last_id)->tag()->attach($last_tag_id);
            }
            $message = "新規登録が完了しました。";
        }
        if($req->delete){
            Article::where('id', $id)->update([
                'deleted_at' => $time,
            ]);
            $message = "削除が完了しました。";
        }
        // $article = new Article();
        // $columns = $article->show();
        // return view('your_view')->with('columns', $columns);

        return redirect('admin/article')->with('message', $message);
    }
}
