<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogActivity extends Model
{
    protected $table = 'log_activities';
    protected $fillable = [
        'subject',
        'url',
        'method',
        'ip',
        'agent',
        'chargepc',
        'track_location',
    ];
}
