@extends('layouts.master')

@section('content')

    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-file-text-o"></i> Controle de Usuários</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="/home">Início</a></li>
                        <li><i class="icon_document_alt"></i>Usuários</li>
                        <li><i class="fa fa-file-text-o"></i>Editar Usuários</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Todos Usuários
                        </header>
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="card">
                                        {{--                        Início do Conteúdo da Página--}}
                                    <div class="card-body">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th style="text-align:center">Nome</th>
                                                <th style="text-align:center">Email</th>
                                                <th style="text-align:center">Roles</th>
                                                <th style="text-align:center">Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($users as $user)
                                            <tr>
                                                <th style="text-align:center">{{ $user->name }}</th>
                                                <th style="text-align:center">{{ $user->email }}</th>
                                                <th style="text-align:center">{{ implode(', ', $user->roles()->get()->pluck('name')->toArray()) }}</th>
                                                <th style="text-align:center">
                                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="float-left">
                                                        <button type="button" class="btn btn-primary btn-sm">Editar</button>
                                                    </a>
                                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="post" class="float-left">
                                                        @csrf
                                                        {{ method_field('DELETE') }}
                                                        <button type="submit" class="btn btn-danger btn-sm">Deletar</button>
                                                    </form>
                                                </th>
                                            </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{ $users->links() }}
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
