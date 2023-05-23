<?php

namespace App\Models;
use App\Models\OrderDetail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'order';
    protected $fillable = [
        'id',
        'created_at',
        'user_ID',
        'amount',
        'total',
        'payment_method',
        'ship_status',
        'payment_status',
        'accept_status',
    ];

    public function orderDetails() {
        return $this->hasMany(OrderDetail::class);
    }
    public function user() {
        return $this->belongsTo(User::class, 'user_ID', 'id');
    }

}
