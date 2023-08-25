<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coins extends Model
{
    protected $fillable = [
        'name',
        'image',
        'description',
        'coin_amount',
        'sell_amount',
        'referal_comission'        

    ];
}
