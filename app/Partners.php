<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Partners
 *
 * @property integer $id
 * @property integer $user_id
 * @property \Illuminate\Database\Eloquent\Collection|\App\Partners_job[] $job
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $intro
 * @property string $proposal_file_name
 * @property string $proposal_origin_name
 * @property string $company_file_name
 * @property string $company_origin_name
 * @property-read \App\User $user
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Skill[] $skill
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Portfolio[] $portfolio
 * @method static \Illuminate\Database\Query\Builder|\App\Partners whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Partners whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Partners whereJob($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Partners whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Partners whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Partners whereIntro($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Partners whereProposalFileName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Partners whereProposalOriginName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Partners whereCompanyFileName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Partners whereCompanyOriginName($value)
 * @mixin \Eloquent
 * @property boolean $proposal_check
 * @property boolean $company_check
 * @property boolean $authenticated
 * @method static \Illuminate\Database\Query\Builder|\App\Partners whereProposalCheck($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Partners whereCompanyCheck($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Partners whereAuthenticated($value)
 * @property integer $rank
 * @method static \Illuminate\Database\Query\Builder|\App\Partners whereRank($value)
 */
class Partners extends Model
{
    //
    protected $fillable = [
        'user_id', 'job',
    ];
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
    public function job()
    {
        return $this->hasMany('App\Partners_job', 'partner_id', 'id');
    }
    public function skill()
    {
        return $this->hasMany('App\Skill', 'partner_id', 'id');
    }
    public function portfolio()
    {
        return $this->hasMany('App\Portfolio', 'partner_id', 'id');
    }
    public function evaluation()
    {
        return $this->hasMany('App\Evaluation', 'partner_id', 'id');
    }
    

}
