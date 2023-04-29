<?php

namespace App\Http\Livewire;

use App\Models\Conversation\Conversation;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Forum extends Component
{
    use WithPagination;

    public $title;
    public $description;

    public function __construct($id = null)
    {
        parent::__construct($id);
    }

    public function saveConversation()
    {
        $this->validate([
            'title' => 'required',
        ]);


        if (!$this->description) {
            $this->description = '';
        }

        Conversation::create([
            'title' => $this->title,
            'description' => $this->description,
            'author_id' => Auth::id()
        ]);
    }

    public function render()
    {
        return view('livewire.forum')->with(
            ['conversations' => $this->getConversations()]
        );
    }

    private function getConversations()
    {
        return Conversation::paginate(10);
    }

}
