<?php

namespace App\Http\Controllers;

use App\Models\Conversation\Conversation;
use App\Models\Conversation\ConversationContract;

class ForumController extends Controller
{
    private ConversationContract $conversation;

    public function __construct(ConversationContract $conversation)
    {
        $this->conversation = $conversation;
    }

    public function index()
    {
        $conversations = Conversation::all();

        return view('cryptool.forum.index')->with([
            'conversations' => $conversations,
        ]);
    }
}
