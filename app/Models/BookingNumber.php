<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingNumber extends Model
{
    protected $fillable = [
        'booking_numbers_id',
        'nomer',
        'paket',
    ];

    protected $hidden = [];

    public function kuliner_place()
    {
        return $this->belongsTo(KulinerPlace::class,'booking_numbers_id', 'id');
    }
}
