<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    public function partner()
    {
        return $this->belongsTo('App\Partners', 'partner_id', 'id');
    }
}
