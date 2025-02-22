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
        $item = new Comment();
        $blogs = Blog::all();
        $users = User::all();
        return view('template.admin.comments.create_and_edit', compact('item', 'blogs', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'blog' => 'required|exists:posts,id', // Matches the input name in the form
            'user' => 'required|exists:users,id', // Matches the input name in the form
            'comment' => 'required|string|max:500', // Matches the textarea name in the form
            'status' => 'boolean'
        ]);

        $data = [
            'blog_id' => $request->input('blog'),
            'user_id' => $request->input('user'),
            'content' => $request->input('comment'),
            'status' => $request->input('status', 0),
        ];

        $this->commentService->store($data);
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
