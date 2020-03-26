<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestionarioController extends Controller
{
    public function create()
    {
    	return view('questionario.create');
    }

    public function store()
    {
    	$data = request()->validate([
    		'selType' => 'required|not_in:0',
    	]);
    }
}