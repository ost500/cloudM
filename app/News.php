<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\News
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\News whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\News whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\News whereContent($value)
 * @method static \Illuminate\Database\Query\Builder|\App\News whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\News whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class News extends Model
{
    protected $fillable = [
        'title','content'
    ];
}
