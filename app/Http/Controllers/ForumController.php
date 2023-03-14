<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConversationEditRequest;
use App\Models\Conversation\Conversation;
use App\Models\Conversation\ConversationContract;
use App\Models\Conversation\ConversationMessage;
use Illuminate\Support\Facades\Auth;

class ForumController extends Controller
{
    private ConversationContract $conversation;

    public function __construct(ConversationContract $conversation)
    {
        $this->conversation = $conversation;
    }

    public function index()
    {
        $chats = Conversation::all();
        $lastMessages = ConversationMessage::orderBy('created_at')->take(5)->get();
        $categories = Conversation::CATEGORIES;

        return view('cryptool.forum.index')->with([
            'chats' => $chats,
            'lastMessages' => $lastMessages,
            'categories' => $categories
        ]);
    }

    public function create()
    {
        $categories = Conversation::CATEGORIES;

        return view('cryptool.forum.edit')->with([
            'categories' => $categories
        ]);
    }

    public function store(ConversationEditRequest $request)
    {
        $validatedData = $request->validated()['data'];
        $validatedData['author_id'] = Auth::user()->id;
        $this->conversation->store($validatedData);

        return redirect(cLng() . '/forum');
    }
}
