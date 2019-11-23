<?php

    require_once "../vendor/autoload.php";

    $cliente = new MongoDB\Client("mongodb+srv://csc:8426803156229492@cluster0-5fixw.gcp.mongodb.net/test?retryWrites=true&w=majority");

    $collection = $cliente->mascotas->propietarios;

    $cursor = $collection->find();

    foreach ( $cursor as $id => $value )
    {       
        echo '
            <div class="col-sm-4 mt-2">
                <div class="card">                    
                    <div class="card-body">
                        <div class="text-center">
                            <i class="fas fa-7x fa-address-card"></i>
                        </div>
                        <div class="row text-left">
                            <div class="col-sm-12 mt-3">
                                <b>Cedula: </b>
                                '.$value["prop_id"].'
                            </div>
                            <div class="col-sm-12 mt-3">
                                <b>Nombre: </b>
                                '.$value["prop_nombre"].'
                            </div>
                            <div class="col-sm-12 mt-3">
                                <b>Telefono: </b>
                                '.$value["prop_telefono"].'
                            </div>
                            <div class="col-sm-12 mt-3">
                                <b>Direccion: </b>
                                '.$value["prop_direccion"].'
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            ';
    }