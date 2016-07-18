<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Portfolio
 *
 * @property integer $id
 * @property integer $partner_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $title
 * @property string $area
 * @property string $category
 * @property string $description
 * @property string $from_date
 * @property string $to_date
 * @property integer $participation_rate
 * @property string $image1
 * @property string $image2
 * @property string $image3
 * @property string $caption1
 * @property string $caption2
 * @property string $caption3
 * @property boolean $iscloudm
 * @property-read \App\Partners $partner
 * @method static \Illuminate\Database\Query\Builder|\App\Portfolio whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Portfolio wherePartnerId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Portfolio whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Portfolio whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Portfolio whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Portfolio whereArea($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Portfolio whereCategory($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Portfolio whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Portfolio whereFromDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Portfolio whereToDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Portfolio whereParticipationRate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Portfolio whereImage1($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Portfolio whereImage2($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Portfolio whereImage3($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Portfolio whereCaption1($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Portfolio whereCaption2($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Portfolio whereCaption3($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Portfolio whereIscloudm($value)
 * @mixin \Eloquent
 * @property boolean $top
 * @method static \Illuminate\Database\Query\Builder|\App\Portfolio whereTop($value)
 */
class Portfolio extends Model
{
    public function partner()
    {
        return $this->belongsTo('App\Partners', 'partner_id', 'id');
    }
}
