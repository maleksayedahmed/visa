<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
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
        $mycountry = Country::where('id',$id)->first();
        $cities = City::where('country_id', $id)->get();
        return view('template.user.countries.show', compact('cities','mycountry'));
    }


}
