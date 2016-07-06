<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Interesting
 *
 * @property integer $id
 * @property integer $u_id
 * @property integer $p_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Project $project
 * @method static \Illuminate\Database\Query\Builder|\App\Interesting whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Interesting whereUId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Interesting wherePId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Interesting whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Interesting whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Interesting extends Model
{
    public function project()
    {
        return $this->belongsTo('App\Project','p_id','id');
    }
}
