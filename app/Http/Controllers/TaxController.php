<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class TaxController extends Controller
{
    public function index()
    {
        return view('taxnennsyushinndann.top.index');
    }

    public function thanks(Request $request)
    {
        $name = !empty($request->session()->get('name')) ? $request->session()->get('id') : '';

        return view('taxnennsyushinndann.top.thanks',[
            'name' => $name
        ]);
    }

}
