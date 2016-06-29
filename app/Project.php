<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Project extends Model
{
    //projects table의 모델이라고 명시해 준다.
    protected $table = 'projects';
    protected $fillable = ['step'];

    //
    public function application()
    {
        return $this->hasMany('App\Application', 'p_id', 'id');
    }

    public function contract()
    {
        return $this->hasMany('App\Contract', 'p_id', 'id');
    }

    public function client()
    {
        return $this->hasOne('App\User', 'id', 'Client_id');
    }

    public function projects_area()
    {
        return $this->hasMany('App\ProjectsArea', 'p_id', 'id');
    }

    public function projects_proposal()
    {
        return $this->hasMany('App\projectsProposal', 'p_id', 'id');
    }

    public function projects_file()
    {
        return $this->hasMany('App\projectsFile', 'p_id', 'id');
    }
    public function interesting()
    {
        return $this->hasMany('App\Interesting', 'p_id', 'id');
    }
}
