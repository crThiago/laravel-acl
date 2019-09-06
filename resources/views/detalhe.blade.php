@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @can('view', $chamado);
            <h2>Lista de Detalhe</h2>
            <p>{{$chamado->titulo}}</p>
        @else
            <h3>Não possui permissão</h3>
        @endcan
    </div>
</div>
@endsection
