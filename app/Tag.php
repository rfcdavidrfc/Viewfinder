<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function feeds(){
        return $this->belongsToMany('App\Feed', 'feed_tag');
    }
}
