<?php

namespace App\Traits;

use App\Models\Reaction;
use Illuminate\Support\Facades\DB;

trait Reactionable{

    /**
     * Builder for reactions like and dislike counter
     * 
     * @return Illuminate\Database\Query\Builder
     */
    public function reactionsCounter(){
        return Reaction::select(DB::raw('`tweet_id`, SUM(`like`) AS `like_counter`, SUM(!`like`) AS `dislike_counter`'))->groupBy('tweet_id');
    }

}