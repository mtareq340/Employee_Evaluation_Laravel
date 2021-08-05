<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proberty extends Model
{
    protected $table = 'proberties';

    protected $fillable = [
        'name', 'title_id', 'created_at' , 'updated_at'
    ];
}
