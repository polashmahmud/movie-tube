<?php

namespace App;

use App\Favorite;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Video extends Model
{
    public function rates()
    {
        return $this->hasMany('App\Rate');
    }

    public function favorited()
	{
	    return (bool) Favorite::where('user_id', Auth::id())
	                        ->where('video_id', $this->id)
	                        ->first();
	}
}
