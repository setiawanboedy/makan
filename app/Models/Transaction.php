<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'date',
        'time',
        'prove',
        'transaction_total',
        'transaction_status'
       ];

    protected $hidden = [];

    public function user()
    {
        return $this->belongsTo(User::class,'users_id', 'id');
    }
    public function transDetails(){
        return $this->hasMany( TransactionDetail::class, 'transaction_id', 'id' );
    }

}
