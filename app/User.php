<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * App\User
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $profileImage
 * @property string $PorC
 * @property string $phone_num
 * @property string $company_type
 * @property string $BOD
 * @property string $fax_num
 * @property string $sex
 * @property string $address
 * @property integer $level
 * @property string $auth_check
 * @property string $auth_image
 * @property string $bank
 * @property string $account_holder
 * @property string $account_number
 * @property string $project_email
 * @property string $contract_email
 * @property boolean $fastm_email
 * @property boolean $marketing_email
 * @property boolean $news_email
 * @property string $project_sms
 * @property string $contract_sms
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Contract[] $contract
 * @property-read \App\Partners $partners
 * @property-read \App\Client $clients
 * @method static \Illuminate\Database\Query\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereProfileImage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User wherePorC($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User wherePhoneNum($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereCompanyType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereBOD($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereFaxNum($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereSex($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereAddress($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereLevel($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereAuthCheck($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereAuthImage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereBank($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereAccountHolder($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereAccountNumber($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereProjectEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereContractEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereFastmEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereMarketingEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereNewsEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereProjectSms($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereContractSms($value)
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'nick', 'email', 'password', 'profileImage', 'PorC'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function contract()
    {
        return $this->hasMany('App\Contract', 'u_id', 'id');
    }

    public function partners()
    {
        return $this->hasOne('App\Partners','user_id','id');
    }
    public function clients()
    {
        return $this->hasOne('App\Client','user_id','id');
    }
}
