<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Blog;
use App\Models\User;
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
        $comment = new Comment();
        $blogs = Blog::all();
        $users = User::all();
        return view('template.admin.comments.create_and_edit', compact('comment', 'blogs', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'blog_id' => 'required|exists:posts,id',
            'user_id' => 'required|exists:users,id',
            'content' => 'required|string|max:500',
            'status' => 'boolean'
        ]);

        $this->commentService->store($request->all());
        return redirect()->route('admin.comments.index')->with('success', __('messages.AddedMessage'));
    }

    public function edit($id)
    {
        $comment = $this->commentService->find($id);
        $blogs = Blog::all();
        $users = User::all();
        return view('template.admin.comments.create_and_edit', compact('comment', 'blogs', 'users'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'content' => 'required|string|max:500',
            'status' => 'boolean'
        ]);

        $this->commentService->update($request->all(), $id);
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
