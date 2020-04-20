@extends('layouts.master')

@section('content')

    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-file-text-o"></i> Documentos</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="/dashboard">Início</a></li>
                        <li><i class="icon_document_alt"></i>Documentos</li>
                        <li><i class="fa fa-file-text-o"></i>Avaliar Documentos</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Avaliar Documentos
                        </header>
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="card">
{{--                        Início do Conteúdo da Página--}}

                                        <div class="card-body">
                                            <form action="/documentos/responder" method="post">

                                                @csrf

                                                <div class="form-group">
                                                    <br>
                                                    <table class="table table-striped w-auto">
                                                        <thead>
                                                        <tr>

                                                            <th style="text-align:center">Codigo</th>
                                                            <th style="text-align:center">Título</th>
                                                            <th style="text-align:center">Tipo</th>
                                                            <th style="text-align:center">Origem</th>
                                                            <th style="text-align:center">Usuario</th>
                                                            <th style="text-align:center">Criado em</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($documentos as $documento)
                                                            @if($documento->status_id == '1')
                                                            <tr>

                                                                <td style="vertical-align: middle">{{$documento->code}}</td>
                                                                <td style="vertical-align: middle">{{$documento->title}}</td>
                                                                <td style="vertical-align: middle">{{$documento->tipo}}</td>
                                                                <td style="vertical-align: middle">{{$documento->descricao}}</td>
                                                                <td style="vertical-align: middle">{{$documento->name}}</td>
                                                                <td style="vertical-align: middle">{{$documento->created_at}}</td>
                                                                <td style="vertical-align: middle">
                                                                    <a href="/perguntas/{{$documento->id}}-{{ Str::slug($documento->title)}}" class="btn btn-primary">Avaliar Documento</a>
                                                                </td>
                                                            </tr>
                                                            @endif
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                    <small id="select_docHelp" class="form-text text-muted">Escolha um documento.</small>

{{--                                                <!-- @error('title')-->--}}
{{--                                                <!--    <small class="text-danger">{{ $message }}</small>-->--}}
{{--                                                    <!--@enderror-->--}}
                                                    {{$documentos->links()}}
                                                </div>

                                                <!-- <button type="submit" class="btn btn-primary">Avaliar Documento</button> -->
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
        </section>
        </div>
        </div>
        <!-- page end-->
    </section>
    </section>
@endsection
