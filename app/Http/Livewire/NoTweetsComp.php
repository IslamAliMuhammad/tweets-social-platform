<?php

namespace App\Http\Livewire;

use Livewire\Component;

class NoTweetsComp extends Component
{
    public function render()
    {
        return <<<'blade'
            <div class="card card-body mt-2 ">   
                <p class="card-">No tweets to display</p>
            </div>
        blade;
    }
}
