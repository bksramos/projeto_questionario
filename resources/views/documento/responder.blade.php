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
                                <div class="col-xs-8">
                                    <div class="card">
{{--                        Início do Conteúdo da Página--}}
                                        <div class="card-body">
                                            <form action="/documentos/responder" method="post">

                                                @csrf

                                                <div class="form-group">
                                                    <br>
                                                    <table class="table table-bordered">
                                                        <thead>
                                                        <tr>

                                                            <th>Codigo</th>
                                                            <th>Título</th>
                                                            <th>Tipo</th>
                                                            <th>Origem</th>
                                                            <th>Usuario</th>
                                                            <th>Criado em</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($documentos as $documento)
                                                            <tr>

                                                                <td>{{$documento->code}}</td>
                                                                <td>{{$documento->title}}</td>
                                                                <td>{{$documento->documento_tipo_id}}</td>
                                                                <td>{{$documento->documento_origem_id}}</td>
                                                                <td>{{$documento->user_id}}</td>
                                                                <td>{{$documento->created_at}}</td>
                                                                <td>
                                                                    <a href="/perguntas/{{$documento->id}}-{{ Str::slug($documento->title)}}" class="btn btn-primary">Avaliar Documento</a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                    <small id="select_docHelp" class="form-text text-muted">Escolha um documento.</small>

                                                <!-- @error('title')-->
                                                <!--    <small class="text-danger">{{ $message }}</small>-->
                                                    <!--@enderror-->
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
