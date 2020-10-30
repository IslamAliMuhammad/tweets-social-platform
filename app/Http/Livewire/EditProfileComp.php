<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class EditProfileComp extends Component
{
    use AuthorizesRequests;

    public $profile;

    public function mount(User $user){
        $this->authorize('edit', $user);
        $this->profile = $user->profile;
    }

    public function render()
    {
        return view('livewire.edit-profile-comp');
    }
}
