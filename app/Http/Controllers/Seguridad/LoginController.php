<?php

namespace App\Http\Controllers\Seguridad;

use App\Http\Requests\Seguridad\AccesoFormRequest;
use DateTime;
use DateInterval;
use Illuminate\Http\Request;
use App\Models\Seguridad\Usuario;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class LoginController extends Controller
{

    public $modelUsuario;

    public function __construct()
    {
        $this->modelUsuario = new Usuario();
    }

    public function index(): View
    {
        return view('modulos.seguridad.auth.login');
    }

    public function login(AccesoFormRequest $request)
    {
        $usuariosAlias    = $request->usuarioAlias;
        $usuariosPassword = $request->usuarioPassword;
        $user = Usuario::getUser( $usuariosAlias )->first();

        if( $user->usuarioEstado === 'Inactivo' ) {

            return redirect()->back()->with('error', 'El Usuario '. $usuariosAlias .' está inactivo, favor verificar');
        }elseif( $user->usuarioEstado === 'Bloqueado' ){

            return redirect()->back()->with('error','El usuario ' . $usuariosAlias .' está bloqueado, favor verificar');
        }else{

           if( Hash::check($usuariosPassword, $user->usuarioPassword ) ){
               $user->guardarSesion( $user );

               return redirect()->route('usuarios.catalogo');

           }else{
               return redirect()->back()->with('error','Contraseña incorrecta, favor verificar');
           }
        }

    }

    public function logout()
    {
        $user = session()->get('user');
        if( $user->desconectar( $user ) ){
            session()->flush();
            return redirect('/');
        }else{
            return redirect()->back()->with('error','Ha ocurrido un error al intentar esta acción, intente nuevamente, si el error perciste contacte al área de soporte');
        }

    }


}
