<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\VisaType;
use Illuminate\Support\Facades\View;


class ServiceController extends Controller
{
    public function index()
    {
        $services = VisaType::paginate(10);  // Or you can paginate if you have many blogs
        return view('template.user.service.index', compact('services'));
    }
    public function boot()
    {
        View::composer('*', function ($view) {
            $view->with('visaTypes', VisaType::all());
        });
    }

    // // Display a specific visa by ID
    // public function show($id)
    // {
    //     $services = VisaType::findOrFail($id);
    //     return view('template.user.service.show', compact('services'));
    // }
}
