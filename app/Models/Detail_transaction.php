<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Detail_transaction extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['id_product', 'quantity', 'unit_price', 'subtotal'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product', 'id');
    }
}
