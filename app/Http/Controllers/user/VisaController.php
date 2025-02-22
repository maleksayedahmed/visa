<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Visa;

class VisaController extends Controller
{
    public function index()
    {
        $visas = Visa::paginate(10);  // Or you can paginate if you have many blogs
        return view('template.user.visas.index', compact('visas'));
    }

    // Display a specific visa by ID
    public function show($id)
    {
        $visa = Visa::findOrFail($id);
        return view('template.user.visas.show', compact('visa'));
    }
}
