<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Contract
 *
 * @property integer $id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property integer $u_id
 * @property integer $p_id
 * @property string $step
 * @property boolean $charge_check
 * @property string $charge_date
 * @property string $charge_type
 * @property string $contract_date
 * @property string $start_work_date
 * @property string $finish_work_date
 * @property string $type_pay
 * @property-read \App\Project $project
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Query\Builder|\App\Contract whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contract whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contract whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contract whereUId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contract wherePId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contract whereStep($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contract whereChargeCheck($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contract whereChargeDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contract whereChargeType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contract whereContractDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contract whereStartWorkDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contract whereFinishWorkDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contract whereTypePay($value)
 * @mixin \Eloquent
 */
class Contract extends Model
{
    public function project()
    {
        return $this->hasOne('App\Project', 'id', 'p_id');
    }
    public function user()
    {
        return $this->belongsTo('App\User', 'u_id', 'id');
    }
}
