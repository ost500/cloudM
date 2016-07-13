<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Comments
 *
 * @property integer $id
 * @property integer $project_id
 * @property string $comment
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property integer $u_id
 * @property boolean $secret
 * @property-read \App\User $user
 * @property-read \App\Project $project
 * @method static \Illuminate\Database\Query\Builder|\App\Comments whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Comments whereProjectId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Comments whereComment($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Comments whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Comments whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Comments whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Comments whereUId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Comments whereSecret($value)
 * @mixin \Eloquent
 * @property integer $parent_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Comments[] $children
 * @method static \Illuminate\Database\Query\Builder|\App\Comments whereParentId($value)
 */
class Comments extends Model
{
    protected $table = 'comments';

    public function user()
    {
        return $this->belongsTo('App\User', 'u_id', 'id');
    }
    public function project()
    {
        return $this->belongsTo('App\Project', 'project_id', 'id');
    }

    public function children()
    {
        return $this->hasMany('App\Comments', 'parent_id');
    }

}
