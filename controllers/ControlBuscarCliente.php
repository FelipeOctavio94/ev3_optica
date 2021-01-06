<?php

namespace controllers;

use models\Cliente as Cliente;

require_once("../models/Cliente.php");

class BusquedaCliente{
    public $rut;

    public function __construct()
    {
        $this->rut    = $_POST['rutCliente'];
    }

    public function buscar(){

        if ($this->rut == "") {
            $mensaje = ["msg"=>"Ingrese rut del cliente"];
            echo json_encode($mensaje);
            return;
        }

        $model = new Cliente();
        $arreglo = $model-> BuscarCliente($this->rut);
        

        if (count($arreglo)) {
            $arr = $arreglo[0];
            $arr["msg"] = "Cliente encontrado";
            echo json_encode($arr); 

        } else {
            $mensaje = ["msg"=>"Cliente no existe"];
            echo json_encode($mensaje);
        }
        
    }

}

$obj = new BusquedaCliente();
$obj->buscar();