<?php
    require_once "../../vendor/autoload.php";

    $respuesta = array();

    if( $_POST 
        && $_POST["juego_materiales"]
        && $_FILES        
    )
    {

        $file_name = $_FILES['juego_foto']['name'];
        $file_path = $_FILES['juego_foto']['tmp_name'];
        
        $extencion = explode(".", $file_name)[ 1 ];
        $nombre_temporal = uniqid() . "." . $extencion;  

        $cliente = new MongoDB\Client("mongodb+srv://csc:8426803156229492@cluster0-5fixw.gcp.mongodb.net/test?retryWrites=true&w=majority");

        $collection = $cliente->mascotas->juegos;

        $insertOneResult = $collection->insertOne([
            'juego_id' => ( count( $collection->find()->toArray() ) + 1 ),
            'juego_materiales' => $_POST["juego_materiales"],
            'juego_foto' => $nombre_temporal,
        ]);

        if(move_uploaded_file($file_path, "planos/" . $nombre_temporal ))
        {
            $respuesta["estado"] = "ok";
            $respuesta["detalles"] = "Se registro el juego correctamente.";
        }else{
            $respuesta["estado"] = "error";
            $respuesta["detalles"] = "Error al guardar la imagen.";
        }
        

    }else{
        $respuesta["estado"] = "error";
        $respuesta["detalles"] = "Faltan Parametros en la peticion.";
    }

    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES );