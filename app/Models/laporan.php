<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class laporan extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['date', 'total_product', 'populer_product', 'amount'];
}
