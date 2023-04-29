<?php

namespace App\Http\Controllers;

use App\Models\Conversation\Conversation;
use App\Models\Conversation\ConversationMessage;
use Illuminate\Http\Request;

class ConversationController extends Controller
{
    public function index(Request $request)
    {
        $conversation = Conversation::where('id', $request->id)->first();
        if (!$conversation) {
            abort(404);
        }

        return view('cryptool.forum.conversation')->with([
            'conversation' => $conversation
        ]);
    }
}
