<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tweet;

class Bookmark extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'tweet_id'];

    public function tweet()
    {
        return $this->belongsTo('App\Models\Tweet');
    }
}
