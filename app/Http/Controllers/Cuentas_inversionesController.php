<?php

namespace App\Http\Controllers;

use App\CuentasInversione;
use App\Cuentas_inversione;
use App\Http\Requests\Cuentas_inversionesStoreRequest;
use App\Http\Requests\Cuentas_inversionesUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class Cuentas_inversionesController extends Controller
{
    public function index(Request $request): Response
    {
        $cuentasInversiones = CuentasInversione::all();

        return view('cuentasInversione.index', compact('cuentasInversiones'));
    }

    public function create(Request $request): Response
    {
        return view('cuentasInversione.create');
    }

    public function store(Cuentas_inversionesStoreRequest $request): Response
    {
        $cuentasInversione = CuentasInversione::create($request->validated());

        $request->session()->flash('cuentasInversione.id', $cuentasInversione->id);

        return redirect()->route('cuentasInversiones.index');
    }

    public function show(Request $request, Cuentas_inversione $cuentasInversione): Response
    {
        return view('cuentasInversione.show', compact('cuentasInversione'));
    }

    public function edit(Request $request, Cuentas_inversione $cuentasInversione): Response
    {
        return view('cuentasInversione.edit', compact('cuentasInversione'));
    }

    public function update(Cuentas_inversionesUpdateRequest $request, Cuentas_inversione $cuentasInversione): Response
    {
        $cuentasInversione->update($request->validated());

        $request->session()->flash('cuentasInversione.id', $cuentasInversione->id);

        return redirect()->route('cuentasInversiones.index');
    }

    public function destroy(Request $request, Cuentas_inversione $cuentasInversione): Response
    {
        $cuentasInversione->delete();

        return redirect()->route('cuentasInversiones.index');
    }
}
