@extends('layouts.master')

@section('content')

    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-file-text-o"></i> Controle de Usuários</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="/dashboard">Início</a></li>
                        <li><i class="icon_document_alt"></i>Usuários</li>
                        <li><i class="fa fa-file-text-o"></i>Editar Usuários</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Editar Usuário {{ $user->name }}
                        </header>
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-8">
                                    <div class="card">
                                        {{--                        Início do Conteúdo da Página--}}
                                        <div class="card-body">
                                            <form action="{{ route('admin.users.update', ['user'=> $user->id]) }}" method="post">
                                                @csrf
                                                {{ method_field('PUT') }}
                                                @foreach($roles as $role)
                                                    <div class="form-check">
                                                        <input type="checkbox" name="roles[]" value="{{ $role->id }}"
                                                               {{ $user->hasAnyRole($role->name)?'checked':'' }}>
                                                        <label>{{ $role->name }}</label>
                                                    </div>
                                                    @endforeach
                                                <button type="submit" class="btn btn-primary">
                                                    Update
                                                </button>
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
