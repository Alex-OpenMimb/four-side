@extends('layouts.app')

@section('slot')

    <div class="container w-25">
        <form id="formLogin" method="POST" action="{{route('update.password',['user'=> $user])}}" class="my-5">
            @csrf
            @method('PUT')
            <h3>Ingresar nueva contraseña</h3>
            <label class="input-group mb-3">
                <input id="usuarioAlias" type="password" class="form-control" name="usuarioPassword" required
                       autocomplete="off" autofocus placeholder="Contraseña" aria-label="usuarioPassword" value="{{old('usuarioPassword')}}" aria-describedby="token">
            </label>
            @error('usuarioPassword') <span class="text-danger ">{{ $message }}</span> @enderror
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Continuar</button>
            </div>
        </form>
    </div>

@endsection
