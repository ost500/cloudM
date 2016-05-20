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
        return $this->hasOne('App\Project', 'id', 'p_id');
    }
    public function projectStep($step)
    {
        return $this->hasOne('App\Project', 'id', 'p_id')->orwhere('step','=',$step);
    }
    public function projectArray($step)
    {
        $return = "";
        foreach($step as $eachStep){
            $return = $this->hasOne('App\Project', 'id', 'p_id')->orwhere('step','=',$eachStep);
        }
        return $return;
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'u_id', 'id');
    }

}
