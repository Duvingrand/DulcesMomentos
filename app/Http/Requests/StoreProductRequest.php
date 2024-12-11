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
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'sizes' => 'required|array', // Lista de tamaños seleccionados
            'price_pequeño' => 'nullable|numeric|min:0',
            'price_mediano' => 'nullable|numeric|min:0',
            'price_grande' => 'nullable|numeric|min:0',
        ];
    }
}
