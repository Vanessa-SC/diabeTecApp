<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use DB;

class UsuarioController extends Controller
{
    public function login($email, $contra){
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

    public function registrar($nombre,$telefono,$email,$contra,$sexo,$tipoDiab,$fechaNac){
        try{
            $oldFecha = substr($fechaNac, 0, -6);
            $fecha = date('Y-m-d', strtotime($oldFecha));
            $buscar = Usuario::where('email', $email)->first();
            //nombre'telefono'email'contrasena'sexo''tipoDiabetes'fecha_nac');
            if($buscar == null){
                $usuario = Usuario::insert(['nombre'=>$nombre, 'telefono'=>$telefono,'email'=>$email,'contrasena'=>$contra,'sexo'=>$sexo,'tipoDiabetes'=>$tipoDiab,'fecha_nac'=>$fecha,'estatus'=>'1']);
                if($usuario == 1){
                    $arr = array('resultado' => "insertado");
                    echo json_encode($arr);
                } else {
                    $arr = array('resultado' => "no insertado");
                    echo json_encode($arr);
                }
            } else {
                    $arr = array('resultado' => 'Correo ya existe');
                    echo json_encode($arr);
                }

        } catch(\Illuminate\Database\QueryException $e){
            $errorCore = $e->getMessage();
            $arr = array('estado' => $errorCore);
            echo json_encode($arr);
        }
    }

    public function perfil($idUsuario){
        try{
            $usuario = Usuario::where('idUsuario',$idUsuario)->first();
            echo $usuario;
        } catch(\Illuminate\Database\QueryException $e){
            $errorCore = $e->getMessage();
            $arr = array('estado' => $errorCore);
            echo json_encode($arr);
        }
    }
    
    public function desactivarCuenta($email){
        try {
                $update = DB::table('usuario')
                ->where('email', $email)
                ->update(['estatus' => -1]);
                if($update == 0){
                    $arr = array('email'=> 'no desactivado');
                    echo json_encode($arr);
                } else {
                    $arr = array('email'=> $email);
                    echo json_encode($arr);
                }

        }catch(\Illuminate\Database\QueryException $e){
            $errorCore = $e->getMessage();
            $arr = array('estado' => $errorCore);
            echo json_encode($arr);
        }
    }

    public function updateU($nombre,$telefono,$sexo,$tipoDiabetes,$estatura,$idUsuario){
        try{
            $usuario = Usuarios::find($idUsuario);
            
            $usuario->nombre = $nombre;
            $usuario->telefono = $telefono;
            $usuario->sexo = $sexo;
            $usuario->tipoDiabetes = $tipoDiabetes;
            $usuario->estatura = $estatura;
            $usuario->nombre = $nombre;
            $usuario->save();
            //echo $usuario;

           if (empty($usuario)){
                $arr = array('resultado'=>'error');
                echo json_encode($arr);
            } else {
                $arr = array('resultado' => 'actualizado');
                 echo json_encode($arr);
            }

        } catch(\Illuminate\Database\QueryException $e){
            $errorCore = $e->getMessage();
            $arr = array('estado' => $errorCore);
            echo json_encode($arr);
        }
    }

}
