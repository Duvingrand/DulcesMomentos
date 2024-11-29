<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'price',
        'size',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);  // Relación inversa (pertenece a Category)
    }
    public function requests()
    {
        return $this->hasMany(ProductInRequest::class);  // Relación con ProductInRequest (pertenece a ProductInRequest)
    }
}
