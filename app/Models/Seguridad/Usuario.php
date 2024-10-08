<?php

namespace App\Models\Seguridad;

use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;


class Usuario extends Authenticatable
{

    protected $table = 'seg_usuario';

    protected $fillable = [
        'idUsuario',
        'usuarioAlias',
        'usuarioFoto',
        'usuarioPassword',
        'usuarioNombre',
        'usuarioEmail',
        'usuarioConectado',
        'usuarioEstado',
        'usuarioUltimaConexion',
    ];

    //Usuarios de prueba
    public static $DATA = [
        [
            'usuarioNombre' => 'Alex Hurtado',
            'usuarioPassword' =>'AlexHurtado1047',
            'usuarioEmail' => 'alexhurtado@hot.com',
            'usuarioEstado' => 'Activo',
        ],
        [
            'usuarioNombre' => 'Juan Castro',
            'usuarioPassword' =>'JuanCastro897',
            'usuarioEmail' => 'juancastro@hot.com',
            'usuarioEstado' => 'Inactivo',
        ],
        [
            'usuarioNombre' => 'Andrea Lopez',
            'usuarioPassword' =>'#LopezAndrea$%',
            'usuarioEmail' => 'andrea@hot.com',
            'usuarioEstado' => 'Bloqueado',
        ],
    ];

    protected $primaryKey = "idUsuario";
    public $timestamps = true;

    public function getAuthPassword()
    {
        return $this->usuarioPassword;
    }


    public function conectar($id, $token)
    {
        $row = Usuario::find($id);
        if ($row) {
            $fecha = date("Y-m-d H:i:s");
            $row->usuarioUltimaConexion = $fecha;
            $row->save();
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function desconectar( Usuario $usuario )
    {
        if ($usuario) {
            $usuario->usuarioConectado = 0;
            $usuario->save();
            return TRUE;
        } else {
            return FALSE;
        }
    }


    //Scope
    public function scopeGetUser(Builder $query, $userAlias )
    {
        $query->where('usuarioAlias',$userAlias )
            ->select('idUsuario','usuarioEstado','usuarioPassword');
    }

    public function guardarSesion( Usuario $usuario )
    {
        $usuario->usuarioUltimaConexion = date('Y-m-d H:i:s');
        $usuario->usuarioConectado = 1;
        $usuario->save();
        Auth::login($usuario);
        return true;
    }
}
