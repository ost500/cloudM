<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectsFile extends Model
{
    protected $table = 'projects_files';

    public function project()
    {
        return $this->belongto('App\Project','id','p_id');
    }
}
