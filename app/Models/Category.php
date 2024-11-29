<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;

    // Add your model code here
    protected $fillable = [
        'name',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);  // Relación uno a muchos
    }
}
