<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Communication
 *
 * @property integer $id
 * @property integer $project_id
 * @property integer $writer_id
 * @property string $title
 * @property string $content
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\User $writer
 * @method static \Illuminate\Database\Query\Builder|\App\Communication whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Communication whereProjectId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Communication whereWriterId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Communication whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Communication whereContent($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Communication whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Communication whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $deleted_at
 * @method static \Illuminate\Database\Query\Builder|\App\Communication whereDeletedAt($value)
 */
class Communication extends Model
{
    use SoftDeletes;

    public function writer()
    {
        return $this->belongsTo('App\User', 'writer_id', 'id');
    }
}
