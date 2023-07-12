<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetailHeader extends Model
{
    use HasFactory;
    protected $fillable = [
        'transaction_id',
        'name_place',
        'booking_number'
    ];

    protected $hidden = [

    ];

    public function trans_details(){
        return $this->hasMany( TransactionDetail::class, 'transactionHeader_id', 'id' );
    }
}
