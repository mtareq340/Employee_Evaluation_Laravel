<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $table = 'stores';

    protected $fillable = [
        'name' , 'email'  , 'address', 'phone', 'created_at' , 'updated_at'
    ];

    public function technicals()
    {
        return $this->belongsToMany(Employee::class,'employee_id');

    }//end of products

}
