<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Profile;
use App\Models\Tag;
use App\Models\Upload;
use App\Models\Movie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class AdminImageController extends Controller
{
    public function index()
    {
        $image_list = Upload::latest()->get();
        return view('admin/image/top', [
            'image_list' => $image_list,
        ]);
    }

    public function edit_image(Request $req)
    {
        $data['image'] = Upload::where('id', $req->id)->first();
        return $data;
    }

    public function delete_image(Request $req){
        $id = $req->image_id;
        $upload = Upload::find($id);
        $upload->deleted_at = date("Y/m/d H:i:s");
        $upload->save();
        return redirect('admin/image');
    }

    public function post_image(Request $req){
        $id = $req->image_id;
        $name = $req->image_name;
        $upload = Upload::find($id);

        if ($req->hasFile('img_file')) {
            if (!empty($upload->src) && Storage::disk('s3')->exists($upload->src)) Storage::disk('s3')->delete($upload->src);
            if (!empty($upload->thumb_src) && Storage::disk('s3')->exists($upload->thumb_src)) Storage::disk('s3')->delete($upload->thumb_src);

            $dir_name = 'upload';

            // オリジナルの画像をS3へ保存
            $file = $req->file('img_file');
            $image_path = Storage::disk('s3')->putFile('/' . $dir_name, $file, 'public');

            // サムネイル画像を生成してS3へ保存
            $thumb = Image::make($file)
                ->resize(500, null, function ($constraint) {
                    $constraint->aspectRatio();
                });

            $thumb_path = str_replace($dir_name . '/', $dir_name . '/thumb/', $image_path);
            Storage::disk('s3')->put('/' . $thumb_path, (string)$thumb->encode(), 'public');

            if($id != 0){
                $upload->src = $image_path;
                $upload->thumb_src = $thumb_path;
            }else{
                Upload::insert([
                    'name' => $name,
                    'src' => $image_path,
                    'thumb_src' => $thumb_path,
                    'created_at' => date("Y/m/d H:i:s"),
                ]);
            }
        }
        if($id != 0) {
            $upload->name = $name;
            $upload->save();
        }
        return redirect('admin/image');
    }
}
