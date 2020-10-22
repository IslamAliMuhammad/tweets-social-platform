<?php

namespace App\Traits;

trait Followable{

    public function follows(){
        return $this->belongsToMany('App\Models\User', 'follows', 'user_id', 'following_user_id');
    }

     /**
     * Check if user following given user
     * 
     * @param $id
     * @return true if user follow, false otherwise
     */
    public function isFollowing($id){

        $authUserFollowing = $this->follows;

        return $authUserFollowing->contains($id);
    }
    /**
     * Toggle between follow and unfollow
     * 
     * @param $user_id
     */
    public function toggleFollow($user_id){
   
        $this->follows()->toggle($user_id);

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