<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function dashBoard(){
        return view('template.admin.dashboard');
    }
}
