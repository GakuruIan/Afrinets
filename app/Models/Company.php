<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Company extends Authenticatable
{
    use HasFactory;
    protected $table='companies';
    protected $primaryKey = 'hotelID';
    protected $fillable =[
        'hotelEmail',
        'password'
    ];
    public $timestamps = false;
    
    public function hotel(){
        return $this->hasMany(Hotel::class,'hotelID');
    }

    public function customer(){
        return $this->hasMany(Customer::class,'hotelID');
    }

}
