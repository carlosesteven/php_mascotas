<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Tienda Mascotas - Lista Materiales</title>

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
        <h1 class="jumbotron-heading">Lista Juegos</h1>
        </div>
    </section>

    <div class="container-fluid">
        <div class="text-right">
            <a 
                class="btn btn-success"
                href="crear_juego.html"
                >
                    Nuevo Juego
            </a>
        </div>
        <div class="row text-center mt-3">
            <?php
                require_once("../api/lista_juegos.php")
            ?>                    
        </div>
    </div>

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