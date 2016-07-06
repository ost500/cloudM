<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Partners_job
 *
 * @property integer $id
 * @property integer $partner_id
 * @property string $job
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $area
 * @property string $number
 * @property string $experience
 * @property-read \App\Partners $partner
 * @method static \Illuminate\Database\Query\Builder|\App\Partners_job whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Partners_job wherePartnerId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Partners_job whereJob($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Partners_job whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Partners_job whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Partners_job whereArea($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Partners_job whereNumber($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Partners_job whereExperience($value)
 * @mixin \Eloquent
 */
class Partners_job extends Model
{
    protected $fillable = [
        'job',
    ];
    public function partner()
    {
        return $this->belongsTo('App\Partners', 'partner_id', 'id');
    }
}
