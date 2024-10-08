<?php

namespace App\Http\Controllers\Seguridad;


use App\Http\Requests\Seguridad\UsuarioRquest;
use App\Models\Seguridad\Usuario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


class UsuarioController extends Controller
{

    public function index()
    {
        $users = Usuario::select('idUsuario','usuarioNombre','usuarioEmail','usuarioEstado')->get();
        return view("modulos.seguridad.usuario.catalogo", compact('users'));
    }


    public function show( Usuario $user )
    {
       return  view('modulos.seguridad.usuario.show',compact('user'));
    }


    public function edit( Usuario $user )
    {
        return  view('modulos.seguridad.usuario.edit',compact('user'));
    }

    public function update( UsuarioRquest $request, Usuario $user  )
    {
        $path     = 'image/users';
        $nameFile = $user->idUsuario.'.png';
        $image    = $request->usuarioFoto;
        Storage::disk('public')->putFileAs( $path, $image, $nameFile );
        $user->usuarioFoto = 'storage/' . $path . '/' . $nameFile;
        $user->save();
        toastr()->success('Foto actualizada con éxito','Felicitaciones');
        return redirect()->route('usuarios.catalogo.show',[$user]);
    }


}
