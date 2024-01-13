<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class product_out extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillabe = [
        'products',
        'stores',
        'price', 
        'method', 
        'amount',
        'date', 
        'date_tempo',
        'status'
    ];
}
