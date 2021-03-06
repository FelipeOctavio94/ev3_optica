<?php


namespace controllers;

use models\Receta as Receta;

require_once("../models/Receta.php");

class BusquedaArmazon
{

    public function __construct()
    {
    }

    public function buscar()
    {
        session_start();
        if (isset($_SESSION['user'])) {

            $model = new Receta();
            $arr = $model->getAllArmazones();
            if (count($arr)) {
                echo json_encode($arr);
            } else {
                $mensaje = ["msg" => "error"];
                echo json_encode($mensaje);
            }
        } else {

            $mensaje = ["msg" => "No tienes permiso para estar aquí"];
            echo json_encode($mensaje);
        }
    }
}

$obj = new BusquedaArmazon();
$obj->buscar();
