<?php

namespace App\Http\Controllers;

use App\Http\Requests\CuentasinversionesStoreRequest;
use App\Http\Requests\CuentasinversionesUpdateRequest;
use App\Models\Cuentasinversiones;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CuentasinversionesController extends Controller
{
    public function index(Request $request): Response
    {
        $cuentasinversiones = Cuentasinversione::all();

        return view('cuentasinversione.index', compact('cuentasinversiones'));
    }

    public function create(Request $request): Response
    {
        return view('cuentasinversione.create');
    }

    public function store(CuentasinversionesStoreRequest $request): Response
    {
        $cuentasinversione = Cuentasinversione::create($request->validated());

        $request->session()->flash('cuentasinversione.id', $cuentasinversione->id);

        return redirect()->route('cuentasinversiones.index');
    }

    public function show(Request $request, Cuentasinversione $cuentasinversione): Response
    {
        return view('cuentasinversione.show', compact('cuentasinversione'));
    }

    public function edit(Request $request, Cuentasinversione $cuentasinversione): Response
    {
        return view('cuentasinversione.edit', compact('cuentasinversione'));
    }

    public function update(CuentasinversionesUpdateRequest $request, Cuentasinversione $cuentasinversione): Response
    {
        $cuentasinversione->update($request->validated());

        $request->session()->flash('cuentasinversione.id', $cuentasinversione->id);

        return redirect()->route('cuentasinversiones.index');
    }

    public function destroy(Request $request, Cuentasinversione $cuentasinversione): Response
    {
        $cuentasinversione->delete();

        return redirect()->route('cuentasinversiones.index');
    }
}
