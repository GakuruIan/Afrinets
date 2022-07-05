<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table='customers';
    protected $fillable=[
      'hotelID',
       'name',
       'email',
       'nationalID',
        'checkout',
       'checkin'
    ];
    public $timestamps = false;
    use HasFactory;
}
