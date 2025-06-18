<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'outlet_id', 'status', 'total_price'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function outlet() {
        return $this->belongsTo(Outlet::class);
    }

    public function items() {
        return $this->hasMany(OrderItem::class);
    }
}
