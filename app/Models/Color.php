<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
class Color extends Model
{
    use HasFactory;
    protected $table = 'color';
    protected $fillable = [
        'id',
        'color_name',
        'created_at'
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'color_ID', 'id');
    }
}