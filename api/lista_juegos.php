<?php

    require_once "../vendor/autoload.php";

    $cliente = new MongoDB\Client("mongodb+srv://csc:8426803156229492@cluster0-5fixw.gcp.mongodb.net/test?retryWrites=true&w=majority");

    $collection = $cliente->mascotas->juegos;

    $cursor = $collection->find();

    foreach ( $cursor as $id => $value )
    {       
        echo '
            <div class="col-sm-4 mt-2">
                <div class="card">
                    <img class="card-img-top" src="../planos/'.$value["plano"].'" >
                    <div class="card-body">
                        <h5 class="card-title">'.$value["nombre_juego"].'</h5>
                        <div class="row">
                            <div class="col-sm-6">
                                <b>Ancho: </b>
                                '.$value["ancho"].' mts
                            </div>
                            <div class="col-sm-6">
                                <b>Alto: </b>
                                '.$value["alto"].' mts
                            </div>
                            <div class="col-sm-12 mt-3">
                                <b>Materiales: </b>
                                '.count($value["juego_materiales"]).'
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            ';
    }