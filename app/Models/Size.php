<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
class Size extends Model
{
    use HasFactory;
    protected $table = 'size';
    protected $fillable = [
        'id',
        'size_name',
        'created_at'
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'size_ID', 'id');
    }
}