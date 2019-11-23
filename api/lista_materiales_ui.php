<?php

    require_once "../vendor/autoload.php";

    $cliente = new MongoDB\Client("mongodb+srv://csc:8426803156229492@cluster0-5fixw.gcp.mongodb.net/test?retryWrites=true&w=majority");

    $collection = $cliente->mascotas->materiales;

    $cursor = $collection->find();

    foreach ( $cursor as $id => $value )
    {       
        echo '
            <div class="col-sm-4 mt-2">
                <div class="card">                    
                    <div class="card-body">
                        <div class="text-center">
                            <i class="fas fa-7x fa-vector-square"></i>
                        </div>
                        <div class="row text-left">
                            <div class="col-sm-12 mt-3">
                                <b>id: </b>
                                '.$value["id"].'
                            </div>
                            <div class="col-sm-12 mt-3">
                                <b>Nombre: </b>
                                '.$value["material"].'
                            </div>                           
                            <div class="col-sm-6 mt-3">
                                <b>Ancho: </b>
                                '.$value["ancho"].'
                            </div>      
                            <div class="col-sm-6 mt-3">
                                <b>Alto: </b>
                                '.$value["alto"].'
                            </div>      
                            <div class="col-sm-12 mt-3">
                                <b>Color: </b>
                                '.$value["color"].'
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            ';
    }