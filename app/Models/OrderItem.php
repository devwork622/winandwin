<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table = 'order_items';
    

    protected $fillable = [
        'id',
        'user_id',
        'order_id',
        'ticket_number',
        'ticket_amount',
        'draw_id',            
    ];



}
