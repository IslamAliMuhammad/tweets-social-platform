<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Bookmark;

class BookmarkComp extends Component
{
    public $bookmark = false;
    public $tweet;

    public function mount(){
        $this->bookmark = $this->tweet->bookmark_id ? true : false;
    }

    public function bookmarkHandler(){
        if($this->bookmark){            
            $this->deleteBookmark();
            $this->bookmark = false;
        }else{
            $this->addBookmar();
            $this->bookmark = true;
        }
    }
    
    public function addBookmar(){
        Bookmark::create(['user_id' => Auth::user()->id, 'tweet_id' => $this->tweet->id, ]);
    } 

    public function deleteBookmark(){
        $bookmark = Bookmark::where([
            ['user_id', '=', Auth::user()->id],
            ['tweet_id', '=', $this->tweet->id]
        ])->firstOrFail();

        $bookmark->delete();
    }

    public function render()
    {
        return <<<'blade'
            <div class="ml-4">
                <i class="far fa-bookmark {{ $bookmark ? 'text-info' : 'text-muted'}}" wire:click="bookmarkHandler" role="button"></i>
            </div>
        blade;
    }
}
