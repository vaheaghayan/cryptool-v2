<?php

namespace App\Models\Conversation;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Model;

class ConversationMessage extends Model
{
    protected $table = 'conversation_messages';

    protected $fillable = [
        'user_id',
        'conversation_id',
        'body',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
