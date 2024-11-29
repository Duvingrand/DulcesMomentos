<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    /** @use HasFactory<\Database\Factories\ClientFactory> */
    use HasFactory;

    // Add your model code here

    protected $fillable = [
        'name',
        'phone_number',
        'address'];

        public function rekests()
        {
            return $this->hasMany(Rekest::class);
        }
}
