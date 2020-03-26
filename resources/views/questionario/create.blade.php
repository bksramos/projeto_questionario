@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Documentos a serem avaliados</div><br>

                <div class="card-body">
                    <form action="/questionarios" method="post"></form>

                        @csrf

                        <div class="form-group">
                        <label for="title">Documento</label>
                            <select class="form-control" id="type" name="selType">
                              <option>--Documento--</option>
                              <option>{{$documentos}}</option>
                            </select>
                            <small id="select_docHelp" class="form-text text-muted">Escolha um documento.</small>

                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror

                        </div>

                        <button type="submit" class="btn btn-primary">Avaliar Documento</button>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
