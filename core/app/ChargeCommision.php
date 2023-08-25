<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChargeCommision extends Model
{
    protected $table = 'charge_commisions';
    protected $fillable = [
        'transfer_charge',
        'withdraw_charge', 
        'admin_comm', 
        'sponsor_comm', 
        'matrix_comm', 
        'level_1',      
        'level_2',      
        'level_3',      
        'level_4',      
        'level_5',      
        'level_6',      
        'level_7',      
        'level_8',      
        'level_9',      
        'level_10',      
        'update_text',
        'lend_bonus',
    ];
}
