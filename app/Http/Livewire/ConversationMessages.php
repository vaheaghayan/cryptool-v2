<?php

namespace App\Http\Livewire;

use App\Models\Conversation\ConversationMessage;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ConversationMessages extends Component
{
    use WithPagination;

    public $message;
    public $conversation;
    public $conversationMessages;

    protected $middleware = ['livewire'];

    public function __construct($id = null)
    {
        parent::__construct($id);

    }

    public function mount($conversation)
    {
        $this->conversation = $conversation;
    }

    public function saveMessage()
    {
        ConversationMessage::create([
            'user_id' => Auth::id(),
            'conversation_id' => $this->conversation->id,
            'body' => $this->message
        ]);
    }


    public function render()
    {
        $this->conversationMessages = [$this->getMessages()];

        return view('livewire.conversation-messages')
//            ->with([
//            'conversationMessages' => $this->getMessages()
//        ])
            ;
    }

    public function removeMessage($id)
    {
        ConversationMessage::where('id', $id)->delete();
    }

    protected function getMessages()
    {
        return ConversationMessage::where('conversation_id', $this->conversation->id)->orderBy('created_at', 'desc')->paginate(20);
    }
}
