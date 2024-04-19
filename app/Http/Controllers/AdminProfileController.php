<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Profile;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class AdminProfileController extends Controller
{
    public function index()
    {
        $profile_list = Profile::latest()->get();
        return view ('admin/profile/profile', [
            'profile_list' => $profile_list,
        ]);
    }

    public function edit($id)
    {
        $profile = Profile::where('id',$id)->first();

        return view ('admin/profile/edit_profile', [
            'profile' => $profile,
            'id' => $id,
        ]);
    }

    public function update($id, Request $req)
    {

        // フォームから渡されたデータの取得
        $name = $req->name;
        $introduction = $req->introduction;
        $company = $req->company;
        $link_name = $req->link_name;
        $link_url = $req->link_url;
        $release = $req->release;
        $time = date("Y/m/d H:i:s");

        $image_path = "";
        $thumb_path = "";

        $message = "処理に失敗しました。";

//        更新
        if ($id != 0) {
            $profile = Profile::find($id);

            $profile->name = $name;
            $profile->introduction = $introduction;
            $profile->company = $company;
            $profile->link_name = $link_name;
            $profile->link_url = $link_url;
            $profile->status_flag = $release;
            $profile->updated_at = $time;

            if ($req->hasFile('image')) {
                if (!empty($profile->image) && Storage::disk('s3')->exists($profile->image)) Storage::disk('s3')->delete($profile->image);
                if (!empty($profile->thumb_image) && Storage::disk('s3')->exists($profile->thumb_image)) Storage::disk('s3')->delete($profile->thumb_image);

                $dir_name = 'profile';

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

                $profile->icon = $image_path;
                $profile->thumb_image = $thumb_path;
            }

            $profile->save();

            $message = "更新が完了しました。";
//            新規登録
        } else {
            if ($req->hasFile('image')) {

                $dir_name = 'profile';
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

            Profile::insert([
                'name' => $name,
                'introduction' => $introduction,
                'company' => $company,
                'link_name' => $link_name,
                'link_url' => $link_url,
                'icon' => $image_path,
                'thumb_image' => $thumb_path,
                'status_flag' => $release,
                'created_at' => $time,
            ]);

            $message = "新規登録が完了しました。";
        }
        if($req->delete){
            Profile::where('id', $id)->update([
                'deleted_at' => $time,
            ]);
            $message = "削除が完了しました。";
        }

        return redirect('admin/profile')->with('message', $message);
    }
}
