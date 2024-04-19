<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class License extends Model
{
    use SoftDeletes;

    public function recruits()
    {
        return $this->belongsToMany('App\Models\Recruit');
    }
}
