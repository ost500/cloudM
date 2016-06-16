<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectsArea extends Model
{
    protected $table = 'projects_areas';

    public function project()
    {
        return $this->belongto('App\Project','id','p_id');
    }
}
