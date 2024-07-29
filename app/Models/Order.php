<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'order_id', 'id');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function address()
    {
        return $this->hasOne(Address::class, 'order_id', 'id');
    }
}