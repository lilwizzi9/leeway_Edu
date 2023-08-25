<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $fillable = [
        'user_id','direct_amount','cash_amount','trader_amount','custom_amount'
    ];

    /*public function member()
    {
        return $this->hasOne(User::class, 'id','user_id')->withDefault();
    }

    public function gateway()
    {
        return $this->belongsTo(Gateway::class);
    }

    public function method_name()
    {
        return $this->hasOne(Gateway::class, 'id', 'gateway_id')->withDefault();
    }*/
}
