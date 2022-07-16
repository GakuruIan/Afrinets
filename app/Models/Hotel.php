<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hotel extends Model
{
    protected $table='hotel';
    protected $primaryKey = 'ID';
    protected $fillable =[
       'hotelID',
       'name',
       'location',
       'rating',
       'amenities',
       'pricing',
       'snap'
    ];
    public $timestamps = false;
    use HasFactory;

    //relationship to company
    public function company(){
        return $this->belongsTo(Company::class,'hotelID');
    }
}
