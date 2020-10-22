<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Tweet;
use App\Traits\Reactionable;


class HomeController extends Controller
{

    use Reactionable;
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        // 
        $tweets = Auth::user()->followersTweets()->leftJoinSub($this->reactionsCounter(), 'reactions', function($join){
            $join->on('tweets.id', '=', 'reactions.tweet_id');
        })->paginate(10);
        
        return \view('pages.home', ['tweets' => $tweets]);
    }
 
}
