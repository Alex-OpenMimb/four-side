<?php

namespace App\Models\Seguridad;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Usuario extends Model
{

    protected $table = 'seg_usuario';

    protected $fillable = [
        'usuarioAlias',
        'usuarioFoto',
        'usuarioPassword',
        'usuarioNombre',
        'usuarioEmail',
        'usuarioConectado',
        'usuarioEstado',
        'usuarioUltimaConexión',
    ];

    //Usuarios de prueba
    public static $DATA = [
        [
            'usuarioNombre' => 'Alex Hurtado',
            'usuarioPassword' =>'AlexHurtado1047',
            'usuarioEmail' => 'alexhurtado@hot.com',
        ],
        [
            'usuarioNombre' => 'Juan Castro',
            'usuarioPassword' =>'JuanCastro897',
            'usuarioEmail' => 'juancastro@hot.com',
        ],
        [
            'usuarioNombre' => 'Andrea Lopez',
            'usuarioPassword' =>'#LopezAndrea$%',
            'usuarioEmail' => 'andrea@hot.com',
        ],
    ];

    protected $primaryKey = "idUsuario";
    public $timestamps = false;


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
        $row = Usuario::find($id);
        if ($row) {
            $row->save();
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function obtenerUsuario($usuarioAlias)
    {
        $usuario = $this->whereRaw("usuarioAlias = BINARY '" . $usuarioAlias . "'")->get()->first();
        return $usuario;
    }

    function guardarSesion($idUsuario)
    {
        $usuario = $this->find($idUsuario);
        $usuario->usuarioUltimaConexion = date('Y-m-d H:i:s');
        $usuario->save();
        return true;
    }
}
