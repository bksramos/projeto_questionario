@extends('layouts.master')

@section('content')

    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-file-text-o"></i> Documentos </h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="/dashboard">Início</a></li>
                        <li><i class="icon_document_alt"></i>Avaliação Documento</li>
                        <li><i class="fa fa-file-text-o"></i>Avaliação Realizada</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Avaliação de Documento
                        </header>
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-8">
                                    <div class="card">

                                        <div class="card-body">
                                            <h1 class="display-3">Avaliação Realizada!</h1>
                                            <br>
                                            <br>
                                            <p class="lead"><strong> Avaliação do documento finalizada.</strong>
                                                <br>
                                                <br>
                                                Obrigado.</p>
                                            <hr>
                                            <p>
                                                Problemas? <a href="">Contato</a>
                                            </p>
                                            <p class="lead">
                                                <a class="btn btn-primary btn-sm" href="/dashboard" role="button">Voltar para a Página Inicial</a>
                                            </p>


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


