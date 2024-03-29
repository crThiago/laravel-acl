@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h2>Admin</h2>
    </div>
    @include('admin._caminho')
    <div class="row">
        <div class="col s12 m6">
            <div class="card purple darken-2">
                <div class="card-content white-text">
                    <span class="card-title">Usuário</span>
                    <p>Usuário do Sistema</p>
                </div>
                <div class="card-action">
                    <a href="{{route('usuarios.index')}}">Visualizar</a>
                </div>
            </div>
        </div>
        @can('favoritos-view')
        <div class="col s12 m6">
            <div class="card blue">
                <div class="card-content white-text">
                    <span class="card-title">Favoritos</span>
                    <p>Lista de carros favoritos</p>
                </div>
                <div class="card-action">
                    <a href="#">Visualizar</a>
                </div>
            </div>
        </div>
        @endcan
        @can('perfil-view')
        <div class="col s12 m6">
            <div class="card green">
                <div class="card-content white-text">
                    <span class="card-title">Perfil</span>
                    <p>Alterar dados do perfil</p>
                </div>
                <div class="card-action">
                    <a href="#">Visualizar</a>
                </div>
            </div>
        </div>
        @endcan
        @can('papeis-view')
        <div class="col s12 m6">
            <div class="card orange darken-2">
                <div class="card-content white-text">
                    <span class="card-title">Papéis</span>
                    <p>Listar papéis do sistema</p>
                </div>
                <div class="card-action">
                    <a href="{{route('papeis.index')}}">Visualizar</a>
                </div>
            </div>
        </div>
        @endcan
    </div>
</div>
@endsection
