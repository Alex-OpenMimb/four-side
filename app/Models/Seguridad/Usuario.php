<?php

namespace App\Models\Seguridad;

use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;


class Usuario extends Model
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

    public function desconectar($id)
    {
        $usuario = Usuario::find($id);
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
        $query->where('usuarioAlias',$userAlias )->select('idUsuario','usuarioEstado','usuarioPassword');
    }

    public function guardarSesion($id)
    {
        $usuario =  Usuario::find($id);
        $usuario->usuarioUltimaConexion = date('Y-m-d H:i:s');
        $usuario->usuarioConectado = 1;
        $usuario->save();
        session()->put('user', $usuario);
        return true;
    }
}
