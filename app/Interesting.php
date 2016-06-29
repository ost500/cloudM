<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interesting extends Model
{
    public function project()
    {
        return $this->belongsTo('App\Project','p_id','id');
    }
}
