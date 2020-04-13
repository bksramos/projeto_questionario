<?php

namespace App\Http\Controllers;

use App\documento;
use Illuminate\Http\Request;

class QuestionarioController extends Controller
{
    public function create()
    {
    	return view('questionario.create');
    }

    public function select_doc()
    {
    	$documentos = Documento::paginate(10);
    	//var_dump($documentos);
    	//die();
    	return view('questionario.create', compact('documentos'));
    }

    public function store()
    {
    	$data = request()->validate([
    		'selType' => 'required|not_in:0',
    	]);

    	$data['user_id'] = auth()->user()->id;
    }
}