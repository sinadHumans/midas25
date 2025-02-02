<?php

namespace App\Http\Controllers;

use App\Http\Requests\Ingreso_familiarStoreRequest;
use App\Http\Requests\Ingreso_familiarUpdateRequest;
use App\IngresoFamiliar;
use App\Ingreso_familiar;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class Ingreso_familiarController extends Controller
{
    public function index(Request $request): Response
    {
        $ingresoFamiliars = IngresoFamiliar::all();

        return view('ingresoFamiliar.index', compact('ingresoFamiliars'));
    }

    public function create(Request $request): Response
    {
        return view('ingresoFamiliar.create');
    }

    public function store(Ingreso_familiarStoreRequest $request): Response
    {
        $ingresoFamiliar = IngresoFamiliar::create($request->validated());

        $request->session()->flash('ingresoFamiliar.id', $ingresoFamiliar->id);

        return redirect()->route('ingresoFamiliars.index');
    }

    public function show(Request $request, Ingreso_familiar $ingresoFamiliar): Response
    {
        return view('ingresoFamiliar.show', compact('ingresoFamiliar'));
    }

    public function edit(Request $request, Ingreso_familiar $ingresoFamiliar): Response
    {
        return view('ingresoFamiliar.edit', compact('ingresoFamiliar'));
    }

    public function update(Ingreso_familiarUpdateRequest $request, Ingreso_familiar $ingresoFamiliar): Response
    {
        $ingresoFamiliar->update($request->validated());

        $request->session()->flash('ingresoFamiliar.id', $ingresoFamiliar->id);

        return redirect()->route('ingresoFamiliars.index');
    }

    public function destroy(Request $request, Ingreso_familiar $ingresoFamiliar): Response
    {
        $ingresoFamiliar->delete();

        return redirect()->route('ingresoFamiliars.index');
    }
}
