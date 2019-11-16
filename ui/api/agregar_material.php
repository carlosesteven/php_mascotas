<?php
    require_once "../../vendor/autoload.php";

    $respuesta = array();

    if( $_POST 
        && $_POST["material_nombre"]
    )
    {

        $cliente = new MongoDB\Client("mongodb+srv://csc:8426803156229492@cluster0-5fixw.gcp.mongodb.net/test?retryWrites=true&w=majority");

        $collection = $cliente->mascotas->materiales;

        $cursor = $collection->findOne( 
            [
                'material_nombre' => $_POST["material_nombre"]
            ] 
        );

        if( $cursor === null )
        {
            $insertOneResult = $collection->insertOne([
                'material_id' => ( count( $collection->find()->toArray() ) + 1 ),
                'material_nombre' => $_POST["material_nombre"],
                'material_dim_alto' => $_POST["material_dim_alto"],
                'material_dim_ancho' => $_POST["material_dim_alto"],
                'material_tipo' => $_POST["material_dim_alto"],
            ]);

            $respuesta["estado"] = "ok";
            $respuesta["detalles"] = "Se registro el material correctamente.";
        
        }else{
            $respuesta["estado"] = "error";
            $respuesta["detalles"] = "Ya se encuentra registrado el material.";            
        }

    }else{
        $respuesta["estado"] = "error";
        $respuesta["detalles"] = "Faltan Parametros en la peticion.";
        $respuesta["peticion"] = $_POST;
    }

    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES );