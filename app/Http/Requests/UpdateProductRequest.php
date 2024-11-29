<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Puedes modificar la autorización según tus necesidades
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'size' => 'required|in:pequeño,mediano,grande',
            'category_id' => 'required|exists:categories,id', // Validar que la categoría existe
        ];
    }
}
