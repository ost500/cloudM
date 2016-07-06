<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


/**
 * App\Project
 *
 * @property integer $id
 * @property string $area
 * @property string $category
 * @property string $title
 * @property string $charger_name
 * @property string $charger_phone
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $intro
 * @property integer $Client_id
 * @property integer $budget
 * @property string $managing_experience
 * @property string $expected_start_date
 * @property string $meeting_way
 * @property string $address_sido
 * @property string $detail_content
 * @property string $deadline
 * @property string $reason
 * @property string $purpose
 * @property string $estimated_duration
 * @property integer $applications_cnt
 * @property string $file_name
 * @property string $origin_name
 * @property string $step
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Application[] $application
 * @property-read \App\Contract $contract
 * @property-read \App\User $client
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\ProjectsArea[] $projects_area
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\ProjectsProposal[] $projects_proposal
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Interesting[] $interesting
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Comments[] $comment
 * @method static \Illuminate\Database\Query\Builder|\App\Project whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Project whereArea($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Project whereCategory($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Project whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Project whereChargerName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Project whereChargerPhone($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Project whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Project whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Project whereIntro($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Project whereClientId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Project whereBudget($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Project whereManagingExperience($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Project whereExpectedStartDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Project whereMeetingWay($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Project whereAddressSido($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Project whereDetailContent($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Project whereDeadline($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Project whereReason($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Project wherePurpose($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Project whereEstimatedDuration($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Project whereApplicationsCnt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Project whereFileName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Project whereOriginName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Project whereStep($value)
 * @mixin \Eloquent
 */
class Project extends Model
{
    //projects table의 모델이라고 명시해 준다.
    protected $table = 'projects';
    protected $fillable = ['step'];

    //
    public function application()
    {
        return $this->hasMany('App\Application', 'p_id', 'id');
    }

    public function contract()
    {
        return $this->hasOne('App\Contract', 'p_id', 'id');
    }

    public function client()
    {
        return $this->hasOne('App\User', 'id', 'Client_id');
    }

    public function projects_area()
    {
        return $this->hasMany('App\ProjectsArea', 'p_id', 'id');
    }

    public function projects_proposal()
    {
        return $this->hasMany('App\projectsProposal', 'p_id', 'id');
    }

    
    public function interesting()
    {
        return $this->hasMany('App\Interesting', 'p_id', 'id');
    }
    public function comment()
    {
        return $this->hasMany('App\Comments', 'project_id', 'id');
    }

}
