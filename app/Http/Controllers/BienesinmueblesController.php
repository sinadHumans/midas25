<?php

namespace App\Http\Controllers;

use App\Http\Requests\BienesinmueblesStoreRequest;
use App\Http\Requests\BienesinmueblesUpdateRequest;
use App\Models\Bienesinmuebles;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BienesinmueblesController extends Controller
{
    public function index(Request $request): Response
    {
        $bienesinmuebles = Bienesinmueble::all();

        return view('bienesinmueble.index', compact('bienesinmuebles'));
    }

    public function create(Request $request): Response
    {
        return view('bienesinmueble.create');
    }

    public function store(BienesinmueblesStoreRequest $request): Response
    {
        $bienesinmueble = Bienesinmueble::create($request->validated());

        $request->session()->flash('bienesinmueble.id', $bienesinmueble->id);

        return redirect()->route('bienesinmuebles.index');
    }

    public function show(Request $request, Bienesinmueble $bienesinmueble): Response
    {
        return view('bienesinmueble.show', compact('bienesinmueble'));
    }

    public function edit(Request $request, Bienesinmueble $bienesinmueble): Response
    {
        return view('bienesinmueble.edit', compact('bienesinmueble'));
    }

    public function update(BienesinmueblesUpdateRequest $request, Bienesinmueble $bienesinmueble): Response
    {
        $bienesinmueble->update($request->validated());

        $request->session()->flash('bienesinmueble.id', $bienesinmueble->id);

        return redirect()->route('bienesinmuebles.index');
    }

    public function destroy(Request $request, Bienesinmueble $bienesinmueble): Response
    {
        $bienesinmueble->delete();

        return redirect()->route('bienesinmuebles.index');
    }
}
