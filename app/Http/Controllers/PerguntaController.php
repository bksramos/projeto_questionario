<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Documento;
use App\Questao;
use App\Alternativa;

class PerguntaController extends Controller
{
    public function show(Documento $documento, $slug)
    {
        $documento = \App\Documento::find($slug);
        $alternativas = \App\Alternativa::all();
        $relations = $documento->questaos->first()->pivot;
        return view('pergunta.show', compact('relations', 'documento', 'alternativas'));
    }

    /*public function create()
    {
        $documentos = Documento::all();
        $questaos = Questao::all();
        //dd($documentos);
        return view('pergunta.show', compact('documentos', 'questaos'));
    }

    public function show(documento $documentos, $questaos)
    {
        return view('pergunta.show', compact('questaos'));
        //dd($questaoCategorias);
    }*/

    public function store(Alternativa $alternativa, $slug)
    {
        //dd(request()->all());
        $data = request()->validate([
           'respostas.*.id' => 'required',
           'respostas.*.questao_id' => 'required',
           'respostas.*.alternativa_id' => 'required',
           'respostas.*.user_id' => 'required',
        ]);

        $resposta = $alternativa->respostas()->createMany($data['respostas']);
        $resposta->save();
        return 'Thank you infeliz';
    }
}
//$data['user_id'] = auth()->user()->id;
//$data['documento_id'] = request('documento_id');

