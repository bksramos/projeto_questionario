<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndicadorController extends Controller
{
    public function general()
    {
        return view('indicador.general');
    }

    public function organization()
    {
        return view('indicador.organization');
    }

    public function knowledge()
    {
        return view('indicador.knowledge');
    }
}
