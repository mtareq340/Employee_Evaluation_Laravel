<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Technical extends Model
{
    protected $table = 'technicals';

    protected $fillable = [
        'name' , 'address', 'phone', 'store_id', 'created_at' , 'updated_at'
    ];
}
