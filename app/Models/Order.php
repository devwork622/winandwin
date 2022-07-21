<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    

    protected $fillable = [
        'id',
        'user_id',
        'user_name',
        'email',
        'mobile',
        'total_amount',
        'wallet_amount',
        'paypal_amount',
        'draw_id',        
        'transaction_id',
        'transaction_data',    
    ];



}
