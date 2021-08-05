<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Managerproberty extends Model
{
    protected $table = 'managerproberties';

    protected $fillable = [
        'name' ,'created_at' , 'updated_at'
    ];
}
