<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Tweet;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

use App\Models\Reaction;
use App\Models\Bookmark;
use App\Traits\Reactionable;
class BookmarksComp extends Component
{
    use WithPagination;
    use Reactionable;
    protected $paginationTheme = 'bootstrap';
    public $tweetsIds;

    public function mount(){
        $this->tweetsIds = Bookmark::where('user_id', Auth::user()->id)->get()->pluck('tweet_id')->flatten();
        }
    public function render()
    {

        return view('livewire.bookmarks-comp', ['tweets' => $this->tweetsJoin(Tweet::whereIn('id', $this->tweetsIds))->paginate(10)]);
    }
}
