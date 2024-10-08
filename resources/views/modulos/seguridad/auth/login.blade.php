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
            <input id="usuarioEmail" type="text" class="form-control" name="usuarioEmail" required
                autocomplete="off" autofocus placeholder="Email" aria-label="Email" value="{{old('usuarioEmail')}}" aria-describedby="Email">
            @error('usuarioEmail') <span class="text-danger ">{{ $message }}</span> @enderror
        </label>
        <label class="input-group mb-3">
            <input   placeholder="Contraseña" autocomplete="off"  aria-label="contraseña" aria-describedby="Contraseña" id="password"
                type="password" class="form-control" name="usuarioPassword"  value="{{old('usuarioPassword')}}" required >
            @error('usuarioPassword') <span class="text-danger ">{{ $message }}</span> @enderror
        </label>

        <button type="submit" class="btn btn-dark w-100 my-3">Iniciar</button>
        <a href="{{route('restart')}}">Olvidé mi contraseña</a>
    </form>



@endsection
