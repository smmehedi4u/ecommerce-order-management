<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderTransfer extends Model
{
    protected $fillable = ['order_id', 'from_outlet_id', 'to_outlet_id', 'transferred_by_user_id', 'transfer_reason'];

    public function order() {
        return $this->belongsTo(Order::class);
    }

    public function fromOutlet() {
        return $this->belongsTo(Outlet::class, 'from_outlet_id');
    }

    public function toOutlet() {
        return $this->belongsTo(Outlet::class, 'to_outlet_id');
    }

    public function transferredBy() {
        return $this->belongsTo(User::class, 'transferred_by_user_id');
    }
}
