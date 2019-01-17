<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RequDemoController extends Controller
{
    public function getIndex()
    {
        return view('request.index');
    }

    public function confirm(\App\Http\Requests\ValiDemoRequest $request)
    {
        $data = $request->all();
        return view('request.confirm')->with($data);
    }
}
