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

    //relationship to company
    public function company(){
      return $this->belongsTo(Company::class,'hotelID');
  }
}
