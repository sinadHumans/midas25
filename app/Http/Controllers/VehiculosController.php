<?php

namespace App\Http\Controllers;

use App\Http\Requests\VehiculosStoreRequest;
use App\Http\Requests\VehiculosUpdateRequest;
use App\Models\Vehiculos;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class VehiculosController extends Controller
{
    public function index(Request $request): Response
    {
        $vehiculos = Vehiculo::all();

        return view('vehiculo.index', compact('vehiculos'));
    }

    public function create(Request $request): Response
    {
        return view('vehiculo.create');
    }

    public function store(VehiculosStoreRequest $request): Response
    {
        $vehiculo = Vehiculo::create($request->validated());

        $request->session()->flash('vehiculo.id', $vehiculo->id);

        return redirect()->route('vehiculos.index');
    }

    public function show(Request $request, Vehiculo $vehiculo): Response
    {
        return view('vehiculo.show', compact('vehiculo'));
    }

    public function edit(Request $request, Vehiculo $vehiculo): Response
    {
        return view('vehiculo.edit', compact('vehiculo'));
    }

    public function update(VehiculosUpdateRequest $request, Vehiculo $vehiculo): Response
    {
        $vehiculo->update($request->validated());

        $request->session()->flash('vehiculo.id', $vehiculo->id);

        return redirect()->route('vehiculos.index');
    }

    public function destroy(Request $request, Vehiculo $vehiculo): Response
    {
        $vehiculo->delete();

        return redirect()->route('vehiculos.index');
    }
}
