<?php

namespace App\Models\Conversation;

interface ConversationContract {
    public function store(array $data);

    public function update(array $data, int $id);

    public function delete($id);
}
