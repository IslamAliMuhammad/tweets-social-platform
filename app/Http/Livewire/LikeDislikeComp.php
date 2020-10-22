<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Reaction;


class LikeDislikeComp extends Component
{
    public $tweet;

    public $reaction;
    public $likeCounter;
    public $dislikeCounter;


    public function mount(){
        $this->reaction = $this->reactionState();
        $this->likeCounter = $this->tweet->like_counter ? $this->tweet->like_counter : 0;
        $this->dislikeCounter = $this->tweet->dislike_counter ? $this->tweet->dislike_counter : 0;
    }
 
    public function render()
    {
        return view('livewire.like-dislike-comp');
    }

    /**
     * Return tweet reaction state
     * 
     * @return string
     * 
     */
    public function reactionState(){
        $reaction = $this->tweet->userReaction(Auth::user());

        if($reaction){
            if($reaction->like == true){
                return 'like';
            }else{
                return 'dislike';
            }
        }
        return 'default';
    }   

    /**
     * Handle like reaction
     * 
     * @return void
     */
    public function like(){
        if($this->reaction === 'like'){
            $this->deleteReaction();
            $this->likeCounter--;
            $this->reaction = 'default';
        }else{
            $reaction = $this->storeReaction(true);
            if($reaction->wasRecentlyCreated){
                $this->likeCounter++;
            }else{
                $this->likeCounter++;
                $this->dislikeCounter--;
            }
            $this->reaction = 'like';
        }
    }

    /**
     * Handle dislike reaction
     * 
     * @return void
     */
    public function dislike(){
        if($this->reaction === 'dislike'){
            $this->deleteReaction();
            $this->dislikeCounter--;
            $this->reaction = 'default';
        }else{
            $reaction = $this->storeReaction(false);
            if($reaction->wasRecentlyCreated){
                $this->dislikeCounter++;
            }else{
                $this->dislikeCounter++;
                $this->likeCounter--;
            }
            $this->reaction = 'dislike';
        }
    }

    /**
     * Store or update like/dislike reaction 
     * 
     * @return App\Models\Reaction 
     */
    private function storeReaction($isLike){
        return Reaction::updateOrCreate(['user_id' => Auth::id(), 'tweet_id' => $this->tweet->id],
                             ['like' => $isLike]);

    }

    /**
     * Delete like/dislike reaction 
     * 
     * @return App\Models\Reaction 
     */
    private function deleteReaction(){
        $reactionRecord = Reaction::where([
            ['user_id', '=' ,Auth::id()],
            ['tweet_id', '=', $this->tweet->id]
        ])->firstOrFail();
        $reactionRecord->delete();
    }
    
}
