<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_numbers_id',
        'users_id',
        'kuliner_places_id',
        'date',
        'time',
        'transaction_total',
        'transaction_status'
       ];

    protected $hidden = [];

    public function user()
    {
        return $this->belongsTo(User::class,'users_id', 'id');
    }

    public function booking_number()
    {
        return $this->belongsTo(BookingNumber::class,'booking_numbers_id', 'id');
    }

    public function kuliner_place()
    {
        return $this->belongsTo(KulinerPlace::class,'kuliner_places_id', 'id');
    }

}
