<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class TennsyokuController extends Controller
{
    public function index()
    {
        return view('taxtennsyokusinndann.top.index');
    }

    public function thanks()
    {
        return view('taxtennsyokusinndann.top.thanks');
    }

}
