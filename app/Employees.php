<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    //
    protected $table = 'employees';
    protected $filable = ['employeeNumber','reportsTo'];
    public $timestamps = false;
    protected $guarded = [];
    protected $primaryKey = 'employeeNumber';
    protected $foreignKey = ['reportsTo','officeCode'];
 
    public function reportsTo()
    {
        return $this->belongsTo('App\Employees' , 'employeeNumber');
    }
    public function employeeNumber()
    {
        return $this->hasMany('App\Employees','reportsTo');
    }
}
