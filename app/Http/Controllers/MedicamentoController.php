<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Medicamento;
use DB;

class MedicamentoController extends Controller
{
    //,unidades,medicamento,hora,fecha,recordatorio,notas,idUsuario
    public function agregarM($dosis,$descripcion,$hora1,$fecha1,$recordatorio,$nota,$idUsuario){
        try{

            $oldFecha = substr($fecha1, 0, -6);
            $fecha = date('Y-m-d', strtotime($oldFecha));
            $oldHora = substr($hora1, 0, -6);
            $hora = date('h:i A', strtotime($oldHora));
            
            $notas = "recordatorio: ".$recordatorio.", notas: ".$nota;

            $medicamento = Medicamento::insert(['dosis'=>$dosis,'descripcion'=>$descripcion,'hora'=>$hora,'fecha'=>$fecha,'nota'=>$notas,'idUsuario'=>$idUsuario]);

            if($medicamento == 1){
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

    public function mostrarM($idUsuario){
        try{
            $medicamentos = Medicamento::where('idUsuario','=',$idUsuario)->get();
            echo $medicamentos;
        } catch(\Illuminate\Database\QueryException $e){
            $errorCore = $e->getMessage();
            $arr = array('resultado' => $errorCore);
            echo json_encode($arr);
        }
    }

    /*
    $promedio = DB::table('glucosa')
            ->where('idUsuario','=',$idUsuario)
            ->avg('toma');
            $ultima = DB::table('glucosa')
            ->select('toma as ultima')
            ->where('idUsuario','=',$idUsuario)
            ->orderBy('idGlucosa', 'desc')
            ->pluck('ultima')
            ->first();
            
    */
    public function fecha(){
        $oldFecha = substr('2019-11-13T17:56:39.065-06:00', 0, -6);
        $fecha = date('Y-m-d', strtotime($oldFecha));
        echo $fecha;
        $oldHora = substr('2019-11-13T17:56:39.065-06:00', 0, -6);
        $hora = date('h:i A', strtotime($oldHora));
        echo $hora;
    }

}
