@extends('layouts.app')

@section('slot')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h3 class="text-center mb-4">Adjuntar Foto</h3>

                <form method="POST" action="/upload" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <input class="form-control" type="file" id="imagen" name="imagen" accept="image/*" onchange="previewImage(event)" required>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">Guardar Foto</button>
                        <a href="{{route('usuarios.catalogo.show',['user'=>$user])}}" class="btn btn-danger">Cancelar</a>

                    </div>

                    <div class="mt-2">
                        <img id="imagePreview" src="#" alt="Previsualización de la imagen" width="auto" height="300" style="display:none;">
                    </div>
                </form>
            </div>
        </div>
    </div>
    @push('javascript')
        <script src="{{ asset('modulos/js/seguridad/helpers/photo.js') }}"></script>
    @endpush
@endsection
