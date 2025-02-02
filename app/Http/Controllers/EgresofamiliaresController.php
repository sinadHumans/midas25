<?php

namespace App\Http\Controllers;

use App\Http\Requests\EgresofamiliaresStoreRequest;
use App\Http\Requests\EgresofamiliaresUpdateRequest;
use App\Models\Egresofamiliares;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EgresofamiliaresController extends Controller
{
    public function index(Request $request): Response
    {
        $egresofamiliares = Egresofamiliare::all();

        return view('egresofamiliare.index', compact('egresofamiliares'));
    }

    public function create(Request $request): Response
    {
        return view('egresofamiliare.create');
    }

    public function store(EgresofamiliaresStoreRequest $request): Response
    {
        $egresofamiliare = Egresofamiliare::create($request->validated());

        $request->session()->flash('egresofamiliare.id', $egresofamiliare->id);

        return redirect()->route('egresofamiliares.index');
    }

    public function show(Request $request, Egresofamiliare $egresofamiliare): Response
    {
        return view('egresofamiliare.show', compact('egresofamiliare'));
    }

    public function edit(Request $request, Egresofamiliare $egresofamiliare): Response
    {
        return view('egresofamiliare.edit', compact('egresofamiliare'));
    }

    public function update(EgresofamiliaresUpdateRequest $request, Egresofamiliare $egresofamiliare): Response
    {
        $egresofamiliare->update($request->validated());

        $request->session()->flash('egresofamiliare.id', $egresofamiliare->id);

        return redirect()->route('egresofamiliares.index');
    }

    public function destroy(Request $request, Egresofamiliare $egresofamiliare): Response
    {
        $egresofamiliare->delete();

        return redirect()->route('egresofamiliares.index');
    }
}
