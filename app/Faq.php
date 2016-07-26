<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Faq
 *
 * @property integer $id
 * @property integer $f_id
 * @property string $subject
 * @property string $content
 * @property integer $order_by
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\FaqMaster $master
 * @method static \Illuminate\Database\Query\Builder|\App\Faq whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Faq whereFId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Faq whereSubject($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Faq whereContent($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Faq whereOrderBy($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Faq whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Faq whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Faq extends Model
{
    public function master()
    {
        return $this->belongsTo('App\FaqMaster', 'f_id', 'id');
    }
}
