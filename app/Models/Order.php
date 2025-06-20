<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['outlet_id', 'status', 'total_price'];

    public function outlet() {
        return $this->belongsTo(Outlet::class);
    }

    public function items() {
        return $this->hasMany(OrderItem::class);
    }
}
