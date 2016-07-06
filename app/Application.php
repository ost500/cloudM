<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Application
 *
 * @property integer $id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property integer $u_id
 * @property integer $p_id
 * @property integer $money
 * @property string $duration
 * @property string $content
 * @property boolean $has_portfolio
 * @property string $file_name
 * @property string $origin_name
 * @property string $choice
 * @property-read \App\Project $project
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Query\Builder|\App\Application whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Application whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Application whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Application whereUId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Application wherePId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Application whereMoney($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Application whereDuration($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Application whereContent($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Application whereHasPortfolio($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Application whereFileName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Application whereOriginName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Application whereChoice($value)
 * @mixin \Eloquent
 */
class Application extends Model
{
    protected $fillable = [
        'p_id', 'u_id'
    ];

    public function project()
    {
        return $this->belongsTo('App\Project', 'p_id', 'id');
    }
    public function projectStep($step)
    {
        return $this->hasOne('App\Project', 'id', 'p_id')->where('step','=',$step);
    }
    public function projectArray($step)
    {
        $return = "";
            foreach($step as $eachStep){
            $return = $this->hasOne('App\Project', 'id', 'p_id')->orwhere('step','=',$eachStep);
        }
        return $return;
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'u_id', 'id');
    }
}
