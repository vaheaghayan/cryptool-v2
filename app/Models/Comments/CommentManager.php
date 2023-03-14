<?php

namespace App\Models\Comments;

class CommentManager implements CommentContract
{
    public function store(array $data)
    {
        Comment::create($data);
    }

    public function delete(int $id)
    {
        Comment::where('id', $id)->delete();
    }

    public function getComments(int $cypher_id)
    {
        return Comment::where('cypher_id', $cypher_id)->orderBy('created_at', 'desc')->with('user')->get();
    }
}
