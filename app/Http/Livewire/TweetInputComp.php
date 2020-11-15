<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Tweet;

class TweetInputComp extends Component
{
    public $tweetBody;

    protected $rules = [
        'tweetBody' => 'required|max:255',
    ];

    public function submit(){

        $this->validate();

        Tweet::create(['user_id' => Auth::id(), 'body' => $this->tweetBody]);

        return redirect()->to(route('profiles.show', Auth::user()->user_name));

    }

    public function render()
    {
        return view('livewire.tweet-input-comp');
    }

    
}
