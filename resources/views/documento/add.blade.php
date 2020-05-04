@extends('layouts.master')

@section('content')
<head>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
</head>


<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa-file-text-o"></i> Documentos</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="/dashboard">Início</a></li>
                    <li><i class="icon_document_alt"></i>Documentos</li>
                    <li><i class="fa fa-file-text-o"></i>Adicionar Documento</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Adicionar Documentos
                    </header>
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-8">
                                <div class="card">

                                    <div class="card-body">
                                        <form action="/documentos/add" method="post">

                                            @csrf

                                            <div class="form-group">
                                              <label for="code">Número do SIGAD Inteligência</label><br>
                                              <input type="code" name="code" class="form-control" id="code"
                                                     aria-describedby="docCodeHelp" placeholder="SIGAD">
                                              <small id="docCodeHelp"
                                                     class="form-text text-muted">Número do SIGAD Inteligência</small><br>

                                              @error('code')
                                                  <small class="text-danger" role='alert'>{{ $message }}</small>
                                              @enderror
                                            </div>

                                            <div class="form-group">
                                              <label for="data">Data</label><br>
                                              <input type="data" name="data" class="date form-control" id="data"
                                                     aria-describedby="dataHelp" placeholder="Data do Documento">
                                              <small id="dataHelp"
                                                     class="form-text text-muted">Campo 1 do documento</small><br>

                                              @error('data')
                                                  <small class="text-danger" role='alert'>{{ $message }}</small>
                                              @enderror
                                            </div>
                                                <script type="text/javascript">
                                                    $('.date').datepicker({
                                                        autoclose:true,
                                                        format: 'yyyy-mm-dd'
                                                    });
                                                </script>

                                            <div class="form-group">
                                              <label for="title">Assunto</label><br>
                                              <input type="title" name="title" class="form-control" id="title"
                                                     aria-describedby="docCodeHelp" placeholder="Assunto do Documento">
                                              <small id="docTitleHelp"
                                                     class="form-text text-muted">Campo 2 do documento</small><br>

                                              @error('title')
                                                  <small class="text-danger" role='alert'>{{ $message }}</small>
                                              @enderror
                                            </div>


                                            <div class="form-check form-check-inline">
                                                  <label for="documento_origem_id">Origem do Documento</label><br>
                                              @foreach($origens as $documento_origem)
                                                  <label class="radio-inline"><input type="radio" name="documento_origem_id" value="{{$documento_origem->id}}" unChecked>{{$documento_origem->descricao}}&nbsp &nbsp
                                                   &nbsp &nbsp &nbsp &nbsp</label>
                                              @endforeach
                                            </div>
                                              @error('documento_origem_id')
                                                  <small class="text-danger" role='alert'>{{ $message }}</small>
                                              @enderror
                                            <br>

                                            <div class="form-check form-check-inline">
                                              <label for="documento_tipo_id">Tipo do Documento</label><br>
                                              @foreach($tipos as $documento_tipo)
                                              <label class="radio-inline"><input type="radio" name="documento_tipo_id" value="{{$documento_tipo->id}}" unChecked>{{$documento_tipo->descricao}}&nbsp &nbsp
                                                &nbsp &nbsp &nbsp &nbsp</label>
                                              @endforeach
                                            </div>
                                              @error('documento_tipo_id')
                                                  <small class="text-danger" role='alert'>{{ $message }}</small>
                                              @enderror
                                            <br>

                                            <div class="form-group">
                                              <label for="orgao_emissor_id">Orgão Emissor</label><br>

                                                    <select class="browser-default custom-select" name="orgao_emissor_id" id="orgao_emissor_id" >
                                                        <option selected>Órgão Emissor</option>
                                                        @foreach($orgaos as $orgao_emissor)
                                                            <option name="orgao_emissor_id" value="{{$orgao_emissor->id}}" id="orgao_emissor_id" >{{$orgao_emissor->name}}</option>
                                                        @endforeach
                                                    </select>
                                            </div>
                                                @error('orgao_emissor_id')
                                                    <small class="text-danger" role='alert'>{{ $message }}</small>
                                                @enderror
                                            <br>
                                            <button type="submit" class="btn btn-primary">Adicionar Documento</button>

                                        </form>
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
@endsection


