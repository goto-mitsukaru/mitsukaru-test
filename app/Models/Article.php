<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;
    public function category()
    {
        //Categoriesモデルのデータを取得する
        return $this->belongsTo('App\Models\Category');
    }

    public function tag()
    {

        return $this->belongsToMany('\App\Models\Tag');
    }

    /**
     * URL付きサムネイル画像リンクに変換
     */
    public function getImageAttribute($value)
    {
        return ($value) ? rtrim(config('filesystems.disks.s3.url'), '/') . '/' . $value : '';
    }

    /**
     * URL付きサムネイル画像リンクに変換
     */
    public function getThumbImageAttribute($value)
    {
        return ($value) ? rtrim(config('filesystems.disks.s3.url'), '/') . '/' . $value : '';
    }

    public function show()
    {
        $task = $this;
        $table = $task->getTable();
        $columns = $task->getConnection()->getSchemaBuilder()->getColumnListing($table);
        return $columns;
    }
}
