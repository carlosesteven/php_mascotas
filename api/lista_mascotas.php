<?php

    require_once "../vendor/autoload.php";

    $cliente = new MongoDB\Client("mongodb+srv://csc:8426803156229492@cluster0-5fixw.gcp.mongodb.net/test?retryWrites=true&w=majority");

    $collection = $cliente->mascotas->animales;

    $cursor = $collection->find();

    foreach ( $cursor as $id => $value )
    {      
        $icono = ""; 
        switch($value["animal_tipo"])
        {
            case "perro":
                $icono = "dog";
            break;
            case "gato":
                $icono = "cat";
            break;
            case "pajaro":
                $icono = "crow";
            break;
            case "lagarto":
                $icono = "otter";
            break;
            case "pescado":
                $icono = "fish";
            break;
            case "mono":
                $icono = "monkey";
            break;
            default:
                $icono = "paw";
            break;
        }
        echo '
            <div class="col-sm-4 mt-2">
                <div class="card">                    
                    <div class="card-body">
                        <div class="text-center">
                            <i class="fas fa-7x fa-'.$icono.'"></i>
                        </div>
                        <div class="row text-left">
                            <div class="col-sm-12 mt-3">
                                <b>id: </b>
                                '.$value["animal_id"].'
                            </div>
                            <div class="col-sm-12 mt-3">
                                <b>Nombre: </b>
                                '.$value["animal_nombre"].'
                            </div>
                            <div class="col-sm-12 mt-3">
                                <b>Nacimiento: </b>
                                '.$value["animal_fecha"].'
                            </div>
                            <div class="col-sm-12 mt-3">
                                <b>Raza: </b>
                                '.$value["animal_raza"].'
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            ';
    }