<?php

namespace App\Http\Livewire\Search;

use Livewire\Component;
use App\Models\Profile;
use Livewire\WithPagination;

class LayoutComp extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $searchInput;

    public function updatingSearchInput(){
        $this->resetPage();
    }

    public function render()
    {
       
        return view('livewire.search.layout-comp', ['profiles' => $this->getSearchProfiles()]);
    }

    private function getSearchProfiles(){        
        if(!empty($this->searchInput)){
            return $profiles = Profile::where('profile_name', 'like', '%' .$this->searchInput . '%')->paginate(5);
        }

        return null;
    }
}
