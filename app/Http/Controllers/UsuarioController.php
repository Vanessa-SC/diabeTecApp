<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;

class UsuarioController extends Controller
{
    public function login($contra, $email){
        try{
           $uc = new UsuarioController;
            $correoExiste = $uc->comprobarCorreo($email);
                $usuario = Usuario::where('contrasena','=',$contra)->where('email','=',$email)->first();
                if(empty($usuario)){
                    if($correoExiste){
                        $arr = array('idUsuario'=> -2);
                        echo json_encode($arr);
                    } else {
                        $arr = array('idUsuario'=> 0);
                        echo json_encode($arr);
                    }
                } else {
                    echo $usuario;
                }
        } catch(\Illuminate\Database\QueryException $e){
            $errorCore = $e->getMessage();
            $arr = array('estado' => $errorCore);
            echo json_encode($arr);
        }
    }

    public function correoExiste($correo){
        $email = Usuario::select('email')->where('email','=',$correo)->first();
        if($email != null){
            return true;
        }
    }

    public function comprobarCorreo($correo){
        $ucont = new UsuarioController;
        if( $ucont->correoExiste($correo)){
            return true;
        } 
    }

}
