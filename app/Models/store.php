<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class store extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['id_pondok', 'name', 'owner', 'address', 'image', 'balance'];
}
