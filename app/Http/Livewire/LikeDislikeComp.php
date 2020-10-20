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
        $tweetReactions = $this->tweet->reactions;
        $this->likeCounter = $this->likeCounterState($tweetReactions);
        $this->dislikeCounter = $this->dislikeCounterState($tweetReactions);
        $this->reaction = $this->reactionState($tweetReactions);
    }
 
    public function render()
    {
        return view('livewire.like-dislike-comp');
    }

     /**
     * Initialize likeCounter property
     * 
     * @param Illuminate\Support\Collection $tweetReactions
     * @return int 
     */
    public function likeCounterState($tweetReactions){
        return $tweetReactions->where('like', true)->count();
    }
    
     /**
     * Initialize dislikeCounter property
     * 
     * @param Illuminate\Support\Collection $tweetReactions
     * @return int 
     */
    public function dislikeCounterState($tweetReactions){
        return $tweetReactions->where('like', false)->count();
    }


    /**
     * Return tweet reaction state
     * 
     * @param Illuminate\Support\Collection $tweetReactions
     * @return string
     * 
     */
    public function reactionState($tweetReactions){
        if($tweetReactions->pluck('user_id')->contains(Auth::id())){
            $authUserReaction = $tweetReactions->firstWhere('user_id', Auth::id());
            if($authUserReaction->like == true){
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
