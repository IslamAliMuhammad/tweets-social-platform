<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Tweet;
use App\Models\User;

use Illuminate\Support\Facades\Auth;


class Main extends Component
{
    
    public function render()
    {
        $tweets = Auth::user()->timelineTweets();
        return view('livewire.main', [
            'tweets' => $tweets,
        ]);
    }
   
}
