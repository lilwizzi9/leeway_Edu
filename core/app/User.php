<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'referrer_id','pack_id','username', 'password',
        'position', 'first_name', 'last_name',
        'balance', 'join_date', 'status',
        'paid_status','ver_status',
        'ver_code', 'forget_code', 'birth_day',
        'email', 'mobile', 'street_address',
        'city', 'country', 'post_code','posid','secretcode',
        'tauth', 'tfver', 'emailv','smsv','vsent','change_pass_otp','vercode','image','password_without_encrypt','coin_balance','kyc','kyc1','kyc2','kyc1_back','btc_detail','perfect_detail','roi_balance','salary_balance','monthly_profit_balance','custom_date','direct_joining_commision','profile_not_updated','redeem_joining_coins','upgrade_datetime','trans_hash','all_levels','privateKey','address','lewt_balance'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function withdraw()
    {
        return $this->belongsTo(WithdrawTrasection::class)->withDefault();
    }

    public function deposit()
    {
        return $this->belongsTo(Deposit::class)->withDefault();
    }

    public function trans()
    {
        return $this->belongsTo(Transaction::class)->withDefault();
    }
}
