<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class product_in extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillabe = ['products', 'product_new', 'from', 'total', 'date', 'price'];

    public function product() {
        return $this->belongsTo(product::class, 'products', 'id');
    }
}
