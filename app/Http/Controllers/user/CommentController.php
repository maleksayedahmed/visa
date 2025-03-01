<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Blog;

class CommentController extends Controller
{
    public function store(Request $request, $blogId)
    {
        // Validate the incoming request data
        $request->validate([
            // 'blog_id' => 'required|exists:posts,id', // Ensure the blog exists
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'content' => 'required|string',
        ]);
        $blog = Blog::findOrFail($blogId);

        // Create a new comment
        Comment::create([
            'blog_id' => $blog->id,
            'name' => $request->name,
            'email' => $request->email,
            'content' => $request->content,
            'status' => true, // Default to approved, or use your logic here
        ]);

        return back()->with('success', 'Your comment has been submitted!');
    }
}
