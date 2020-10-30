<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FollowButtonComp extends Component
{
    public $follow;
    public $user;

    public function mount(){
        $this->follow = Auth::user()->isFollowing($this->user);
    }

    public function render()
    {
        return view('livewire.follow-button-comp');
    }

    public function toggleFollow(){
        Auth::user()->follows()->toggle($this->user);
        $this->follow = $this->follow ? false : true;
    }
}
