<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    protected $table = 'visits';

    protected $fillable = [
        'store_id', 'visit_date' , 'visitnumber_id', 'created_at' , 'updated_at'
    ];


    public function visitNumber()
    {
        return $this->belongsTo(Visitnumber::class, 'visitnumber_id');

    }//end fo category

    public function employees()
    {
        return $this->belongsToMany(Employee::class, 'visit_employee')->withPivot('result');


    }//end of products

}
