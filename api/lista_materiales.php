<?php
    require_once "../vendor/autoload.php";

    $respuesta = array();

    $cliente = new MongoDB\Client("mongodb+srv://csc:8426803156229492@cluster0-5fixw.gcp.mongodb.net/test?retryWrites=true&w=majority");

    $collection = $cliente->mascotas->materiales;

    $cursor = $collection->find();

    foreach ( $cursor as $id => $value )
    {       
        $respuesta[ ] = $value;
    }

    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES );