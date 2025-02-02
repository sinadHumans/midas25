<?php

namespace App\Http\Controllers;

use App\Http\Requests\SegurosStoreRequest;
use App\Http\Requests\SegurosUpdateRequest;
use App\Models\Seguros;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SegurosController extends Controller
{
    public function index(Request $request): Response
    {
        $seguros = Seguro::all();

        return view('seguro.index', compact('seguros'));
    }

    public function create(Request $request): Response
    {
        return view('seguro.create');
    }

    public function store(SegurosStoreRequest $request): Response
    {
        $seguro = Seguro::create($request->validated());

        $request->session()->flash('seguro.id', $seguro->id);

        return redirect()->route('seguros.index');
    }

    public function show(Request $request, Seguro $seguro): Response
    {
        return view('seguro.show', compact('seguro'));
    }

    public function edit(Request $request, Seguro $seguro): Response
    {
        return view('seguro.edit', compact('seguro'));
    }

    public function update(SegurosUpdateRequest $request, Seguro $seguro): Response
    {
        $seguro->update($request->validated());

        $request->session()->flash('seguro.id', $seguro->id);

        return redirect()->route('seguros.index');
    }

    public function destroy(Request $request, Seguro $seguro): Response
    {
        $seguro->delete();

        return redirect()->route('seguros.index');
    }
}
