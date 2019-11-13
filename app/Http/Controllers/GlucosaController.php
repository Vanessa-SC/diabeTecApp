<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Glucosa;

class GlucosaController extends Controller
{
    //,glucosa,hora,fecha,periodo,actividad,medicacion,recordatorio,notas
    public function agregarG($glucosa,$hora,$fecha,$periodo,$actividad,$medicacion,$recordatorio,$nota,$idUsuario){
        try{
            
            //$notas = "periodo: "+$periodo+", actividad: "+$actividad+", medicacion: "+$medicacion+", recordatorio: "+$recordatorio+", adicional: "+$nota;

            $glucosa = Glucosa::insert(['toma'=>$glucosa,'hora'=>$hora,'fecha'=>$fecha,'nota'=>$nota,'idUsuario'=>$idUsuario]);

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
}
