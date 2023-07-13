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
        'avgprice',
        'address',
        'latlng',
        'table',
        'room',
    ];

    protected $hidden = [];

    public function booking_numbers(){
        return $this->hasMany(BookingNumber::class, 'booking_numbers_id', 'id');
    }

    public function food(){
        return $this->hasMany(Food::class, 'place_id', 'id');
    }
}
