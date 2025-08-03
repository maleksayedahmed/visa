<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Visa;

class VisaController extends Controller
{
    public function index()
    {
        $visas = Visa::where('status', 1)->with('country')->paginate(12);
        return view('template.user.visas.index', compact('visas'));
    }

    // Display a specific visa by slug
    public function show($slug)
    {
        $visa = Visa::where('slug', $slug)->where('status', 1)->with('country')->firstOrFail();
        $relatedVisas = Visa::where('status', 1)
            ->where('id', '!=', $visa->id)
            ->where('country_id', $visa->country_id)
            ->with('country')
            ->take(3)
            ->get();
        

        
        return view('template.user.visas.show', compact('visa', 'relatedVisas'));
    }
}
