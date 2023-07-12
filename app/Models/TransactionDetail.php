<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'transactionHeader_id',
        'food_id',
        'image',
        'name',
        'price',
        'quantity',
        'total'
    ];

    protected $hidden = [

    ];
}
