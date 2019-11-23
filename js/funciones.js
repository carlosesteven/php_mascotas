        var arrayMateriales = [];
        var arraySeleccionados = [];

        function listaMateriales()
        {
            arrayMateriales = [];
            var url = "../api/lista_materiales.php";
            var container = document.getElementById("lista_materiales");
            container.innerHTML = "Cargando Lista Materiales";
            var contador = 0;
            fetch(url, {
                method: 'post',                               
            }).then(res => res.json() )
            .catch(error => console.error('Error:', error))
            .then(response => {         
                container.innerHTML = "";                      
                response.forEach(element => {
                    arrayMateriales[ contador ] = JSON.stringify( element );
                    var html = '<div class="form-control mt-2"><input class="materiales" name="materiales[]" type="checkbox" id="m_'+ element.id +'" value="'+ element.id +'" /> <label for="m_'+ element.id +'">'+ element.material +'</label></div>';
                    container.insertAdjacentHTML('beforeend', html );
                    contador++;
                });
                console.log( "Cantidad: " + arrayMateriales.length );
                console.log( "Datos: " + arrayMateriales );
            });
            
        }

        function registrarJuego( evt )
        {
            evt.preventDefault();

            arraySeleccionados = [];
            
            var url = '../api/agregar_juego.php'; 

            var data = new FormData();
            data.append( "juego_materiales", "{}" );
            data.append( "juego_foto", document.getElementById("juego_foto").files[ 0 ] );
            data.append( "alto", document.getElementById("alto").value );
            data.append( "ancho", document.getElementById("ancho").value );
            data.append( "profundidad", document.getElementById("profundidad").value );
            data.append( "nombre_juego", document.getElementById("nombre_juego").value );
            var inputElements = document.getElementsByClassName('materiales');
            for(var i=0; inputElements[i]; ++i){
                if(inputElements[i].checked){
                    arraySeleccionados.push( arrayMateriales[ i ] );
                }
            }
            data.append( "juego_materiales", JSON.stringify( arraySeleccionados ));           

            fetch(url, {
                method: 'post',
                body: data, 
                
            }).then(res => res.json() )
            .catch(error => console.error('Error:', error))
            .then(response => {               
                if( response.estado === "ok" )
                {
                    swal("", response.detalles, "success");
                }else{
                    swal("", response.detalles, "error");
                }                
            });
            
        }

        function registrarMascota( evt )
        {
            evt.preventDefault();

            var url = '../api/agregar_mascota.php';            

            var data = new FormData();
            data.append( "animal_nombre", document.getElementById("animal_nombre").value );
            data.append( "animal_fecha", document.getElementById("animal_fecha").value );
            data.append( "animal_raza", document.getElementById("animal_raza").value );
            data.append( "animal_tipo", document.getElementById("animal_tipo").value );

            fetch(url, {
                method: 'post',
                body: data, 
                
            }).then(res => res.json() )
            .catch(error => console.error('Error:', error))
            .then(response => {               
                if( response.estado === "ok" )
                {
                    swal("", response.detalles, "success");
                }else{
                    swal("", response.detalles, "error");
                }                
            });
            
        }

        function registrarPropietario( evt )
        {
            evt.preventDefault();

            var url = '../api/agregar_propietario.php';            

            var data = new FormData();
            data.append( "prop_id", document.getElementById("propietario_id").value );
            data.append( "prop_nombre", document.getElementById("propietario_nombre").value );
            data.append( "prop_telefono", document.getElementById("propietario_telefono").value );
            data.append( "prop_direccion", document.getElementById("propietario_direccion").value );

            fetch(url, {
                method: 'post',
                body: data, 
                
            }).then(res => res.json() )
            .catch(error => console.error('Error:', error))
            .then(response => {               
                if( response.estado === "ok" )
                {
                    swal("", response.detalles, "success");
                }else{
                    swal("", response.detalles, "error");
                }                
            });
            
        }

        function registrarMadera( evt )
        {
            evt.preventDefault();

            var url = '../api/agregar_material_madera.php';            

            var data = new FormData();
            data.append( "material", document.getElementById("material").value );
            data.append( "humedad_res", document.getElementById("humedad_res").value );
            data.append( "tipo_madera", document.getElementById("tipo_madera").value );
            data.append( "tipo_densidad", document.getElementById("tipo_densidad").value );
            data.append( "alto", document.getElementById("alto").value );
            data.append( "ancho", document.getElementById("ancho").value );
            data.append( "profundidad", document.getElementById("profundidad").value );
            data.append( "color", document.getElementById("color").value );

            fetch(url, {
                method: 'post',
                body: data, 
                
            }).then(res => res.json() )
            .catch(error => console.error('Error:', error))
            .then(response => {               
                if( response.estado === "ok" )
                {
                    swal("", response.detalles, "success");
                }else{
                    swal("", response.detalles, "error");
                }                
            });
            
        }

        function registrarMetal( evt )
        {
            evt.preventDefault();

            var url = '../api/agregar_material_metal.php';            

            var data = new FormData();
            data.append( "material", document.getElementById("material").value );
            data.append( "toxico", document.getElementById("toxico").value );
            data.append( "magnetico", document.getElementById("magnetico").value );
            data.append( "corrosivo", document.getElementById("corrosivo").value );
            data.append( "alto", document.getElementById("alto").value );
            data.append( "ancho", document.getElementById("ancho").value );
            data.append( "profundidad", document.getElementById("profundidad").value );
            data.append( "conductividad", document.getElementById("conductividad").value );
            data.append( "color", document.getElementById("color").value );

            fetch(url, {
                method: 'post',
                body: data, 
                
            }).then(res => res.json() )
            .catch(error => console.error('Error:', error))
            .then(response => {               
                if( response.estado === "ok" )
                {
                    swal("", response.detalles, "success");
                }else{
                    swal("", response.detalles, "error");
                }                
            });
            
        }

        function registrarTela( evt )
        {
            evt.preventDefault();

            var url = '../api/agregar_material_tela.php';            

            var data = new FormData();
            data.append( "material", document.getElementById("material").value );
            data.append( "tipo_tela", document.getElementById("tipo_tela").value );
            data.append( "absorbente", document.getElementById("absorbente").value );
            data.append( "comodo", document.getElementById("comodo").value );
            data.append( "tipo_lavado", document.getElementById("tipo_lavado").value );
            data.append( "alto", document.getElementById("alto").value );
            data.append( "ancho", document.getElementById("ancho").value );
            data.append( "profundidad", document.getElementById("profundidad").value );
            data.append( "color", document.getElementById("color").value );

            fetch(url, {
                method: 'post',
                body: data, 
                
            }).then(res => res.json() )
            .catch(error => console.error('Error:', error))
            .then(response => {               
                if( response.estado === "ok" )
                {
                    swal("", response.detalles, "success");
                }else{
                    swal("", response.detalles, "error");
                }                
            });
            
        }