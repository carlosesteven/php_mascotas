<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Lista Materiales</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../css/main.css'>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/6ae8224d69.js" crossorigin="anonymous"></script>
    <!-- sweetalert JS -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
    
    <div class="container mt-1">
        <div class="text-center">
            <h2>
                <b>
                    Lista Materiales
                </b>
            </h2>
        </div>
        <div class="text-right">
            <a 
                class="btn btn-success"
                href="#"
                onclick="crearMaterialMenu()"
            >
                Nuevo Material
            </a>
        </div>
        <div class="row text-center mt-3">
            <?php
                require_once("../api/lista_materiales_ui.php")
            ?>                    
        </div>
    </div>

    <script>
        function crearMaterialMenu()
        {
            swal("¿ Qué tipo de materia desea crear ?", {
            buttons: {
                metal: {
                    text: "Metal",
                    value: "metal",
                },
                madera: {
                    text: "Madera",
                    value: "madera",
                },
                tela: {
                    text: "Tela",
                    value: "tela",
                }
            },
            })
            .then((value) => {
                switch (value) {
                
                    case "metal":
                        window.location.assign("crear_m_metal.html");
                    break;
                
                    case "madera":
                        window.location.assign("crear_m_madera.html");
                    break;
                
                    case "tela":
                        window.location.assign("crear_m_tela.html");
                    break;
                }
            });
        }
    </script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>