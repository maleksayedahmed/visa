<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Country;
use App\Models\City;


class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::all();  // Or you can paginate if you have many blogs
        return view('template.user.countries.index', compact('countries'));
    }
    public function show($id)
    {
        $mycategory = Country::where('id',$id)->first();
        // $mycategory = Category::where('country_id',$id)->first();
        $cities = City::where('country_id', $id)->get();
        $blogs = Blog::where('country_id', $id)->where('status', 1)->get();

        return view('template.user.countries.show', compact('mycategory' , 'blogs'));
    }


}
