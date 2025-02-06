<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;

class HomeController extends Controller
{
    public function dashBoard(){
        // return view('template.admin.dashboard');
    }

    public function index(){
        $sliders = Slider::where('status', 1)->get();
        // dd($sliders[0]->getFirstMediaUrl('slider'));
        return view('template.user.main.homepage' , compact('sliders'));

    }
}
