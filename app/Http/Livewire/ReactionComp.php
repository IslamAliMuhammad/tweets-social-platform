<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ReactionComp extends Component
{
    public $tweet;

    public function render()
    {
        return <<<'blade'
            <div>
                <livewire:like-dislike-comp :tweet="$tweet">
            </div>
        blade;
    }

}
