<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Puedes modificar la autorización según tus necesidades
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'description' => '',
            'price' => 'required|numeric|min:0',
            'size' => 'required|in:pequeño,mediano,grande',  // Asegúrate de validar que solo se acepte uno de estos tres valores
            'category_id' => 'required|exists:categories,id',
        ];
    }
}
