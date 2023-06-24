<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KulinerPlace extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'status',
        'image',
        'address',
        'table',
        'room',
    ];

    protected $hidden = [];

    public function booking_numbers(){
        return $this->hasMany(BookingNumber::class, 'booking_numbers_id', 'id');
    }
}
