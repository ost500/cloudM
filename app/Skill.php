<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = ['title','number','experience'];

    public function partner()
    {
        return $this->belongsTo('App\Partners', 'partner_id', 'id');
    }
}
