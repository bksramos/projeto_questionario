<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class IndicadorController extends Controller
{
    public function general()
    {
        return view('indicador.general');
    }

    public function nota()
    {
        $nota = DB::table('respostas')
                    ->leftjoin('alternativas', 'respostas.alternativa_id', '=', 'alternativas.id')
                    ->leftjoin('documentos', 'respostas.documento_id', '=', 'documentos.id')
                    ->leftjoin('orgao_emissors', 'documentos.orgao_emissor_id', '=', 'orgao_emissors.id')
                    ->select('respostas.documento_id', DB::raw('(sum(alternativas.valor)/6)*100 as total'), 'orgao_emissors.name')
                    ->groupBy('respostas.documento_id')
                    ->get()
                    ->toArray();

//        dd($nota);
        return response()->json($nota);
    }

    public function indi()
    {
        $indi = DB::table('respostas')
            ->leftjoin('alternativas', 'respostas.alternativa_id', '=', 'alternativas.id')
            ->leftjoin('documentos', 'respostas.documento_id', '=', 'documentos.id')
            ->leftjoin('orgao_emissors', 'documentos.orgao_emissor_id', '=', 'orgao_emissors.id')
//            ->select('respostas.documento_id', DB::raw('(sum(alternativas.valor)/6)*100 as total'), 'orgao_emissors.name')
            ->select(DB::raw('(sum(alternativas.valor)/6)*100 as total'))
            ->groupBy('respostas.documento_id')
            ->where('orgao_emissors.name', 'CIAER')
            ->get()
            ->toArray();

//        dd($indi);
        return response()->json($indi);
    }

    public function estatisticas()
    {
        $informes = DB::table('documentos')
            ->leftjoin('documento_tipos', 'documentos.documento_tipo_id', '=', 'documento_tipos.id')
            ->select('documento_tipos.descricao as tipo', DB::raw('count(*) as total'))
            ->where('documento_tipos.descricao', 'INFORME')
            ->groupBy('documento_tipo_id')
            ->get()
            ->toArray();
        $informacoes = DB::table('documentos')
            ->leftjoin('documento_tipos', 'documentos.documento_tipo_id', '=', 'documento_tipos.id')
            ->select('documento_tipos.descricao as tipo', DB::raw('count(*) as total'))
            ->where('documento_tipos.descricao', 'INFORMACAO')
            ->groupBy('documento_tipo_id')
            ->get()
            ->toArray();
        $aprecs = DB::table('documentos')
            ->leftjoin('documento_tipos', 'documentos.documento_tipo_id', '=', 'documento_tipos.id')
            ->select('documento_tipos.descricao as tipo', DB::raw('count(*) as total'))
            ->where('documento_tipos.descricao', 'APRECIACAO')
            ->groupBy('documento_tipo_id')
            ->get()
            ->toArray();
        $estimativas = DB::table('documentos')
            ->leftjoin('documento_tipos', 'documentos.documento_tipo_id', '=', 'documento_tipos.id')
            ->select('documento_tipos.descricao as tipo', DB::raw('count(*) as total'))
            ->where('documento_tipos.descricao', 'ESTIMATIVA')
            ->groupBy('documento_tipo_id')
            ->get()
            ->toArray();
        $datas = DB::table('documentos')
            ->leftjoin('orgao_emissors', 'documentos.orgao_emissor_id', '=', 'orgao_emissors.id')
            ->select('orgao_emissors.name AS nome', DB::raw('COUNT(documentos.id) as visits'))
            ->groupBy('nome')
            ->orderBy('visits', 'desc')
            ->get()
            ->toArray();
        $indis = DB::table('respostas')
            ->leftjoin('alternativas', 'respostas.alternativa_id', '=', 'alternativas.id')
            ->leftjoin('documentos', 'respostas.documento_id', '=', 'documentos.id')
            ->leftjoin('orgao_emissors', 'documentos.orgao_emissor_id', '=', 'orgao_emissors.id')
//            ->select('respostas.documento_id', DB::raw('(sum(alternativas.valor)/6)*100 as total'), 'orgao_emissors.name')
            ->select(DB::raw('(sum(alternativas.valor)/6)*100 as total'))
            ->groupBy('respostas.documento_id')
            ->where('orgao_emissors.name', 'CIAER')
            ->get()
            ->toArray();
        return view('indicador.general', compact('informes', 'informacoes',
                                                        'datas','estimativas', 'aprecs', 'indis'));
    }


    public function diario()
    {
        $diario = DB::table('documentos')
            ->select(DB::raw('DATE(created_at) AS DATE'), DB::raw('count(*) as NumDocumentos'))
            ->groupBy('DATE')
            ->get()
            ->toArray();
//        dd($diario);
        return response()->json($diario);
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
