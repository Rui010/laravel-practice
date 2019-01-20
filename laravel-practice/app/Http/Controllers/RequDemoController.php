<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class RequDemoController extends Controller
{
    public function getIndex()
    {
        $enquetes = \App\Enquete::orderBy('created_at', 'desc')->paginate(3);
        return view('request.index')->with('enquetes', $enquetes);
    }

    public function confirm(\App\Http\Requests\ValiDemoRequest $request)
    {
        $data = $request->all();
        return view('request.confirm')->with($data);
    }

    public function finish(\App\Http\Requests\ValiDemoRequest $request)
    {
        $enquete = new \App\Enquete;
        $enquete->username = $request->username;
        $enquete->mail = $request->mail;
        $enquete->age = $request->age;
        $enquete->opinion = $request->opinion;
        $enquete->save();
        // $data = $request->all();
        // Mail::send('mail.temp', $data, function($message) use($data) {
        //     $message->to($data["mail"])->subject($data["username"]);
        // });
        return view('request.finish');
    }
}
