<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TweetOverlayComp extends Component
{
    public $display;

    protected $listeners = ['displayTweetInputOverlay', 'closeTweetInputOverlay'];

    public function mount(){
        $this->display = 'none';
    }

    public function displayTweetInputOverlay(){
        $this->display = 'block';
    }

    public function closeTweetInputOverlay(){
        $this->display = 'none';
    }

    public function render()
    {
        return view('livewire.tweet-overlay-comp');
    }


}
