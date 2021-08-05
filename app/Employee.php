<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';

    protected $fillable = [
        'name' , 'code', 'address', 'phone', 'store_id', 'title_id', 'created_at' , 'updated_at'
    ];

    public function title()
    {
        return $this->belongsTo(Title::class);

    }//end fo title

    public function store()
    {
        return $this->belongsTo(Store::class);

    }//end fo store
    public function visits()
    {
        return $this->belongsToMany(Visit::class, 'visit_employee')->withPivot('result');

    }//end of products
    public function proberties()
    {
        return $this->belongsToMany(Proberty::class, 'employee_proberty')->withPivot('mark');

    }//end of products

    public function hasVisit($visit_id)
    {
    return $this->visits()
        ->where('visit_id', $visit_id)
        ->exists();
    }
    public function visit()
    {
        return $this->belongsToMany(Visit::class, 'visit_employee')->withPivot('result');

    }//end of products
        

}
