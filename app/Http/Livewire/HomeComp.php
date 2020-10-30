<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Traits\Reactionable;
use Livewire\WithPagination;

class HomeComp extends Component
{
    use Reactionable;
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    
 
    public function render()
    {
        return view('livewire.home-comp', ['tweets' => $this->tweetsJoinReactions(Auth::user()->followersTweets())->paginate(10)]);
    }
 
}
