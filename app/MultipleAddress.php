<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MultipleAddress extends Model
{
    //
    protected $table = 'multipleaddress';
    public $timestamps = false;
    protected $fillable = ['customerNumber','addressLine1','addressLine2','city','state','postalCode','country'];
    protected $primaryKey = "addressNo";
    public $incrementing = false;
}
