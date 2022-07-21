<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTransactions extends Model
{
    protected $table = 'user_transactions';
    

    protected $fillable = [
        'id',
        'user_id',
        'amount',
        'transaction_type',
        'transaction_id',
        'transaction_data'
    ];



}
