<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hotel extends Model
{
    protected $table='hotel';
    protected $primaryKey = 'hotelID';
    protected $fillable =[
       'companyID',
       'location',
       'rating',
       'amenities',
       'roomDetails',
       'pricing',
       'snap'
    ];
    public $timestamps = false;
    use HasFactory;
}
