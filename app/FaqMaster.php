<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FaqMaster extends Model
{
    public function faq()
    {
        return $this->hasMany('App\Faq', 'f_id', 'id');
    }
}
