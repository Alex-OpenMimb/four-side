<?php

namespace App\Http\Controllers\Seguridad;

use App\Http\Requests\Seguridad\AccesoFormRequest;
use App\Http\Requests\Seguridad\LoginRequest;
use App\Mail\ResetPasswordCode;
use App\Models\Seguridad\Usuario;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use PhpParser\Node\Stmt\TryCatch;


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
               $this->modelUsuario->guardarSesion( $user );
               return redirect()->route('usuarios.catalogo');
           }else{
               return redirect()->back()->with('error','Contraseña incorrecta, favor verificar');
           }
        }

    }

    public function logout()
    {
        $user = auth()->user();
        if( $this->modelUsuario->desconectar( $user ) ){
            Auth::logout();
            return redirect('/');
        }else{
            return redirect()->back()->with('error','Ha ocurrido un error al intentar esta acción, intente nuevamente, si el error perciste contacte al área de soporte');
        }

    }


    public function restart()
    {
        return view('modulos.seguridad.auth.restartPassword');
    }

    public function formCode()
    {
        return view('modulos.seguridad.auth.checkCode');
    }

    public function sendCode( LoginRequest $request )
    {
        $code = rand(100000, 999999);
        try {
            DB::table('password_reset_tokens')->updateOrInsert(
                ['email' => $request->usuarioEmail],
                ['token' => $code, 'created_at' => now()]
            );
            Mail::to($request->usuarioEmail)->send( new  ResetPasswordCode( $code ));
            return  redirect()->route('form.code');
        }catch (\Exception $e){
            return redirect()->back()->with('Error','Ha ocurrido un error al enviar el correo, intenta nuevamte, si el error persiste comunicate con el equipo de soporte');
        }

    }


}
