@extends('layouts.app')

@section('slot')

<div class="container w-25">
    <form id="formLogin" method="POST" action="{{route('forgot.password')}}" class="my-5">
        @csrf
        <h3>Restablece Contraseña</h3>
        <label class="input-group mb-3">
            <input id="usuarioAlias" type="email" class="form-control" name="usuarioEmail" required
                   autocomplete="off" autofocus placeholder="Email" aria-label="usuario" value="{{old('usuarioEmail')}}" aria-describedby="usuario">
        </label>
        @error('usuarioEmail') <span class="text-danger ">{{ $message }}</span> @enderror
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">Continuar</button>
            <a href="{{ route('index') }}" class="btn btn-danger">Cancelar</a>

        </div>
    </form>
</div>

@endsection
