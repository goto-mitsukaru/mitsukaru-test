<?php

namespace App\Http\Controllers;

use App\Models\PrefectureMaster;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class BlackController extends Controller
{
    public function index()
    {
        return view('taxblacksinndann.top.index',  [
            'prefectures' => PrefectureMaster::all(),
        ]);
    }

    public function thanks()
    {
        return view('taxblacksinndann.top.thanks');
    }

}
