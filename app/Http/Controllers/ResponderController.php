<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Documento;

class ResponderController extends Controller
{
    public function responder()
    {
    	return view('documento.responder');
    }
    public function responderDoc()
    {
    	$documentos = Documento::paginate(10);
	    //var_dump($documentos);
	    //die();
	    return view('documento.responder', compact('documentos'));
    }

}
