<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todos los productos con la categoría relacionada (paginar 10 productos por página)
        $products = Product::with('category')->paginate(10);
        
        // Retorna la vista con los productos
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Obtener todas las categorías para el formulario de creación
        $categories = Category::all();
        
        // Retorna la vista de creación con las categorías
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        // Obtener los datos validados desde el StoreProductRequest
        $validated = $request->validated();
        
        // Crear el producto con los datos validados
        Product::create($validated);
        
        // Redirigir al listado de productos con mensaje de éxito
        return redirect()->route('products.index')->with('success', 'Producto creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        // Mostrar los detalles de un producto específico
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        // Obtener todas las categorías para el formulario de edición
        $categories = Category::all();
        
        // Retorna la vista de edición con el producto y las categorías
        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        // Obtener los datos validados desde el UpdateProductRequest
        $validated = $request->validated();
        
        // Actualizar el producto con los datos validados
        $product->update($validated);
        
        // Redirigir al listado de productos con mensaje de éxito
        return redirect()->route('products.index')->with('success', 'Producto actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // Eliminar el producto
        $product->delete();
        
        // Redirigir al listado de productos con mensaje de éxito
        return redirect()->route('products.index')->with('success', 'Producto eliminado exitosamente.');
    }
}

