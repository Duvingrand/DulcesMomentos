<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductInRequestRequest;
use App\Http\Requests\UpdateProductInRequestRequest;
use App\Models\Product;
use App\Models\ProductInRequest;
use App\Models\Rekest;

class ProductInRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productInRequests = ProductInRequest::all();
        return view('dashboard', compact('productInRequests'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($rekestId)
    {
        // Obtener el rekest por ID
        $rekest = Rekest::findOrFail($rekestId);

        // Obtener los productos disponibles para agregar (esto depende de tu lógica)
        $products = Product::all();

        return view('productsinrequests.create', compact('rekest', 'products'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductInRequestRequest $request, $rekestId)
    {
        $rekest = Rekest::findOrFail($rekestId);
        $product = Product::findOrFail($request->product_id);

        // Verificar si el producto ya está en la solicitud
        if ($rekest->products->contains($product)) {
            return back()->with('error', 'Este producto ya está agregado a la solicitud.');
        }


        // Crear un nuevo ProductInRequest con los datos del request
        ProductInRequest::create([
            'rekest_id' => $rekestId,
            'product_id' => $request->product_id,
            "personalization" => $request->personalization,
            "quantity"=>$request->quantity
        ]);

        // Redireccionar al dashboard
        return redirect()->route('rekests.show', $rekestId)->with('success', 'Producto agregado al pedido');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductInRequest $productInRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductInRequest $productInRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductInRequestRequest $request, ProductInRequest $productInRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductInRequest $productInRequest)
    {

        $productInRequest->delete(); // Elimina el producto del pedido

        return redirect()->route('rekests.show', ['rekest' => $productInRequest->rekest_id])
            ->with('success', 'Producto eliminado del pedido.');
    }
}
