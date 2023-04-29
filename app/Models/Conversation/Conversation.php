<?php

namespace App\Models\Conversation;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    protected $table = 'conversations';

    protected $fillable = [
        'category',
        'title',
        'description',
        'author_id'
    ];

    public function messages()
    {
        return $this->hasMany(ConversationMessage::class, 'conversation_id', 'id');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }
}
