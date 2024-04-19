<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Upload extends Model
{
    use SoftDeletes;
    public function getSrcAttribute($value)
    {
        return ($value) ? rtrim(config('filesystems.disks.s3.url'), '/') . '/' . $value : '';
    }
}

