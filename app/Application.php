<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'p_id', 'u_id'
    ];

    public function project()
    {
        return $this->belongsTo('App\Project', 'p_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo('App\User', 'u_id', 'id');
    }

}
