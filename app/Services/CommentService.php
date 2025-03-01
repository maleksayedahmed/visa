<?php

namespace App\Services;

use App\Models\Comment;

class CommentService
{
    public function index()
    {
        return Comment::with(['user', 'blog'])->latest()->get();
    }

    public function store($data)
    {
        return Comment::create($data);
    }

    public function find($id)
    {
        return Comment::findOrFail($id);
    }

    public function update($data, $id)
    {
        $comment = $this->find($id);
        $comment->update($data);
        return $comment;
    }

    public function destroy($id)
    {
        return Comment::destroy($id);
    }

    public function updateAnyColumn($data, $id)
    {
        return Comment::where('id', $id)->update($data);
    }
}
