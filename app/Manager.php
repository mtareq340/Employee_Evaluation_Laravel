<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    protected $table = 'managers';

    protected $fillable = [
        'name' , 'address', 'phone', 'store_id', 'created_at' , 'updated_at'
    ];

    public function store()
    {
        return $this->belongsTo(Store::class);

    }//end fo category
}
