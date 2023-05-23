<?php

namespace App\Models;
use App\Models\ImageProduct;
use App\Models\Catalog;
use App\Models\Rate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'id',
        'name',
        'price',
        'description',
        'amount',
        'size_ID',
        'color_ID',
        'catalog_ID',
    ];

    public function productImages() {
        return $this->hasMany(ImageProduct::class, 'product_ID', 'id');
    }

    public function catalog() {
        return $this->belongsTo(Catalog::class, 'catalog_ID', 'id');
    }
    public function rating() {
        return $this->hasMany(Rate::class, 'product_ID', 'id');
    }

    
    public function size() {
        return $this->belongsTo(Size::class, 'size_ID', 'id');
    }

    public function color() {
        return $this->belongsTo(Color::class, 'color_ID', 'id');
    }

}
