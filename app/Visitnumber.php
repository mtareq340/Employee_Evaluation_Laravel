<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitnumber extends Model
{
    protected $table = 'visitnumbers';

    protected $fillable = [
        'name', 'created_at' , 'updated_at'
    ];


}
