<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['id_user', 'id_kasir', 'id_store', 'id_transaction', 'date', 'quantity', 'total'];

    public function kasir()
    {
        return $this->belongsTo(User::class, 'id_kasir', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function detail()
    {
        return $this->hasMany(Detail_transaction::class, 'id_transactions', 'id_transaction');
    }

    public function scopeWhereId(Builder $builder, $id)
    {
        return $builder->where('id_store', $id);
    }
}
