<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Country;
use App\Models\User;
use App\Services\BlogService;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    protected $blogService;
    public function __construct(BlogService $blogService)
    {
        $this->blogService = $blogService;
    }
    public function index()
    {
        $blogs = $this->blogService->index();
        return view('template.admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        $blog = new Blog();
        $categories = Category::all();
        $users = User::all();
        return view('template.admin.blogs.create_and_edit', compact('blog', 'categories', 'users'));
    }

    public function store(BlogRequest $request)
    {
        // dd($request);
        $this->blogService->store($request->validated());
        return redirect()->route('admin.blogs.index')->with('success', __('messages.AddedMessage'));
    }

    public function edit( $id)
    {
        $blog = $this->blogService->find($id);
        $categories = Category::all();
        $users = User::all();
        $countries = Country::where('status' , 1)->get();
        return view('template.admin.blogs.create_and_edit', compact('blog', 'categories', 'users' , 'countries'));
    }

    public function update(BlogRequest $request, $id)
    {
        $this->blogService->update($request->validated(),$id);
        return redirect()->route('admin.blogs.index')->with('success', __('messages.UpdatedMessage'));
    }

    public function destroy($id)
    {
        $this->blogService->destroy($id);
    }

    function changeStatus(Request $request)
    {
        $id = $request->input("id");
        $blog = $this->blogService->find($id);
        $status = 0;
        if (isset($blog) && !empty($blog->id)) {
            if ($blog->status == 1) {
                $status = 0;
            } else {
                $status = 1;
            }
        }
        $data = array(
            'status' => $status
        );
        $blog = $this->blogService->updateAnyColumn($data, $id);
    }

}
