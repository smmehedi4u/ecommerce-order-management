<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'status',
        'total',
        'outlet_id',
    ];

    public function outlet() {
        return $this->belongsTo(Outlet::class);
    }

    public function items() {
        return $this->hasMany(OrderItem::class);
    }
}
