<?php

namespace App\Http\Controllers\Seguridad;


use App\Models\Seguridad\Usuario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


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


}
