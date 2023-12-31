<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_place',
        'users_id',
        'booking_number',
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

}
