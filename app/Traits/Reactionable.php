<?php

namespace App\Traits;

use App\Models\Reaction;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;


trait Reactionable{

    /**
     * Builder for reactions like and dislike counter
     * 
     * @return Illuminate\Database\Query\Builder
     */
    public function reactionsCounter(){
        return Reaction::select(DB::raw('`tweet_id`, SUM(`like`) AS `like_counter`, SUM(!`like`) AS `dislike_counter`'))->groupBy('tweet_id');
    }

    /**
     * Left join tweets to their reations counter represented as two columns like_counter and dislike_counter
     * 
     * @param Illuminate\Database\Eloquent\Builder $tweets
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function tweetsJoinReactions(Builder $tweets){
        return $tweets->leftJoinSub($this->reactionsCounter(), 'reactions', function($join){
            $join->on('tweets.id', '=', 'reactions.tweet_id');
        });
    }
}