<?php

namespace App\Http\Livewire\Search;

use Livewire\Component;

class OutputItemComp extends Component
{
    public $profile;
    
    public function render()
    {
        return view('livewire.search.output-item-comp');
    }
}
