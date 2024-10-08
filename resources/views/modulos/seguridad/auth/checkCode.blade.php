@extends('layouts.app')

@section('slot')

    <div class="container w-25">
        <form id="formLogin" method="POST" action="" class="my-5">
            @csrf
            <h3>Ingresar código</h3>
            <label class="input-group mb-3">
                <input id="usuarioAlias" type="number" class="form-control" name="token" required
                       autocomplete="off" autofocus placeholder="Email" aria-label="usuario" value="{{old('token')}}" aria-describedby="usuario">
            </label>
            @error('token') <span class="text-danger ">{{ $message }}</span> @enderror
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Continuar</button>

            </div>
        </form>
    </div>

@endsection
