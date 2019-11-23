<?php

    require_once "../vendor/autoload.php";

    $cliente = new MongoDB\Client("mongodb+srv://csc:8426803156229492@cluster0-5fixw.gcp.mongodb.net/test?retryWrites=true&w=majority");

        $collection = $cliente->mascotas->animales;

        $cursor = $collection->findOne( 
            [
                'animal_nombre' => $_GET["animal_nombre"]
            ] 
        );

    echo "<pre>";
    print_r( $_GET);
    print_r( $cursor );
    var_dump( $cursor );