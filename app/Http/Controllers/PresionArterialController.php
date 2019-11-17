<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PresionArterial;

class PresionArterialController extends Controller
{
    //,sistolica,diastolica,pulso,fecha,hora,recordatorio,notas,,idUsuario
    public function agregarPA($sistolica,$diastolica,$pulso,$fecha1,$hora1,$recordatorio,$nota,$idUsuario){
        try{
            $oldFecha = substr($fecha1, 0, -6);
            $fecha = date('Y-m-d', strtotime($oldFecha));
            $oldHora = substr($hora1, 0, -6);
            $hora = date('h:i A', strtotime($oldHora));
            
            $notas = "recordatorio: ".$recordatorio.", notas: ".$nota;

            $PresionArterial = PresionArterial::insert(['sistolica'=>$sistolica,'diastolica'=>$diastolica,'pulso'=>$pulso,'fecha'=>$fecha,'hora'=>$hora,'nota'=>$notas,'idUsuario'=>$idUsuario]);

            if($PresionArterial == 1){
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

}
