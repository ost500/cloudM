<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


/**
 * App\Evaluation
 *
 * @property integer $id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property integer $partner_id
 * @property integer $project_id
 * @property integer $star
 * @property string $evaluation
 * @method static \Illuminate\Database\Query\Builder|\App\Evaluation whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Evaluation whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Evaluation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Evaluation wherePartnerId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Evaluation whereProjectId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Evaluation whereStar($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Evaluation whereEvaluation($value)
 * @mixin \Eloquent
 */
class Evaluation extends Model
{


    public function partner()
    {
        return $this->belongsTo('App\Partners', 'partner_id', 'id');
    }
    public function project()
    {
        return $this->belongsTo('App\Project', 'project_id', 'id');
    }
}
