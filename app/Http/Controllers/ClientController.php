<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Client;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::all();
        return view("clients.index", compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("clients.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClientRequest $request)
    {
        // Validar los datos mediante el request personalizado
        $validated = $request->validated();

        // Crear el nuevo cliente en la base de datos
        Client::create($validated);

        // Redirigir con un mensaje de éxito
        return redirect()->route("rekests.create")->with('success', 'Cliente creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        return view("clients.show", compact("client"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        return view("clients.edit", compact("client"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClientRequest $request, Client $client)
    {
        // Validar los datos mediante el request personalizado
        $validated = $request->validated();

        // Actualizar los datos del cliente
        $client->update($validated);

        // Redirigir con un mensaje de éxito
        return redirect()->route('clients.index')->with('success', 'Cliente actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        // Eliminar el cliente
        $client->delete();

        // Redirigir con un mensaje de éxito
        return redirect()->route('clients.index')->with('success', 'Cliente eliminado exitosamente.');
    }
}
