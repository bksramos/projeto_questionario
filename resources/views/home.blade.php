@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Página Inicial</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <br>
                    <a href="/questionarios/create" class="btn btn-primary">Adicionar Documento</a>
                    <br><br><br>
                    <a href="/questionarios/create" class="btn btn-primary">Responder Avaliação</a>
                    <br><br><br>
                    <a href="/questionarios/create" class="btn btn-primary">Editar Avaliação</a>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
