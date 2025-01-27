<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function dashBoard(){
        return view('template.admin.dashboard');
    }
}
