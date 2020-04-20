<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Documento;
use App\Status;
use DB;
class ResponderController extends Controller
{
    public function responder()
    {
    	return view('documento.responder');
    }
    public function responderDoc(Documento $documento)
    {
        $documentos = DB::table('documentos')
                                ->join('documento_status', 'documentos.id', '=', 'documento_status.documento_id')
                                ->join('documento_tipos', 'documentos.documento_tipo_id', '=', 'documento_tipos.id' )
                                ->join('documento_origems', 'documentos.documento_origem_id', '=', 'documento_origems.id')
                                ->join('users', 'documentos.user_id', '=', 'users.id')
                                ->select('documentos.*', 'documento_status.status_id', 'documento_tipos.descricao as tipo',
                                         'documento_origems.descricao', 'users.name')
                                ->paginate(10);
//        dd($documentos);

	    return view('documento.responder', compact('documentos'));
    }

}
