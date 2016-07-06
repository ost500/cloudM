<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\ProjectsProposal
 *
 * @property integer $u_id
 * @property integer $p_id
 * @property integer $f_id
 * @property string $source_name
 * @property string $file_name
 * @property integer $file_size
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\ProjectsProposal whereUId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ProjectsProposal wherePId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ProjectsProposal whereFId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ProjectsProposal whereSourceName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ProjectsProposal whereFileName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ProjectsProposal whereFileSize($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ProjectsProposal whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ProjectsProposal whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ProjectsProposal extends Model
{
    protected $table = 'projects_proposals';

    public function project()
    {
        return $this->belongto('App\Project','id','p_id');
    }

    public function application()
    {
        return $this->belongto('App\Project','id','p_id');
    }
}
