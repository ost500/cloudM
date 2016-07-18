<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    public function master()
    {
        return $this->belongsTo('App\FaqMaster', 'f_id', 'id');
    }
}
