<?php

namespace App\Http\Controllers;

use App\EgresoFamiliare;
use App\Egreso_familiare;
use App\Http\Requests\Egreso_familiaresStoreRequest;
use App\Http\Requests\Egreso_familiaresUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class Egreso_familiaresController extends Controller
{
    public function index(Request $request): Response
    {
        $egresoFamiliares = EgresoFamiliare::all();

        return view('egresoFamiliare.index', compact('egresoFamiliares'));
    }

    public function create(Request $request): Response
    {
        return view('egresoFamiliare.create');
    }

    public function store(Egreso_familiaresStoreRequest $request): Response
    {
        $egresoFamiliare = EgresoFamiliare::create($request->validated());

        $request->session()->flash('egresoFamiliare.id', $egresoFamiliare->id);

        return redirect()->route('egresoFamiliares.index');
    }

    public function show(Request $request, Egreso_familiare $egresoFamiliare): Response
    {
        return view('egresoFamiliare.show', compact('egresoFamiliare'));
    }

    public function edit(Request $request, Egreso_familiare $egresoFamiliare): Response
    {
        return view('egresoFamiliare.edit', compact('egresoFamiliare'));
    }

    public function update(Egreso_familiaresUpdateRequest $request, Egreso_familiare $egresoFamiliare): Response
    {
        $egresoFamiliare->update($request->validated());

        $request->session()->flash('egresoFamiliare.id', $egresoFamiliare->id);

        return redirect()->route('egresoFamiliares.index');
    }

    public function destroy(Request $request, Egreso_familiare $egresoFamiliare): Response
    {
        $egresoFamiliare->delete();

        return redirect()->route('egresoFamiliares.index');
    }
}
