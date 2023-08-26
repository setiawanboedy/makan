<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'resto_id',
        'food_id',
        'user_id',
        'name',
        'price',
        'quantity',
        'image',
        'table',
        'nomer',
        'total'
       ];

    protected $hidden = [];

    // public function cart_header()
    // {
    //     return $this->belongsTo(CartHeader::class,'header_id', 'id');
    // }
}
