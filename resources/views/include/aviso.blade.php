<div class="row" id="contenedorAvisos"> </div>
<script type="text/javascript">
    function traerActivos() {
        $.ajax({
            url: '/avisos/activos', // Cambia esta ruta según tu controlador
            type: 'GET',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            success: function (response) {
                /* console.log(response) */
                const contenedorAvisos = document.getElementById('contenedorAvisos');
                contenedorAvisos.innerHTML = ''; // Limpiar contenido anterior

                // Iterar sobre los datos y agregar elementos al contenedor
                response.forEach((item) => {
                    const avisoDiv = document.createElement('div');
                    if(item.tipo == "Normal"){avisoDiv.className = 'alert alert-label-success text-center';}
                    if(item.tipo == "Media"){avisoDiv.className = 'alert alert-label-warning text-center';}
                    if(item.tipo == "Alta"){avisoDiv.className = 'alert alert-label-danger text-center';}

                    avisoDiv.innerHTML = `<b>${item.titulo}</b> / ${item.mensaje}`;
                    contenedorAvisos.appendChild(avisoDiv);
                });
            },
            error: function (xhr) {
                alert('Hubo un error al obtener los datos.');
            },
        });
    }

    setTimeout(() => { traerActivos(); }, 1000);



</script>
