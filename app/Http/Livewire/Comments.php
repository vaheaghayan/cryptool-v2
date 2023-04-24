<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Cypher\Cypher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class Comments extends Component
{
    use WithPagination;

    public string $comment;
    public Cypher $cipher;

    public function __construct($id = null)
    {
        parent::__construct($id);
    }

    public function mount($cipher)
    {
        $this->cipher = $cipher;
    }

    public function addComment()
    {
        $this->validate([
            'comment' => 'required|max:1000',
        ]);

        Comment::create([
            'user_id' => Auth::id(),
            'body' => $this->comment,
            'cypher_id' => $this->cipher->id
        ]);
    }

    public function render(): View
    {
        return view('livewire.comments')
            ->with('comments', $this->getComments());
    }

    private function getComments(): LengthAwarePaginator
    {
        return Comment::with('user')->where('cypher_id', $this->cipher->id)->orderBy('created_at', 'desc')->paginate(20);
    }
}
