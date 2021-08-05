<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Technicalproberty extends Model
{
    protected $table = 'technicalproberties';

    protected $fillable = [
        'name' ,'created_at' , 'updated_at'
    ];
}
