<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LendingLog extends Model
{
    protected $table = 'lending_logs';
    protected $fillable = [
        'lend_amount',
        'package_id',
        'back_amount',
        'next_time',
        'status',
        'user_id',
        'remain',
    ];

    public function package()
    {
        return $this->hasOne(Package::class, 'id', 'package_id')->withDefault();
    }

    public function member()
    {
        return $this->hasOne(User::class, 'id', 'user_id')->withDefault();
    }
}
