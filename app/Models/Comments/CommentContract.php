<?php

namespace App\Models\Comments;

interface CommentContract
{
    public function store(array $data);

    public function delete(int $id);

    public function getComments(int $cypher_id);
}
