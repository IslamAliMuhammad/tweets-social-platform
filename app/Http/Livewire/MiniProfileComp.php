<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MiniProfileComp extends Component
{
    public $user;
    public $loopFirst;
    
    public function render()
    {
        return view('livewire.mini-profile-comp');
    }
}
