<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\ProjectsArea
 *
 * @property integer $id
 * @property integer $p_id
 * @property string $area
 * @property integer $price
 * @property integer $commission
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Project $project
 * @method static \Illuminate\Database\Query\Builder|\App\ProjectsArea whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ProjectsArea wherePId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ProjectsArea whereArea($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ProjectsArea wherePrice($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ProjectsArea whereCommission($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ProjectsArea whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ProjectsArea whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $memo
 * @method static \Illuminate\Database\Query\Builder|\App\ProjectsArea whereMemo($value)
 */
class ProjectsArea extends Model
{
    protected $table = 'projects_areas';

    public function project()
    {
        return $this->belongsTo('App\Project','p_id','id');
    }
}
