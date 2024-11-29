<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekest extends Model
{
    /** @use HasFactory<\Database\Factories\RekestFactory> */
    use HasFactory;
    protected $fillable = [
        'delivery_day',
        'client_id',
        "status"
    ];
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
