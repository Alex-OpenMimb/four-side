@extends('layouts.app')

@section('slot')
    <div class="container mt-5">

        <div class="table-responsive">
            <form method="POST" class="mb-2 d-flex justify-content-end" action="{{ route('logout') }}" >
                @csrf
                <button type="submit" class="btn btn-danger btn-sm">
                    logout
                </button>
            </form>
            <table class="table table-bordered table-striped table-hover align-middle text-center rounded">
                <thead class="table-primary">
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Estado</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach( $users as $user )
                    <tr>
                        <td>{{$user->idUsuario}}</td>
                        <td>{{$user->usuarioNombre}}</td>
                        <td>{{$user->usuarioEmail}}</td>
                        <td>{{$user->usuarioEstado}}</td>
                        <td>
                            <a href="{{route('usuarios.catalogo.show',['user'=>$user])}}" type="button" class="btn btn-primary btn-sm">
                                Gestionar
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
