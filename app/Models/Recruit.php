<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recruit extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function occupations()
    {
        return $this->belongsToMany('App\Models\Occupation');
    }

    public function licenses()
    {
        return $this->belongsToMany('App\Models\License');
    }

    public function incomes()
    {
        return $this->belongsToMany('App\Models\Income');
    }

    public function features()
    {
        return $this->belongsToMany('App\Models\Feature');
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

    protected $guarded = ['id']; // 👈 Mass assignment スプシでエラーにならないようにしています

}
