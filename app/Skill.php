<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Skill
 *
 * @property integer $id
 * @property integer $partner_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $title
 * @property integer $number
 * @property string $experience
 * @property-read \App\Partners $partner
 * @method static \Illuminate\Database\Query\Builder|\App\Skill whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Skill wherePartnerId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Skill whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Skill whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Skill whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Skill whereNumber($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Skill whereExperience($value)
 * @mixin \Eloquent
 */
class Skill extends Model
{
    protected $fillable = ['title','number','experience'];

    public function partner()
    {
        return $this->belongsTo('App\Partners', 'partner_id', 'id');
    }
}
