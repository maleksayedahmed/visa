<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Country;
use App\Models\Slider;

class HomeController extends Controller
{
    public function dashBoard(){
        return view('template.admin.dashboard');
    }

    public function index(){
        $sliders = Slider::where('status', 1)->get();
        $categories = Category::where('status', 1)->get();
        $countries = Country::where('status', 1)->get();
        // dd($sliders[0]->getFirstMediaUrl('slider'));
        return view('template.user.main.homepage' , compact('sliders' , 'categories' , 'countries'));

    }

    public function posts($country = null , $category = null){
        dd($category);
        $posts = Blog::where('status' , 1);

        if($country != null){
            $posts->where('country_id' , $country);
        }
        if($category != null){
            $posts->where('category_id' , $category);
        }

        $posts->get;


    }
}
