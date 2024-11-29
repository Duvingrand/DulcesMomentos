<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRekestRequest;
use App\Http\Requests\UpdateRekestRequest;
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRekestRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Rekest $rekest)
    {
        return view('rekests.show', compact('rekest'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rekest $rekest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRekestRequest $request, Rekest $rekest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rekest $rekest)
    {
        //
    }
}
