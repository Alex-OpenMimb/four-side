@extends('layouts.auth.app')

@section('title', 'Login')

@section('content')
    @component('components.login.header')
        @slot('title', 'Bienvenido')
        @slot('subtitle')
            <span class="fs-4">Iniciar sesión</span>
        @endslot
    @endcomponent

    <div class="mt-3" id="alertContainer"></div>
    <form id="formLogin" method="POST" action="{{ route('login') }}" class="my-5">
        @csrf
        <label class="input-group mb-3">
            <input id="usuarioAlias" type="text" class="form-control" name="usuarioAlias" required
                autocomplete="off" autofocus placeholder="Usuario" aria-label="usuario" value="{{old('usuarioAlias')}}" aria-describedby="usuario">
            @error('usuarioAlias') <span class="text-danger ">{{ $message }}</span> @enderror
        </label>
        <label class="input-group mb-3">
            <input   placeholder="Contraseña" autocomplete="off"  aria-label="contraseña" aria-describedby="Contraseña" id="password"
                type="password" class="form-control" name="usuarioPassword"  value="{{old('usuarioPassword')}}" required >
            @error('usuarioPassword') <span class="text-danger ">{{ $message }}</span> @enderror
        </label>

        <button type="submit" class="btn btn-dark w-100 mt-3">Iniciar</button>
    </form>

    @if(session('error'))

        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>  {{ session('error') }} </strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

    @endif

    @push('javascript')
        <script src="{{ asset('modulos/js/seguridad/helpers/login.js') }}"></script>
    @endpush
@endsection
