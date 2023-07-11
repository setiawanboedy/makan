<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;
    protected $fillable = [
        'place_id',
        'name',
        'image',
        'price',
    ];

    protected $hidden = [];
    public function kuliner_place()
    {
        return $this->belongsTo(KulinerPlace::class,'place_id', 'id');
    }
}
