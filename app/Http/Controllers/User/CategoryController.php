<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;


class CategoryController extends Controller
{
    public function index($id)
    {
        $mycategory = Category::where('id', $id)->where('status', 1)->first();
        if (!$mycategory) {
            return redirect('/')->with('error', 'Category not found or inactive.');
        }

        $blogs = Blog::where('category_id', $id)->where('status', 1)->get();
        return view('template.user.category.index', compact('mycategory', 'blogs'));
    }
    // public function show($id)
    // {
    //     $mycountry = Country::where('id',$id)->first();
    //     $cities = City::where('country_id', $id)->get();
    //     return view('template.user.countries.show', compact('cities','mycountry'));
    // }

    // public function index($id)
    // {
    //     $mycategory = Category::where('id', $id)->where('status', 'active')->first();
    //     if (!$mycategory) {
    //         return redirect()->back()->with('error', 'Category not found or inactive.');
    //     }

    //     $blogs = Blog::where('category_id', $id)->where('status', 'active')->get();
    //     return view('template.user.category.index', compact('mycategory', 'blogs'));
    // }
}
