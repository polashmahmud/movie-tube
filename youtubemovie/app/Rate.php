<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    protected $fillable = [
        'rate', 'user_id', 'video_id'
    ];

    public function video()
    {
        return $this->belongsTo('App\Video');
    }
}
