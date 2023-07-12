<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartHeader extends Model
{
    use HasFactory;
    protected $fillable = [
        'place_id',
        'user_id',
        'nomer_id',
        'nomer',
    ];

    protected $hidden = [];

    public function carts(){
        return $this->hasMany(Cart::class, 'header_id', 'id' );
    }

    public function place()
    {
        return $this->belongsTo(KulinerPlace::class,'place_id', 'id');
    }
}
