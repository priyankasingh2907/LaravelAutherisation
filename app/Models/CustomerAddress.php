<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerAddress extends Model
{
    use HasFactory;
    protected $table='customer_address';
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
         'address',
        'country',
        'appartment',
        'city',
        'state',
        'zip',
        'mobile',
    ];
}
