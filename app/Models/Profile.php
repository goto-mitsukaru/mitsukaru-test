<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use SoftDeletes;

    /**
     * URL付きサムネイル画像リンクに変換
     */
    public function getIconAttribute($value)
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
}

