<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccesoStoreRequest;
use App\Http\Requests\AccesoUpdateRequest;
use App\Models\Acceso;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AccesoController extends Controller
{
    public function index()
    {
        $accesos = Acceso::all();
        return view('acceso.index', compact('accesos'));
    }

}
