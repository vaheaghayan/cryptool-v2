<?php

namespace App\Models\Conversation;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    const CATEGORIES = [
        'classic_algorithms',
        'hash_algorithms',
        'cryptographic_algorithms'
    ];

    protected $table = 'conversations';

    protected $fillable = [
        'category',
        'title',
        'description',
        'author_id'
    ];

    public function messages()
    {
        return $this->hasMany(ConversationMessage::class, 'chat_id', 'id');
    }
}
