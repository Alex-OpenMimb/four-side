@extends('layouts.app')

@section('slot')
    <div class="d-flex justify-content-center   ">
        <a href="{{route('usuarios.catalogo')}}" type="button" class="btn btn-primary btn-sm">
            Atras
        </a>
    </div>
<div class="container d-flex justify-content-center align-items-center">

    <div class="card" style="width: 18rem;">
        <img
           @if($user->usuarioFoto)
               src="{{asset($user->usuarioFoto )}}"
           @else
               src="{{asset('storage/photo/avatar.jpg')}}"
           @endif

            height="250"
             class="card-img-top" alt="...">
        <div class="list-group list-group-flush">
            <div class="list-group-item"><strong>Nombre:</strong> {{$user->usuarioNombre}}</div>
            <div class="list-group-item"><strong>Alias:</strong> {{$user->usuarioAlias}}</div>
            <div class="list-group-item"><strong>Email:</strong>{{$user->usuarioEmail}}</div>
            <div class="list-group-item"><strong>Última conexión</strong>{{$user->usuarioUltimaConexion}}</div>
            <div class="list-group-item"><strong>Estado:</strong> {{$user->usuarioEstado}}</div>

        </div >
        <div class="card-body">
            <a href="{{route('usuarios.catalogo.edit',['user'=>$user])}}" class="card-link">Actualizar foto</a>
        </div>
    </div>
</div>

@endsection
