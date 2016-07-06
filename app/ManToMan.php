<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\ManToMan
 *
 * @property integer $id
 * @property integer $u_id
 * @property string $title
 * @property string $content
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\ManToMan whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ManToMan whereUId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ManToMan whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ManToMan whereContent($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ManToMan whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ManToMan whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ManToMan extends Model
{
    //
}
