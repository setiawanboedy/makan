<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'transaction_id',
        'resto_id',
        'food_id',
        'image',
        'name',
        'nomer',
        'price',
        'quantity',
        'total',
        'transaction_status'
    ];

    protected $hidden = [

    ];
    public function transaction()
    {
        return $this->belongsTo(Transaction::class,'transaction_id', 'id');
    }
}
