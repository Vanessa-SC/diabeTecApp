<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Medicamento;

class MedicamentoController extends Controller
{
    //,unidades,medicamento,hora,fecha,recordatorio,notas,idUsuario
    public function agregarM($dosis,$descripcion,$hora,$fecha,$recordatorio,$notas,$idUsuario){
        try{
            $notas = "recordatorio: "+$recordatorio+", notas: "+$nota;

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
}
