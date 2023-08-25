<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
        'title',       
        'amount',       
        'percent',
        'action',
        'status',
        'lend_bonus',        
        'ref_level_1',
        'ref_level_2',
        'ref_level_3',
        'ref_level_4',
        'ref_level_5',
        'ref_level_6',
        'today_profit_per',
        'days'
    ];
}
