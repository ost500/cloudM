<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectsArea extends Model
{
    protected $table = 'projects_areas';

    public function project()
    {
        return $this->belongsTo('App\Project','p_id','id');
    }
}
