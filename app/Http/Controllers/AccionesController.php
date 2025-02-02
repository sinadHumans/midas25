<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccionesStoreRequest;
use App\Http\Requests\AccionesUpdateRequest;
use App\Models\Acciones;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AccionesController extends Controller
{
    public function index()
    {
        $acciones = Acciones::all();
        return view('acciones.index', compact('acciones'));
    }
}
