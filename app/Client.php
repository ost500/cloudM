<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Client
 *
 * @property integer $id
 * @property integer $user_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $intro
 * @property string $company_type
 * @method static \Illuminate\Database\Query\Builder|\App\Client whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Client whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Client whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Client whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Client whereIntro($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Client whereCompanyType($value)
 * @mixin \Eloquent
 */
class Client extends Model
{
    protected $fillable = [
        'user_id', 'intro', 'company_type'
    ];
}
