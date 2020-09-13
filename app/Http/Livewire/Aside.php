<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Aside extends Component
{
    public function render()
    {
        return view('livewire.aside', ['userFollows' => Auth::User()->follows]);
    }
}
