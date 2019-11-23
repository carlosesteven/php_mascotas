<?php
    require_once "../vendor/autoload.php";

    $respuesta = array();

    if( $_POST 
        && $_POST["prop_id"]
        && $_POST["prop_nombre"]
        && $_POST["prop_telefono"]
        && $_POST["prop_direccion"]
    )
    {

        $cliente = new MongoDB\Client("mongodb+srv://csc:8426803156229492@cluster0-5fixw.gcp.mongodb.net/test?retryWrites=true&w=majority");

        $collection = $cliente->mascotas->propietarios;

        $cursor = $collection->findOne( 
            [
                'prop_id' => $_POST["prop_id"]
            ] 
        );

        if( $cursor === null )
        {
            $insertOneResult = $collection->insertOne([
                'prop_id' => $_POST["prop_id"],
                'prop_nombre' => $_POST["prop_nombre"],
                'prop_telefono' => $_POST["prop_telefono"],
                'prop_direccion' => $_POST["prop_direccion"]
            ]);

            $respuesta["estado"] = "ok";
            $respuesta["detalles"] = "Se registro el propietario correctamente.";
        
        }else{
            $respuesta["estado"] = "error";
            $respuesta["detalles"] = "Ya se encuentra registrado el propietario.";
        }

    }else{
        $respuesta["estado"] = "error";
        $respuesta["detalles"] = "Faltan Parametros en la peticion.";
    }

    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES );