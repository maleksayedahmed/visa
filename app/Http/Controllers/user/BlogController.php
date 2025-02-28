<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Blog;

class BlogController extends Controller
{
    // Display all blogs
    public function index()
    {
        $blogs = Blog::paginate(10);  // Or you can paginate if you have many blogs
        return view('template.user.blogs.blogs', compact('blogs'));
    }

    // Display a specific blog by ID
    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        return view('template.user.blogs.blog', compact('blog'));
    }
}
