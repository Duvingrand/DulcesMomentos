<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductInRequestRequest;
use App\Http\Requests\UpdateProductInRequestRequest;
use App\Models\ProductInRequest;

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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductInRequestRequest $request)
    {
        //
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
        //
    }
}
