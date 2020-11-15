<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\URL;

class NavbarComp extends Component
{
    public $navigation;
    
    public function mount(){
        $this->navigation = explode('/', request()->path())[0];
    }
     
    public function render()
    {   
        return view('livewire.navbar-comp');
    }
}
