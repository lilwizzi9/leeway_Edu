<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Directjoiningcom extends Model
{
    protected $table = 'direct_joining_comm';
    protected $fillable = [
        'total_user',        
        'commision_per_user',        
    ];
}
