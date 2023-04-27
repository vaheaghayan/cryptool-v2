<?php

namespace App\Http\Livewire;

use App\Models\UserInformation;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Photo extends Component
{
    use WithFileUploads;

    public $photo;

    public function mount($user)
    {
        $this->user = $user;
    }

    public function updatedPhoto($value)
    {
        $validatedData = $this->validate([
            'photo' => 'image|max:1024',
        ]);
    }

    public function save()
    {
        $imageName = now()->timestamp . '_' . $this->photo->getClientOriginalName();
        $this->photo->storeAs('/content/images', $imageName, 'custom');

        UserInformation::updateOrCreate(['user_id' => Auth::id()], ['avatar' => $imageName]);

        $this->emit('photoSaved', ['message' => 'successfully']);
    }
}
