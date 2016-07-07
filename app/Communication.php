<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Communication extends Model
{
    public function writer()
    {
        return $this->belongsTo('App\User', 'writer_id', 'id');
    }
}
