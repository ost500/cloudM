<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
