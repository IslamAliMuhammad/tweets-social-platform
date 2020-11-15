<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DisplayTweetInputBtnComp extends Component
{
    public $display;

    public function mount(){
        $this->display = 'none';
    }

    public function displayTweetInput(){
        $this->display = 'block';

    }
    
    public function render()
    {
        return <<<'blade'
            <div>
                
                <livewire:tweet-overlay-comp :display="$display" >
            </div>
        blade;
    }
}
