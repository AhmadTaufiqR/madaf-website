<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class detail_product_out extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['product_outs', 'products', 'quantity', 'subtotal'];
}
