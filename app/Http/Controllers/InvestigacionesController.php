<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvestigacionesStoreRequest;
use App\Http\Requests\InvestigacionesUpdateRequest;
use App\Models\Investigaciones;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class InvestigacionesController extends Controller
{
    public function index(Request $request): Response
    {
        $investigaciones = Investigacione::all();

        return view('investigacione.index', compact('investigaciones'));
    }

    public function create(Request $request): Response
    {
        return view('investigacione.create');
    }

    public function store(InvestigacionesStoreRequest $request): Response
    {
        $investigacione = Investigacione::create($request->validated());

        $request->session()->flash('investigacione.id', $investigacione->id);

        return redirect()->route('investigaciones.index');
    }

    public function show(Request $request, Investigacione $investigacione): Response
    {
        return view('investigacione.show', compact('investigacione'));
    }

    public function edit(Request $request, Investigacione $investigacione): Response
    {
        return view('investigacione.edit', compact('investigacione'));
    }

    public function update(InvestigacionesUpdateRequest $request, Investigacione $investigacione): Response
    {
        $investigacione->update($request->validated());

        $request->session()->flash('investigacione.id', $investigacione->id);

        return redirect()->route('investigaciones.index');
    }

    public function destroy(Request $request, Investigacione $investigacione): Response
    {
        $investigacione->delete();

        return redirect()->route('investigaciones.index');
    }
}
