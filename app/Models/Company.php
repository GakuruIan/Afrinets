<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Company extends Authenticatable
{
    protected $table='companies';
    protected $primaryKey = 'companyID';
    protected $fillable =[
        'company_name',
        'companyEmail',
        'location',
        'password'
    ];
    public $timestamps = false;
    use HasFactory;
}
