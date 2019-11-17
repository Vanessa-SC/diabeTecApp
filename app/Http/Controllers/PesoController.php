<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Peso;

class PesoController extends Controller
{
    //peso,hora,fecha,notas,,idUsuario
    public function agregarP($peso,$hora1,$fecha1,$notas,$idUsuario){
        try{
            $oldFecha = substr($fecha1, 0, -6);
            $fecha = date('Y-m-d', strtotime($oldFecha));
            $oldHora = substr($hora1, 0, -6);
            $hora = date('h:i A', strtotime($oldHora));
            
            $Peso = Peso::insert(['peso'=>$peso,'hora'=>$hora,'fecha'=>$fecha,'notas'=>$notas,'idUsuario'=>$idUsuario]);
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

}
