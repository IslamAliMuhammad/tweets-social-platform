<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Tweet;

class TweetComp extends Component
{
    public $tweet;
    
    public function render()
    {
        return view('livewire.tweet-comp');
    }
}
