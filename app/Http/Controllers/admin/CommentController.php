<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Blog;
use App\Services\CommentService;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    protected $commentService;

    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    public function index()
    {
        $comments = $this->commentService->index();
        return view('template.admin.comments.index', compact('comments'));
    }

    public function create()
    {
        $item = new Comment();
        $blogs = Blog::all();
        return view('template.admin.comments.create_and_edit', compact('item', 'blogs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'blog' => 'required|exists:posts,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'content' => 'required|string',
            'status' => 'boolean'
        ]);

            $data = [
                'blog_id' => $request->input('blog'),
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'content' => $request->input('content'),
                'status' => $request->input('status', 0),
            ];

        $this->commentService->store($data);
        return redirect()->route('admin.comments.index')->with('success', __('messages.AddedMessage'));
    }


    public function edit($id)
    {
        $item = $this->commentService->find($id);
        $blogs = Blog::all();
        return view('template.admin.comments.create_and_edit', compact('item', 'blogs'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'blog' => 'required|exists:posts,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'content' => 'required|string',
            'status' => 'boolean'
        ]);

        $data = [
            'blog_id' => $request->input('blog'),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'content' => $request->input('content'),
            'status' => $request->input('status', 0),
        ];


        $this->commentService->update($data, $id);
        return redirect()->route('admin.comments.index')->with('success', __('messages.UpdatedMessage'));
    }

    public function destroy($id)
    {
        $this->commentService->destroy($id);
    }

    public function changeStatus(Request $request)
    {
        $id = $request->input("id");
        $comment = $this->commentService->find($id);
        $status = $comment->status ? 0 : 1;

        $this->commentService->updateAnyColumn(['status' => $status], $id);
    }
}
