<?php

namespace App\Traits;
use App\Models\User;

trait Followable{

    public function follows(){
        return $this->belongsToMany('App\Models\User', 'follows', 'user_id', 'following_user_id');
    }

     /**
     * Check if user following given user
     * 
     * @param $id
     * @return bool
     */
    public function isFollowing(User $user){

        $authUserFollowing = $this->follows;

        return $authUserFollowing->contains($user->id);
    }

    /**
     * Retrieve followers ids for a user
     * 
     * @return Illuminate\Datbase\Eloquent\Collection 
     */
    public function userFollowers(){
        return $this->follows()->select('id')->get();
    }
    
}