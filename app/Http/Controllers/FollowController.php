<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class FollowController extends Controller
{
    //
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($user_id)
    {
        //

        if(Auth::user()->isFollowing($user_id)){
            Auth::user()->follows()->detach($user_id);
        }else{
            Auth::user()->follows()->attach($user_id);
        }

        return back();
    }
}
