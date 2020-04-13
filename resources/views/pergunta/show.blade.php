{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}

{{--             <h1>{{$relations->pivotParent->title }}</h1>--}}

{{--             <form action="/perguntas/{{$documento->id}}-{{ Str::slug($documento->title)}}" method="post">--}}
{{--                @csrf--}}

{{--                @foreach($relations->pivotParent->questaos as $key => $questao)--}}
{{--                     <div class="card mt-4">--}}
{{--                        <div class="card-header"><strong>{{ $key + 1 }}</strong>{{ $questao->título }}</div>--}}

{{--                        <div class="card-body">--}}

{{--                            @error('respostas.' . $key . '.alternativa_id')--}}
{{--                                <small class="text-danger"> {{ $message }}</small>--}}
{{--                            @enderror--}}

{{--                            <ul class="list-group">--}}
{{--                                @foreach($questao->alternativas as $alternativa)--}}
{{--                                     <li class="list-group-item">--}}
{{--                                         <input type="radio" name="respostas[{{ $key }}][alternativa_id]" id="alternativa{{ $alternativa->id }}"--}}
{{--                                                {{ (old('respostas.' . $key . '.alternativa_id') == $alternativa->id) ? 'checked' : '' }}--}}
{{--                                                class="mr-4" value="{{ $alternativa->id }}">--}}
{{--                                         {{ $alternativa->descricao }}--}}

{{--                                         <input type="hidden" name="respostas[{{ $key }}][questao_id]" value="{{ $questao->id }}">--}}
{{--                                         <input type="hidden" name="respostas[{{ $key }}][documento_id]" value="{{ $documento->id }}">--}}
{{--                                         <input type="hidden" name="respostas[{{ $key }}][user_id]" value="{{ auth()->user()->id }}">--}}
{{--                                     </li>--}}
{{--                                @endforeach--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                     </div>--}}
{{--                @endforeach--}}



{{--                    <button type="submit" class="btn btn-primary">Responder Avaliação</button>--}}
{{--             </form>--}}
{{--                </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--@endsection--}}


@extends('layouts.master')

@section('content')

    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-file-text-o"></i> Controle de Usuários</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="/dashboard">Início</a></li>
                        <li><i class="icon_document_alt"></i>Documentos</li>
                        <li><i class="fa fa-file-text-o"></i>Avaliar Documentos</li>
                        <li><i class="fa fa-file-text-o"></i>{{$relations->pivotParent->title}}</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Avaliação do Documento {{$relations->pivotParent->title}}
                        </header>
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-8">
                                    <div class="card">
                                        {{--                        Início do Conteúdo da Página--}}
                                    <form action="/perguntas/{{$documento->id}}-{{ Str::slug($documento->title)}}" method="post">
                                        @csrf

                                        @foreach($relations->pivotParent->questaos as $key => $questao)
                                            <div class="card mt-4">
                                                <div class="card-header"><strong>{{ $key + 1 }}</strong>{{ $questao->título }}</div>
                                                <div class="card-body">
                                                    @error('respostas.' . $key . '.alternativa_id')
                                                    <small class="text-danger"> {{ $message }}</small>
                                                    @enderror
                                                    <ul class="list-group">
                                                        @foreach($questao->alternativas as $alternativa)
                                                            <li class="list-group-item">
                                                                <input type="radio" name="respostas[{{ $key }}][alternativa_id]" id="alternativa{{ $alternativa->id }}"
                                                                       {{ (old('respostas.' . $key . '.alternativa_id') == $alternativa->id) ? 'checked' : '' }}
                                                                       class="mr-4" value="{{ $alternativa->id }}">
                                                                {{ $alternativa->descricao }}
                                                                <input type="hidden" name="respostas[{{ $key }}][questao_id]" value="{{ $questao->id }}">
                                                                <input type="hidden" name="respostas[{{ $key }}][documento_id]" value="{{ $documento->id }}">
                                                                <input type="hidden" name="respostas[{{ $key }}][user_id]" value="{{ auth()->user()->id }}">
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        @endforeach
                                        <button type="submit" class="btn btn-primary">Responder Avaliação</button>
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
    </section>
@endsection
