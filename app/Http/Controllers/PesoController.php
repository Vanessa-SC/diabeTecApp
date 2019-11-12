<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Peso;

class PesoController extends Controller
{
    //peso,hora,fecha,notas
    public function agregarP($peso,$hora,$fecha,$notas){
        try{
            $Peso = Peso::insert(['peso'=>$peso,'hora'=>$hora,'fecha'=>$fecha,'notas'=>$notas]);
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

}
