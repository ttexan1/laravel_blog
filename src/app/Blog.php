<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    public function articles() {
        return $this->hasMany('App\Article');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}
