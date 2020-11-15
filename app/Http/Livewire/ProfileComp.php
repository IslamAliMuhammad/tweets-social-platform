<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Traits\Reactionable;
use Livewire\WithPagination;

class ProfileComp extends Component
{   
    use Reactionable;
    use WithPagination;
    
    protected $paginationTheme = 'bootstrap';

    public $user;
    public $profile;

    public function mount(User $user){
        $this->user = $user;
        $this->profile = $user;
        $this->profile = $user->profile;
    }

    public function render()
    {
        return view('livewire.profile-comp', ['tweets' => $this->tweetsJoinReactions($this->user->tweets()->latest()->getQuery())->paginate(10)]);
    }
}
