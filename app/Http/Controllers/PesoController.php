<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Peso;
use DB;


class PesoController extends Controller
{
    //peso,hora,fecha,notas,,idUsuario
    public function agregarP($peso,$hora1,$fecha1,$notas,$idUsuario){
        try{
            $oldFecha = substr($fecha1, 0, -6);
            $fecha = date('d/m/Y', strtotime($oldFecha));
            $oldHora = substr($hora1, 0, -6);
            $hora = date('h:i A', strtotime($oldHora));
            
            $Peso = Peso::insert(['peso'=>$peso,'hora'=>$hora,'fecha'=>$fecha,'nota'=>$notas,'idUsuario'=>$idUsuario]);
            if($Peso == 1){
                $arr = array('resultado' => "insertado");
                echo json_encode($arr);
            } else {
                $arr = array('resultado' => "no insertado");
                echo json_encode($arr);
            }

        } catch(\Illuminate\Database\QueryException $e){
            $errorCore = $e->getMessage();
            $arr = array('resultado' => $errorCore);
            echo json_encode($arr);
        }
    }

    public function mostrarP($idUsuario){
        try{
            $pesos = Peso::where('idUsuario','=',$idUsuario)->get();
            echo $pesos;
        } catch(\Illuminate\Database\QueryException $e){
            $errorCore = $e->getMessage();
            $arr = array('resultado' => $errorCore);
            echo json_encode($arr);
        }
    }

    public function mostrarPEst($idUsuario){
        try{
            
            $promedio = DB::table('peso')
            ->where('idUsuario','=',$idUsuario)
            ->avg('peso');

            $prom = round($promedio);

            $max = DB::table('peso')
            ->where('idUsuario','=',$idUsuario)
            ->max('peso');

            $min = DB::table('peso')
            ->where('idUsuario','=',$idUsuario)
            ->min('peso');

            if($promedio == null){ $promedio = 0;}
            if($max == null){ $max = 0;}
            if($min == null){ $min = 0;}

            $arr = array('pesoProm' => $prom,'pesoMax' => $max,'pesoMin'=>$min);
            echo json_encode($arr);
        } catch(\Illuminate\Database\QueryException $e){
            $errorCore = $e->getMessage();
            $arr = array('resultado' => $errorCore);
            echo json_encode($arr);
        }
    }

    public function ultimoP($idUsuario){
        try{
            $pesos = Peso::where('idUsuario','=',$idUsuario)
            ->OrderBy('idUsuario', 'DESC')
            ->first();
            echo $pesos;
        } catch(\Illuminate\Database\QueryException $e){
            $errorCore = $e->getMessage();
            $arr = array('resultado' => $errorCore);
            echo json_encode($arr);
        }
    }

    public function eliminarP($idUsuario,$idPeso){
        try{
            $eliminar = DB::delete('delete from peso where idUsuario = ? and idPeso = ?', [$idUsuario,$idPeso]);
            if($eliminar == 1){
                $arr = array('resultado' => "eliminado");
                echo json_encode($arr);
            } else {
                $arr = array('resultado' => "no eliminado");
                echo json_encode($arr);
            }
        } catch(\Illuminate\Database\QueryException $e){
            $errorCore = $e->getMessage();
            $arr = array('resultado' => $errorCore);
            echo json_encode($arr);
        }
    }

    public function updateP($peso,$hora1,$fecha1,$nota,$idUsuario,$idPeso){
        try{
            $oldHora = substr($hora1, 0, -6);
            $hora = date('h:i A', strtotime($oldHora));
            $oldfecha = substr($fecha1, 0, -6);
            $fecha = date('h:i A', strtotime($oldfecha));

            DB::update('update peso set peso = ? , hora = ?, fecha = ?, nota = ? where idUsuario = ? and idPeso = ?', [$peso,$hora,$fecha,$nota,$idUsuario,$idPeso]);

            $Peso = Peso::find($idPeso);
            //echo ($Peso);

           if (empty($Peso)){
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
