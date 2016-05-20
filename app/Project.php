<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Project extends Model
{
    //projects table의 모델이라고 명시해 준다.
    protected $table = 'projects';
    //
    public function application()
    {
        return $this->hasMany('App\Application', 'p_id', 'id');
    }
    public function contract()
    {
        return $this->hasMany('App\Contract','p_id','id');
    }
    public function client()
    {
        return $this->hasOne('App\User','id','Client_id');
    }
}
