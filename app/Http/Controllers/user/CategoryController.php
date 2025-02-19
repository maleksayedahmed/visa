<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;


class CategoryController extends Controller
{
    public function index($id)
    {
        $mycategory = Category::where('id',$id)->first();
        $blogs = Blog::where('category_id', $id)->get();
        return view('template.user.category.index', compact('mycategory','blogs'));
    }
    // public function show($id)
    // {
    //     $mycountry = Country::where('id',$id)->first();
    //     $cities = City::where('country_id', $id)->get();
    //     return view('template.user.countries.show', compact('cities','mycountry'));
    // }


}
