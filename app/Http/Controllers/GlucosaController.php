<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Glucosa;
use DB;

class GlucosaController extends Controller
{
    //,glucosa,hora,fecha,periodo,actividad,medicacion,recordatorio,notas,idUsuario
    public function agregarG($glucosa,$hora1,$fecha1,$periodo,$actividad,$medicacion,$recordatorio,$nota,$idUsuario){
        try{
            $oldFecha = substr($fecha1, 0, -6);
            $fecha = date('Y-m-d', strtotime($oldFecha));
            $oldHora = substr($hora1, 0, -6);
            $hora = date('h:i A', strtotime($oldHora));

            $notas = "periodo: ".$periodo.", actividad: ".$actividad.", medicacion: ".$medicacion.", recordatorio: ".$recordatorio.", adicional: ".$nota;

            $glucosa = Glucosa::insert(['toma'=>$glucosa,'hora'=>$hora,'fecha'=>$fecha,'nota'=>$notas,'idUsuario'=>$idUsuario]);

            if($glucosa == 1){
                $arr = array('resultado' => "agregada");
                echo json_encode($arr);
            } else {
                $arr = array('resultado' => "no agregada");
                echo json_encode($arr);
            }

        } catch(\Illuminate\Database\QueryException $e){
            $errorCore = $e->getMessage();
            $arr = array('resultado' => $errorCore);
            echo json_encode($arr);
        }
    }

    public function ultimaGlucosa($idUsuario){
        try{
            $ultimaG = Glucosa::select("toma as ultima")->where('idUsuario','=',$idUsuario)->orderBy('idGlucosa', 'desc')->first();
            
            echo $ultimaG;
        } catch(\Illuminate\Database\QueryException $e){
            $errorCore = $e->getMessage();
            $arr = array('resultado' => $errorCore);
            echo json_encode($arr);
        }
    }

    public function glucosaPromedio($idUsuario){
        try{
            $promedio = DB::table('glucosa')
            ->where('idUsuario','=',$idUsuario)
            ->avg('toma');
            $arr = array('promedio' => $promedio);
            echo json_encode($arr);
           // echo $promedio;
        } catch(\Illuminate\Database\QueryException $e){
            $errorCore = $e->getMessage();
            $arr = array('resultado' => $errorCore);
            echo json_encode($arr);
        }
    }
    
    public function glucosaAvgUlt($idUsuario){
        try{
            $promedio = DB::table('glucosa')
            ->where('idUsuario','=',$idUsuario)
            ->avg('toma');
            $prom = round($promedio);
            $ultima = DB::table('glucosa')
            ->select('toma as ultima')
            ->where('idUsuario','=',$idUsuario)
            ->orderBy('idGlucosa', 'desc')
            ->pluck('ultima')
            ->first();

            if($ultima==null){$ultima=="0";}

            $arr = array('promedio' => $prom,'ultima' => $ultima);
            echo json_encode($arr);
           // echo $promedio;
        } catch(\Illuminate\Database\QueryException $e){
            $errorCore = $e->getMessage();
            $arr = array('resultado' => $errorCore);
            echo json_encode($arr);
        }
    }

    public function mostrarG($idUsuario){
        try{
            $glucosas = Glucosa::where('idUsuario','=',$idUsuario)->get();
            echo $glucosas;
        } catch(\Illuminate\Database\QueryException $e){
            $errorCore = $e->getMessage();
            $arr = array('resultado' => $errorCore);
            echo json_encode($arr);
        }
    }

    public function eliminarG($idUsuario,$idGlucosa){
        try{
            $eliminar = DB::delete('delete from glucosa where idUsuario = ? and idGlucosa = ?', [$idUsuario,$idGlucosa]);
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

}
