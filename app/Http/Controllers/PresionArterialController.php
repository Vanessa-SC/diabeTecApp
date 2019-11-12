<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PresionArterial;

class PresionArterialController extends Controller
{
    //,sistolica,diastolica,pulso,fecha,hora,recordatorio,notas
    public function agregarPA($sistolica,$diastolica,$pulso,$fecha,$hora,$recordatorio,$nota){
        try{
            $notas = "recordatorio: "+$recordatorio+", notas: "+$nota;

            $PresionArterial = PresionArterial::insert([$sistolica,$diastolica,$pulso,$fecha,$hora,$recordatorio,$nota]);

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
