<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\FaqMaster
 *
 * @property integer $id
 * @property string $subject
 * @property integer $order_by
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Faq[] $faqs
 * @method static \Illuminate\Database\Query\Builder|\App\FaqMaster whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\FaqMaster whereSubject($value)
 * @method static \Illuminate\Database\Query\Builder|\App\FaqMaster whereOrderBy($value)
 * @method static \Illuminate\Database\Query\Builder|\App\FaqMaster whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\FaqMaster whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class FaqMaster extends Model
{
    public function faqs()
    {
        return $this->hasMany('App\Faq', 'f_id', 'id');
    }
}
