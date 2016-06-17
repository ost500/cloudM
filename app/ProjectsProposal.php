<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectsProposal extends Model
{
    protected $table = 'projects_proposals';

    public function project()
    {
        return $this->belongto('App\Project','id','p_id');
    }
}
