<?php
    require_once "../vendor/autoload.php";

    $respuesta = array();

    if( $_POST 
        //&& $_POST["animal_id"]
        && $_POST["animal_nombre"]
        && $_POST["animal_fecha"]
        && $_POST["animal_raza"]
    )
    {

        $cliente = new MongoDB\Client("mongodb+srv://csc:8426803156229492@cluster0-5fixw.gcp.mongodb.net/test?retryWrites=true&w=majority");

        $collection = $cliente->mascotas->animales;

        $cursor = $collection->findOne( 
            [
                'animal_nombre' => $_POST["animal_nombre"]
            ] 
        );

        if( $cursor === null )
        {
            $insertOneResult = $collection->insertOne([
                'animal_id' => ( count( $collection->find()->toArray() ) + 1 ),
                'animal_nombre' => $_POST["animal_nombre"],
                'animal_fecha' => $_POST["animal_fecha"],
                'animal_raza' => $_POST["animal_raza"],
                'animal_tipo' => $_POST["animal_tipo"]
            ]);

            $respuesta["estado"] = "ok";
            $respuesta["detalles"] = "Se registro la mascota correctamente";
        
        }else{
            $respuesta["estado"] = "error";
            $respuesta["detalles"] = "Ya se encuentra registrado una mascota con el nombre: ".$_POST["animal_nombre"];
        }

    }else{
        $respuesta["estado"] = "error";
        $respuesta["detalles"] = "Faltan Parametros en la peticion.";
    }

    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES );
    
