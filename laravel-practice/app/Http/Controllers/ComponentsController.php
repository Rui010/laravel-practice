<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComponentsController extends Controller
{
    public function user_list() {
        return view('users.list');
    }
}
