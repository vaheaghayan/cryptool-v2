<?php

namespace App\Models\Conversation;

class ConversationManager implements ConversationContract {
    public function store(array $data)
    {
        Conversation::create($data);
    }

    public function update(array $data, int $id)
    {
        Conversation::where('id', $id)->update($data);
    }

    public function delete($id)
    {
        Conversation::where('id', $id)->delete();
    }
}
