<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Documento;
use App\DocumentoOrigem;
use App\DocumentoTipo;
use App\OrgaoEmissor;
use App\Resposta;
use DB;

class DocumentoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function add()
    {
    	return view('documento.add');
    }

    public function addDocuments()
    {
    	$documentos = Documento::paginate(10);
        $origens = DocumentoOrigem::all();
        $tipos = DocumentoTipo::all();
        $orgaos = OrgaoEmissor::all();
    	//var_dump($documentos);
    	//die();
    	return view('documento.add', compact('documentos', 'origens', 'tipos', 'orgaos'));
    }

    public function store()
    {
        $data = request()->validate([
            'code' => 'required',
            'data' => 'required',
            'title' => 'required',
            'documento_origem_id' => 'required',
            'documento_tipo_id' => 'required',
            'orgao_emissor_id' => 'required',
        ]);

        //var_dump(request('docCode'));
        //var_dump(request('docOrigem'));
        //var_dump(request('docTipo'));
        //var_dump(request('docOrgao'));
        $data['code'] = request('code');
        $data['data'] = request('data');
        $data['title'] = request('title');
        $data['documento_origem_id'] = request('documento_origem_id');
        $data['documento_tipo_id'] = request('documento_tipo_id');
        $data['orgao_emissor_id'] = request('orgao_emissor_id');
        $data['user_id'] = auth()->user()->id;

        $dataResposta = new resposta;

        //$dataResposta->documento_id = $data->id;
        $documentos = \App\Documento::create($data);

        /* Sincroniza o novo documento com as perguntas */
        $last_insert_id = DB::getPdo()->lastInsertId();
        $documentos = documento::find($last_insert_id);
        $documentos->questaos()->sync([1,2,3,4,5,6]);


        return redirect('/documentos/add/'.$documentos->id);
    }

    public function show(\App\Documento $documento)
    {

        //$documento->load('questaos.alternativas');
        //dd($documento);

        return view('documento.show', compact('documento'));
    }



}
