<?php

namespace App\Http\Controllers;

use App\Http\Requests\IngresofamiliarStoreRequest;
use App\Http\Requests\IngresofamiliarUpdateRequest;
use App\Models\Ingresofamiliar;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class IngresofamiliarController extends Controller
{
    public function index(Request $request): Response
    {
        $ingresofamiliars = Ingresofamiliar::all();

        return view('ingresofamiliar.index', compact('ingresofamiliars'));
    }

    public function create(Request $request): Response
    {
        return view('ingresofamiliar.create');
    }

    public function store(IngresofamiliarStoreRequest $request): Response
    {
        $ingresofamiliar = Ingresofamiliar::create($request->validated());

        $request->session()->flash('ingresofamiliar.id', $ingresofamiliar->id);

        return redirect()->route('ingresofamiliars.index');
    }

    public function show(Request $request, Ingresofamiliar $ingresofamiliar): Response
    {
        return view('ingresofamiliar.show', compact('ingresofamiliar'));
    }

    public function edit(Request $request, Ingresofamiliar $ingresofamiliar): Response
    {
        return view('ingresofamiliar.edit', compact('ingresofamiliar'));
    }

    public function update(IngresofamiliarUpdateRequest $request, Ingresofamiliar $ingresofamiliar): Response
    {
        $ingresofamiliar->update($request->validated());

        $request->session()->flash('ingresofamiliar.id', $ingresofamiliar->id);

        return redirect()->route('ingresofamiliars.index');
    }

    public function destroy(Request $request, Ingresofamiliar $ingresofamiliar): Response
    {
        $ingresofamiliar->delete();

        return redirect()->route('ingresofamiliars.index');
    }
}
