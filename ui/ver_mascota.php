
<?php

require_once "../vendor/autoload.php";

$cliente = new MongoDB\Client("mongodb+srv://csc:8426803156229492@cluster0-5fixw.gcp.mongodb.net/test?retryWrites=true&w=majority");

    $collection = $cliente->mascotas->animales;

    $cursor = $collection->findOne( 
        [
            'animal_nombre' => $_GET["animal_nombre"]
        ] 
    );

    //print_r($cursor);

    ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Tienda Mascotas - Registrar Mascota</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Fontawesome CSS -->
    <script src="https://kit.fontawesome.com/6ae8224d69.js" crossorigin="anonymous"></script>
    <!-- sweetalert JS -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      #url_home{
        text-decoration: none; color: black;
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.3/examples/product/product.css" rel="stylesheet">
</head>
<body>
    <nav class="site-header sticky-top py-1">
        <div class="container d-flex flex-column flex-md-row justify-content-between">
            <a class="py-2" href="#">
                <i class="fas fa-2x fa-paw"></i>
            </a>
            <a class="py-2 d-none d-md-inline-block" href="lista_juegos.php">Juegos</a>
            <a class="py-2 d-none d-md-inline-block" href="listar_materiales.php">Materiales</a>
            <a class="py-2 d-none d-md-inline-block" href="lista_mascotas.php">Mascotas</a>
            <a class="py-2 d-none d-md-inline-block" href="lista_propietarios.php">Propietarios</a>    
        </div>
    </nav>

    <section class="jumbotron text-center">
        <div class="container">
        <h1 class="jumbotron-heading">Ver Mascota</h1>
        </div>
    </section>

    <div class="container">
            <form method="post" onsubmit="registrarMascota(event)" autocomplete="off">
                <div class="text-center">
                    <h3>
                        Registrar Mascota
                    </h3>
                </div>
                <div class="mt-3">
                    <input 
                        type="text"
                        class="form-control"
                        name="animal_nombre" 
                        id="animal_nombre" 
                        placeholder="Nombre de la mascota"
                        value="<?php echo $cursor["animal_nombre"] ?>"
                        required
                        />
                </div>
                <div class="mt-3">
                    <input 
                        type="date"
                        class="form-control"
                        name="animal_fecha" 
                        id="animal_fecha" 
                        value="<?php echo $cursor["animal_fecha"] ?>"
                        placeholder="Fecha Nacimiento"
                        required
                        />
                </div>
                <div class="mt-3">
                    <input 
                        type="text"
                        class="form-control"
                        name="animal_raza" 
                        id="animal_raza" 
                        placeholder="Raza de animal"
                        value="<?php echo $cursor["animal_raza"] ?>"
                        required
                        />
                </div>  
                <div class="mt-3">
                    <select 
                            class="form-control"
                            name="animal_tipo" 
                            id="animal_tipo" 
                            required
                        >
                            <option value="">Tipo Animal</option>
                            <option value="perro" select>Perro</option>
                            <option value="gato">Gato</option>
                            <option value="pajaro">Pajaro</option>
                            <option value="lagarto">Lagarto</option>
                            <option value="pescado">Pescado</option>
                            <option value="mono">Mono</option>
                            <option value="otro">Otro</option>
                    </select>
                </div>          
                
            </form>
        </div>
    
        <script src="../js/funciones.js"></script>
    
        <script src="../js/funciones.js"></script>

    <footer class="container py-5">
        <div class="row">
            <div class="col-12 col-md ">
                <i class="fas fa-1x fa-paw"></i>
                <span class="text-muted" style="margin-left: 10px;">&copy; Tienda Animales - 2019</span>
            </div>
            <div class="col-6 col-md">
            
            </div>
        </div>
    </footer>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>