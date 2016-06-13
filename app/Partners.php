<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partners extends Model
{
    //
    protected $fillable = [
        'user_id', 'job',
    ];
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
    public function job()
    {
        return $this->hasMany('App\Partners_job', 'partner_id', 'id');
    }
    public function skill()
    {
        return $this->hasMany('App\Skill', 'partner_id', 'id');
    }
    
}
