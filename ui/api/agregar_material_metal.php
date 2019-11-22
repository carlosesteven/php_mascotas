<?php
    require_once "../../vendor/autoload.php";

    $respuesta = array();

    if( $_POST 
        && $_POST["material"]
    )
    {

        $cliente = new MongoDB\Client("mongodb+srv://csc:8426803156229492@cluster0-5fixw.gcp.mongodb.net/test?retryWrites=true&w=majority");

        $collection = $cliente->mascotas->materiales;

        $cursor = $collection->findOne( 
            [
                'material' => $_POST["material"]
            ] 
        );

        if( $cursor === null )
        {
            $insertOneResult = $collection->insertOne([
                'id' => ( count( $collection->find()->toArray() ) + 1 ),
                'material' => $_POST["material"],
                'toxico' => $_POST["toxico"],
                'magnetico' => $_POST["magnetico"],
                'corrosivo' => $_POST["corrosivo"],
                'alto' => $_POST["alto"],
                'ancho' => $_POST["ancho"],
                'profundidad' => $_POST["profundidad"],
                'conductividad' => $_POST["conductividad"],
                'color' => $_POST["color"],
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