<?php

namespace App\Http\Controllers;

use App\BienesInmueble;
use App\Bienes_inmueble;
use App\Http\Requests\Bienes_inmueblesStoreRequest;
use App\Http\Requests\Bienes_inmueblesUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class Bienes_inmueblesController extends Controller
{
    public function index(Request $request): Response
    {
        $bienesInmuebles = BienesInmueble::all();

        return view('bienesInmueble.index', compact('bienesInmuebles'));
    }

    public function create(Request $request): Response
    {
        return view('bienesInmueble.create');
    }

    public function store(Bienes_inmueblesStoreRequest $request): Response
    {
        $bienesInmueble = BienesInmueble::create($request->validated());

        $request->session()->flash('bienesInmueble.id', $bienesInmueble->id);

        return redirect()->route('bienesInmuebles.index');
    }

    public function show(Request $request, Bienes_inmueble $bienesInmueble): Response
    {
        return view('bienesInmueble.show', compact('bienesInmueble'));
    }

    public function edit(Request $request, Bienes_inmueble $bienesInmueble): Response
    {
        return view('bienesInmueble.edit', compact('bienesInmueble'));
    }

    public function update(Bienes_inmueblesUpdateRequest $request, Bienes_inmueble $bienesInmueble): Response
    {
        $bienesInmueble->update($request->validated());

        $request->session()->flash('bienesInmueble.id', $bienesInmueble->id);

        return redirect()->route('bienesInmuebles.index');
    }

    public function destroy(Request $request, Bienes_inmueble $bienesInmueble): Response
    {
        $bienesInmueble->delete();

        return redirect()->route('bienesInmuebles.index');
    }
}
