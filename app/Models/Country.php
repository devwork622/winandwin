<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'country';
    public $timestamps = false;

    protected $fillable = [
        'iCountryId','vCountry','vCountryCode','eStatus','vCountryImage','vCurrency','vCountryPhoneCode'
    ];



}
