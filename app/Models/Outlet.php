<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Outlet extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'location'];

    public function inCharge() {
        return $this->hasOne(User::class);
    }

    public function orders() {
        return $this->hasMany(Order::class);
    }
}
