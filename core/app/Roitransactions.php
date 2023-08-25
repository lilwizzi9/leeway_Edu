<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roitransactions extends Model
{
    protected $table = 'roi_transactions';

    protected $fillable = [
        'user_id', 
        'trans_id',
        'time',
        'description',
        'amount',
        'new_balance',
        'type',
        'charge',
        'trading_cycle'
    ];

    public function memeber()
    {
        return $this->hasOne(User::class, 'id', 'user_id')->withDefault();
    }
}
