<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Draw extends Model
{
    protected $table = 'draws';
    

    protected $fillable = [
        'id',
        'draw_date',
        'is_current',        
    ];



}
