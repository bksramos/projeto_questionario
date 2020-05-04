<?php

namespace App\Http\Controllers;

use App\Resposta;
use App\Status;
use Illuminate\Http\Request;
use App\Documento;
use App\Questao;
use App\Alternativa;
use DB;

class PerguntaController extends Controller
{
    public function show(Documento $documento, $slug)
    {
        $documento = \App\Documento::find($slug);
        $alternativas = \App\Alternativa::all();
        $relations = $documento->questaos->first()->pivot;
        return view('pergunta.show', compact('relations', 'documento', 'alternativas'));
    }

    public function store(Documento $documento, $id, $slug)
    {
//        dd(request()->all());
        $data = request()->validate([
           'respostas.*.documento_id' => 'required',
           'respostas.*.questao_id' => 'required',
           'respostas.*.alternativa_id' => 'required',
           'respostas.*.user_id' => 'required',
           'respostas.*.created_at' => 'required',
           'respostas.*.updated_at' => 'required',
//           'comentario.documento_id' => 'required',
//           'comentario.comantario1' => 'required',
//           'comentario.comentario2' => 'required',
//           'comentario.created_at' => 'required',
//           'comentario.updated_at' => 'required',
        ]);
//        dd($data);

        $resposta = $documento->respostas()->insert($data['respostas']);
//        $comentario = $documento->comentarios()->create($data['comentario']);

        $documento = Documento::find($id);
        $documento->statuses()->sync([2]);

        return redirect('/perguntas/finish');
    }

    public function finish(Documento $documento)
    {
        return view('pergunta.finish', compact('documento'));
    }

    public function editar(Documento $documento, $slug)
    {
        $documento = \App\Documento::find($slug);
        $alternativas = \App\Alternativa::all();
        $relations = $documento->questaos->first()->pivot;
        return view('pergunta.editar', compact('relations', 'documento', 'alternativas'));
    }

    public function update(Documento $documento, $documento_id, $slug)
    {
//        dd(request()->all());
        $data = request()->validate([
            'respostas.*.documento_id' => 'required',
            'respostas.*.questao_id' => 'required',
            'respostas.*.alternativa_id' => 'required',
            'respostas.*.user_id' => 'required',
            'respostas.*.created_at' => 'required',
            'respostas.*.updated_at' => 'required',
//           'survey.*.comantario1' => 'required',
//           'survey.*.comentario2' => 'required',
//           'survey.*.created_at' => 'required',
//           'survey.*.updated_at' => 'required',
        ]);
//        dd($data);
        $delete = DB::table('respostas')
                        ->whereIn('documento_id', [$documento_id])
                        ->delete();
        $resposta = $documento->respostas()->insert($data['respostas']);


        return redirect('/perguntas/editado');;
    }

    public function editado(Documento $documento)
    {
        return view('pergunta.editado', compact('documento'));
    }
}
