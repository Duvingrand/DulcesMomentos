<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductInRequest extends Model
{
    /** @use HasFactory<\Database\Factories\ProductInRequestFactory> */
    use HasFactory;
    protected $fillable = [
        'product_id',
        'rekest_id',
        "personalization"
    ];
}
