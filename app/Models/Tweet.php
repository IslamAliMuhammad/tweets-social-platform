<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'body'];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function reactions(){
        return $this->hasMany('App\Models\Reaction');
    }

    /**
     * Retrieve user reaction upon the tweet
     * 
     * @param App\Models\User $user
     * @return  App\Models\Reaction or Null if not exist
     */
    public function userReaction(User $user){
        return $this->reactions()->where('user_id', $user->id)->first();
    }

    
}
