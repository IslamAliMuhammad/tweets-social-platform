<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class ExploreComp extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.explore-comp', [ 'users' => User::with('profile')->where('id' , '!=', Auth::id())->paginate(10) ]);
    }
}
