<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRekestRequest;
use App\Http\Requests\UpdateRekestRequest;
use App\Models\Client;
use App\Models\Product;
use App\Models\Rekest;

class RekestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rekests = Rekest::where('status', 'Pendiente')->get();
        return view('dashboard', compact('rekests'));
    }

    public function Historial()
    {
        $rekests = Rekest::where('status', 'Cancelado')->orWhere('status', 'Completado')->get();
        return view('rekests.historial', compact('rekests'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients= Client::all();
        return view('rekests.create', compact('clients'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRekestRequest $request)
    {
        $rekest = Rekest::create([
            'delivery_day' => $request->delivery_day,
            'client_id' => $request->client_id,
            'status' => 'Pendiente',

        ]);
        return redirect()->route('rekests.show', $rekest->id)
        ->with('success', 'Pedido creado exitosamente');

    }

    /**
     * Display the specified resource.
     */
    public function show($rekestId)
    {
        // Obtener el Rekest con sus productos asociados
        $rekest = Rekest::with('products.product')->findOrFail($rekestId);  // Cargamos los productos con la relación intermedia 'ProductInRequest'
        return view('rekests.show', compact('rekest'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rekest $rekest)
    {
        $clients= Client::all();
        return view('rekests.create', compact('clients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRekestRequest $request, Rekest $rekest)
    {
         // Verificar si el estado del pedido es "Pendiente"
    if ($rekest->status !== 'Pendiente') {
        // Si no es "Pendiente", redirigir con un mensaje de error
        return redirect()->route('dashboard')->with('error', 'No se puede actualizar un pedido que no está en estado Pendiente');
    }

    // Si el estado es "Pendiente", proceder con la actualización
    $rekest->update([
        'delivery_day' => $request->delivery_day,
        'client_id' => $request->client_id,
        'status' => $request->status,
    ]);

    // Redirigir con un mensaje de éxito
    return redirect()->route('dashboard')->with('success', 'Pedido actualizado exitosamente');
    }

    public function changeStatus(Rekest $rekest){
        $rekest->update([
            "status"=>"Completado"
        ]);
         // Redirige al dashboard
    return redirect()->route('dashboard')->with('success', 'Estado cambiado a Completo.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rekest $rekest)
    {
        $rekest->delete();
        return redirect()->route('dashboard')->with('success', 'Pedido eliminado exitosamente');
    }
}
