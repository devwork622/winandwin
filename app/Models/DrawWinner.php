<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DrawWinner extends Model
{
    protected $table = 'draw_winners';
    

    protected $fillable = [
        'id',
        'draw_id',
        'user_id',
        'ticket_number',
        'draw_date',
                
    ];



}
