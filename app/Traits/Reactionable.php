<?php

namespace App\Traits;

use App\Models\Reaction;
use App\Models\Bookmark;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;


trait Reactionable{

    /**
     * Builder for reactions like and dislike counter
     * 
     * @return Illuminate\Database\Query\Builder
     */
    public function reactionsSubQuery(){
        return Reaction::select(DB::raw('`tweet_id`, SUM(`like`) AS `like_counter`, SUM(!`like`) AS `dislike_counter`'))->groupBy('tweet_id');
    }
    
    public function bookmarksSubQuery(){
       return Bookmark::select(DB::raw('`id` AS `bookmark_id`, `tweet_id` AS `b_tweet_id`, `user_id` AS `b_user_id`'));
    }
    /**
     * Join tweets with reactions and bookmarks
     * 
     * @param Illuminate\Database\Eloquent\Builder $tweets
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function tweetsJoin(Builder $tweets){
        
        return $tweets->leftJoinSub($this->reactionsSubQuery(), 'reactions', function($join){
            $join->on('tweets.id', '=', 'reactions.tweet_id');
        })->leftJoinSub($this->bookmarksSubQuery(), 'bookmarks', function($join){
            $join->on('tweets.id', '=', 'bookmarks.b_tweet_id')->where('bookmarks.b_user_id', '=', Auth::user()->id);
        });
        
    }
}