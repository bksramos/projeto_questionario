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
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                
                                        <th>Codigo</th>
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
                                        <td>{{$documento->documento_tipos->descricao}}</td>
                                        <td>{{$documento->documento_origem_id}}</td>
                                        <td>{{$documento->user_id}}</td>
                                        <td>{{$documento->created_at}}</td>
                                        <td>
                                        <button type="button" class="btn btn-success">Avaliar</button>
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
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
