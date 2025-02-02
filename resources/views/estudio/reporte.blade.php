@include('include.header')

<div id="layout-wrapper">

    {{-- menu --}}
    @include('include.menu')

    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-4"><input type="hidden" id="idEstudio" value="{{ $id }}"></div>
                            <div class="col-xl-4"><button class="btn btn-outline-success" style="width: 100%" onclick="print()">Imprimir </button></div>
                            <div class="col-xl-4"> <a href="/estudios"><button class="btn btn-outline-success" style="width: 100%" data-bs-toggle="modal" data-bs-target="#modal11">Regresar</button></a></div>
                        </div>
                    </div>
                </div>

                <hr>
                <div id="contenido" width="100%" height="100%">
                    {{-- portada --}}
                    <div class="card portlet border">
                        <div class="card-header" style="color: burlywood; background-color: lightblue;"></div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6"><h4>ESTUDIO SOCIO ECONÓMICO</h4></div>
                                <div class="col-md-6 d-flex justify-content-end"><img src="{{asset('backend/assets/images/logo.png')}}" style="height:50px"></div>
                            </div>
                            <hr>
                            <div class="row" id="General"></div>

                        </div>
                    </div>
                    {{-- datos generales --}}
                    <div class="card portlet border">
                        <div class="card-header" style=" background-color: lightblue;"><b>DATOS GENERALES</b></div>
                        <div class="card-body">

                            <div id="datos"> </div>

                        </div>
                    </div>
                    {{-- resumen --}}
                    <div class="card portlet border">
                        <div class="card-header" style=" background-color: lightblue;"><b>RESUMEN</b></div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-12 text-center"><b>ÁREAS VERIFICADAS</b> </div>
                            </div>
                            <hr>
                            <div class="row" id="resumenUno">

                            </div>

                        </div>
                    </div>
                    {{-- domicilio --}}
                    <div class="card portlet border">
                        <div class="card-header" style=" background-color: lightblue;"><b>DOMICILIO</b></div>
                        <div class="card-body">

                            <div class="row" id="domicilio">

                            </div>

                        </div>
                    </div>
                    {{-- REDES SOCIALES --}}
                    <div class="card portlet border">
                        <div class="card-header" style=" background-color: lightblue;"><b>REDES SOCIALES</b></div>
                        <div class="card-body">
                            <div class="row" id="redes">

                            </div>

                        </div>
                    </div>
                    {{-- NIVEL ACADEMICOS --}}
                    <div class="card portlet border">
                        <div class="card-header" style=" background-color: lightblue;"><b>NIVEL ACADÉMICO</b></div>
                        <div class="card-body">

                            <div class="row" id="nivelesAca">
                            </div>

                        </div>
                    </div>
                    {{-- deudas --}}
                    <div class="card portlet border">
                        <div class="card-header" style=" background-color: lightblue;"><b>DEUDAS</b></div>
                        <div class="card-body">

                            <div class="row" id="deudas">
                            </div>

                        </div>
                    </div>
                    {{-- conducta --}}
                    <div class="card portlet border">
                        <div class="card-header" style=" background-color: lightblue;"><b>CONDUCTA</b></div>
                        <div class="card-body">

                            <div class="row" id="conducta">
                            </div>

                        </div>
                    </div>
                    {{--situacion --}}
                    <div class="card portlet border">
                        <div class="card-header" style=" background-color: lightblue;"><b>SITUACIÓN</b></div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-xl-12">
                                    <table class="table-bordered" style="width: 100%" id="miTabla">
                                        <thead>
                                            <tr>
                                                <td><b>Nombre</b></td>
                                                <td><b>Parentesco</b></td>
                                                <td><b>Salario</b></td>
                                                <td><b>Ingreso</b></td>
                                                <td><b>Concepto</b></td>
                                                <td><b>Egresos</b></td>
                                                <td><b>Superávit</b></td>
                                                <td><b>Observaciones</b></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- estructura familiar --}}
                    <div class="card portlet border">
                        <div class="card-header" style=" background-color: lightblue;"><b>ESTRUCTURA FAMILIAR</b></div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-xl-12">
                                    <table class="table-bordered" style="width: 100%" id="miTablaEstruc">
                                        <tr>
                                            <td><b>Parentesco</b></td>
                                            <td><b>Edad</b></td>
                                            <td><b>Ocupación</b></td>
                                            <td><b>Labora/estudia</b></td>
                                            <td><b>Dirección</b></td>
                                            <td><b>Tiempo de residencia</b></td>
                                            <td><b>Teléfono</b></td>

                                        </tr>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>

                    {{-- entrono habitacional --}}
                    <div class="card portlet border">
                        <div class="card-header" style=" background-color: lightblue;"><b>ENTORNO HABITACIONAL</b></div>
                        <div class="card-body">
                            <div class="row" id="tiposZona">

                            </div>
                        </div>
                    </div>

                    {{-- Tipo de vivendia --}}
                    <div class="card portlet border">
                        <div class="card-header" style=" background-color: lightblue;"><b>TIPO DE VIVIENDA</b></div>
                        <div class="card-body">
                            <div id="tipoVivienda"></div>
                        </div>
                    </div>

                    {{-- refernecia --}}
                    <div class="card portlet border">
                        <div class="card-header" style=" background-color: lightblue;"><b>REFERENCIA</b></div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-xl-12">
                                    <table class="table-bordered" style="width: 100%" id="referencio">
                                        <tr>
                                            <td><b>Nombre</b></td>
                                            <td><b>Tiempo de conocerlo</b></td>
                                            <td><b>Relación</b></td>
                                            <td><b>Domicilio</b></td>
                                            <td><b>Teléfono</b></td>
                                            <td><b>Opinión sobre el candidato</b></td>

                                        </tr>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                    {{-- referencia laborales --}}
                    <div class="card portlet border">
                        <div class="card-header" style=" background-color: lightblue;"><b>REFERENCIAS LABORALES | INFORMACIÓN LABORAL</b></div>
                        <div class="card-body">
                            <div id="laboralref"></div>

                        </div>
                    </div>
                    {{-- salud --}}
                    <div class="card portlet border">
                        <div class="card-header" style=" background-color: lightblue;"><b>SALUD</b></div>
                        <div class="card-body">

                            <div class="row" id="saludd"> </div>

                        </div>
                    </div>
                    {{-- FOTOgrafias --}}
                    <div class="card portlet border">
                        <div class="card-header" style=" background-color: lightblue;"><b>Fotografias</b></div>
                        <div class="card-body">

                            <div id="fotoss">  </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>

        @include('include.pie')

    </div>
</div>

@include('include.footer')
<script type="text/javascript">
    /* funcion para imprimir reporte */
    /* $('#print').click(function() {
        location.reload();
        const data = document.getElementById('imprimir');
            // console.log(data);

            html2canvas(data).then((canvas) => {
                // Few necessary setting options
                const imgWidth = 208;
                const pageHeight = 295;
                const imgHeight = canvas.height * imgWidth / canvas.width;
                const heightLeft = imgHeight;

                const contentDataURL = canvas.toDataURL('image/png');
                const pdf = new jspdf('p', 'mm', 'a4'); // A4 size page of PDF
                const position = 0;
                pdf.addImage(contentDataURL, 'PNG', 0, position, imgWidth, imgHeight);
                pdf.save('Estudio.pdf'); // Generated PDF
            });
            load.value = true

    }); */

    function print() {
        var div = document.getElementById('contenido');
        const { jsPDF } = window.jspdf;
        html2canvas(div).then((canvas) => {
            const base64image = canvas.toDataURL('image/png');
            const pdf = new jsPDF('p', 'px', [canvas.width, canvas.height]);
            /* pdf.addImage(base64image, 'JPEG', 10, 10, 300, 650); */
            pdf.addImage(base64image, 'PNG', 0, 0, canvas.width, canvas.height);
            pdf.save('Reporte_estudios.pdf');

            downloadButton.textContent = originalButtonText;
            })
        // Aquí, usamos el desestructurado para obtener jsPDF del módulo
        /* const { jsPDF } = window.jspdf;

        html2canvas(div).then((canvas) => {
            // Establecemos las configuraciones necesarias para la imagen
            const imgWidth = 208;
            const pageHeight = 295;
            const imgHeight = canvas.height * imgWidth / canvas.width;
            const heightLeft = imgHeight;

            const contentDataURL = canvas.toDataURL('image/png');

            const pdf = new jsPDF('p', 'mm', 'a4'); // A4 size page of PDF
            const position = 0;
            // Agregamos la imagen al PDF
            pdf.addImage(contentDataURL, 'PNG', 0, position, imgWidth, imgHeight);

            // Guardamos el PDF generado
            pdf.save('Estudio.pdf'); // Nombre del archivo PDF generado
        }); */

    };
    /* carga info generla */
    cargaGeneral()
    function cargaGeneral(){
        let idUsu = document.getElementById("idEstudio").value;
        $.ajax({
        url: `/estudio/muestroReporte/${idUsu}`,
        method: 'GET',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
        success: function(response) {
            const div = document.getElementById('General');
            div.innerHTML = `
                <div class="col-md-4"><b>SOLICITADO POR:</b> ${response.data[0].idUsuario}</div>
                <div class="col-md-4"><b>EMPRESA:</b> ${response.data[0].idEmpresa}</div>
                <div class="col-md-4"><b>FECHA:</b> ${response.data[0].created_at}</div>
                <div class="col-md-4"><b>NOMBRE DEL SOLICITANTE:</b> ${response.data[0].idUsuario}</div>
                <div class="col-md-4"><b>NOMBRE DEL ANALISTA:</b> ${response.data[0].realizo}</div>
                <div class="col-md-4"><b>PUESTO:</b> ${response.data[0].puesto}</div>
            `;

            const divvv = document.getElementById('datos');
            divvv.innerHTML = `
                <div class="row">
                    <div class="col-xl-4 text-center">
                       <img src="${response.data[0].archivo}" style="height:120px" >
                    </div>
                    <div class="col-xl-8">
                        <div class="row">
                            <div class="col-md-4"><b>APELLIDO PATERNO:</b> ${response.data[0].apePaterno} </div>
                            <div class="col-md-4"><b>APELLIDO MATERNO:</b> ${response.data[0].apeMaterno}</div>
                            <div class="col-md-4"><b>NOMBRE (S):</b> ${response.data[0].nombreCandidato}</div>
                            <div class="col-md-4"><b>SEXO:</b> ${response.data[0].sexo}</div>
                            <div class="col-md-4"><b>EDAD:</b> ${response.data[0].edad}</div>
                            <div class="col-md-4"><b>ESTADO CIVIL:</b> ${response.data[0].estadoCivil}</div>
                            <div class="col-md-4"><b>LUGAR DE NACIMIENTO:</b> ${response.data[0].lugarNacimiento}</div>
                            <div class="col-md-4"><b>FECHA DE NACIMIENTO:</b> ${response.data[0].fechaNacimiento}</div>
                            <div class="col-md-4"><b>ESCOLARIDAD MÁXIMA:</b> ${response.data[0].escolaridad}</div>
                            <div class="col-md-4"><b>RFC:</b> ${response.data[0].rfc}</div>
                        </div>
                </div>
            `;
        },
        error: function(response) { alert('Error al crear la empresa.'); }
        });
    }
    /* funcion para resumen */
    cargaResumen()
    function cargaResumen(){
        let idUsu = document.getElementById("idEstudio").value;
        $.ajax({
        url: `/resumen/muestro/${idUsu}`,
        method: 'POST',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
        success: function(response) {
        /*             console.log(response.data) */

            const div = document.getElementById('resumenUno');
            div.innerHTML = `
                <div class="col-md-4"><b>SOCIAL :</b> ${response.data[0].social} </div>
                <div class="col-md-4"><b>ESCOLAR : </b> ${response.data[0].escolar}</div>
                <div class="col-md-4"><b>ECONÓMICA : </b> ${response.data[0].economica}</div>
                <div class="col-md-4"><b>LABORAL :</b> ${response.data[0].laboral}</div>
                <div class="col-md-4"><b>ACTITUD DEL CANDIDATO DURANTE LA ENTREVISTA :</b> ${response.data[0].actitud}</div>
                <div class="col-md-12"><b>OBSERVACIONES :</b> ${response.data[0].observaciones}</div>
            `;

        },
        error: function(response) { alert('Error al crear la empresa.'); }
        });
    }
    /* carga domicilio */
    cargaDomilio()
    function cargaDomilio(){

        let idUsu = document.getElementById("idEstudio").value;

        $.ajax({
        url: `/domicilio/muestro/${idUsu}`,
        method: 'POST',
        /*  processData: false, // Necesario para evitar que jQuery procese los datos
        contentType: false, */
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
        success: function(response) {
            /* console.log(response.data) */

            const div = document.getElementById('domicilio');
            div.innerHTML = `

                <div class="col-md-4"><b>CALLE: </b> ${response.data[0].calle} </div>
                <div class="col-md-4"><b>NÚMERO : </b> ${response.data[0].numero}</div>
                <div class="col-md-4"><b>COLONIA : </b> ${response.data[0].colonia}</div>
                <div class="col-md-4"><b>DELEGACIÓN O MUNICIPIO :</b> ${response.data[0].delegacionMunicipio}</div>
                <div class="col-md-4"><b>CIUDAD:  </b> ${response.data[0].ciudad}</div>
                <div class="col-md-4"><b>ESTADO:  </b> ${response.data[0].estado}</div>
                <div class="col-md-4"><b>C.P.: </b> ${response.data[0].cp}</div>
                <div class="col-md-4"><b>TIEMPO DE RESIDIR: </b> ${response.data[0].tiempoResindir}</div>
                <div class="col-md-4"><b>TELÉFONO:  </b> ${response.data[0].tel1}</div>
                <div class="col-md-4"><b>CELULAR: </b> ${response.data[0].cel1}</div>

            `;


        },
        error: function(response) { alert('Error al crear la empresa.'); }
        });
    }
    /* funcion para mostrar las redes  */
    cargaRedes()
    function cargaRedes(){
        let idUsu = document.getElementById("idEstudio").value;
        $.ajax({
        url: `/redes/muestro/${idUsu}`,
        method: 'POST',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
        success: function(response) {
            /*             console.log(response.data) */
            const div = document.getElementById('redes');
            div.innerHTML = `
                <div class="col-md-4"><b>FACEBOOK:</b> ${response.data[0].facebook}</div>
                <div class="col-md-4"><b>TWITTER : </b> ${response.data[0].twitter}</div>
                <div class="col-md-4"><b>INSTAGRAM : </b> ${response.data[0].instagram}</div>
            `;
        },
        error: function(response) { alert('Error al crear la empresa.'); }
        });
    }
     /* funcion nivel academico */
    cargaNivel()
    function cargaNivel(){
        let idUsu = document.getElementById("idEstudio").value;
        $.ajax({
        url: `/nivel/muestro/${idUsu}`,
        method: 'POST',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
        success: function(response) {
            /* console.log(response.data) */
            const div = document.getElementById('nivelesAca');
            div.innerHTML = `
                <div class="col-md-4"><b>Último grado de estudios: </b> ${response.data[0].ultimo} </div>
                <div class="col-md-4"><b>Periodo : </b> ${response.data[0].periodo}</div>
                <div class="col-md-4"><b>Profesional : </b> ${response.data[0].profesional}</div>
                <div class="col-md-4"><b>No. de cédula :</b> ${response.data[0].cedula}</div>
                <div class="col-md-4"><b>Especialidad:  </b> ${response.data[0].especialidad}</div>
                <div class="col-md-4"><b>En caso de no tener cédula profesional especifica último grado:  </b> ${response.data[0].instagram}</div>
                <div class="col-md-4"><b>Otros: </b> ${response.data[0].caso}</div>
            `;
        },
        error: function(response) { alert('Error al crear la empresa.'); }
        });
    }
    /* funcion para cargar deudas */
    cargaDeuda()
    function cargaDeuda(){
        let idUsu = document.getElementById("idEstudio").value;
        $.ajax({
        url: `/deudas/muestro/${idUsu}`,
        method: 'POST',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
        success: function(response) {
            /* console.log(response.data) */
            const div = document.getElementById('deudas');
            div.innerHTML = `
                <div class="col-md-4"><b>¿Cuenta con deudas?  </b> ${response.data[0].cuentaDeuda}</div>
                <div class="col-md-4"><b>¿Con quién ? </b> ${response.data[0].conQuien}</div>
                <div class="col-md-4"><b>Monto adeudado: </b> ${response.data[0].monto}</div>
                <div class="col-md-4"><b>Abono mensual:  </b> ${response.data[0].abonoMensual}</div>
                <div class="col-md-4"><b>A pagar en: </b> ${response.data[0].apagaren}</div>
                <div class="col-md-4"><b>¿Cuenta con Automóvil?:  </b> ${response.data[0].cuentaauto}</div>
                <div class="col-md-4"><b>Modelo:  </b> ${response.data[0].modelo}</div>
                <div class="col-md-4"><b>Placas:  </b> ${response.data[0].placas}</div>
                <div class="col-md-4"><b>Valor de auto: </b> ${response.data[0].valorAuto}</div>
                <div class="col-md-4"><b>¿Cuenta con alguna propiedad?:  </b> ${response.data[0].propiedad}</div>
                <div class="col-md-4"><b>Ubicación: </b> ${response.data[0].ubicacon}</div>
                <div class="col-md-4"><b>¿Cuenta con Tarjeta de Crédito ?:  </b> ${response.data[0].tarjetaCredito}</div>
                <div class="col-md-4"><b>¿Con qué Banco?: </b> ${response.data[0].bancotarjetaCredito}</div>
                <div class="col-md-4"><b>Línea de Crédito Autorizado: </b> ${response.data[0].creditoAutorizado}</div>
                <div class="col-md-4"><b>¿Cuenta con Tarjeta de Tienda Comercial?: </b> ${response.data[0].tarjetaTienda}</div>
                <div class="col-md-4"><b>¿Con quién ?:  </b> ${response.data[0].conquienTienda}</div>
                <div class="col-md-4"><b>Línea de Crédito Autorizado Tienda: </b> ${response.data[0].creditoAutorizadotienda}</div>
                <div class="col-md-4"><b>Observaciones: </b> ${response.data[0].observaciones}</div>

            `;

        },
        error: function(response) { alert('Error al crear la empresa.'); }
        });
    }
    /* funcion para mostar conducta social */
    cargaConducta()
    function cargaConducta(){
        let idUsu = document.getElementById("idEstudio").value;
        $.ajax({
        url: `/conducta/muestro/${idUsu}`,
        method: 'POST',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
        success: function(response) {
            /* console.log(response.data) */
            const div = document.getElementById('conducta');
            div.innerHTML = `
                <div class="col-md-6"><b>¿Quién estuvo presente?:  </b> ${response.data[0].quienEstuvo}</div>
                <div class="col-md-6"><b>Conducta del entrevistado</b> ${response.data[0].conductaEntrevistado}</div>
                <div class="col-md-6"><b>Relación con los vecinos </b> ${response.data[0].relacionVecinos}</div>
                <div class="col-md-6"><b>¿Pertenece a algún grupo social?  </b> ${response.data[0].pertenecegrupo}</div>
                <div class="col-md-6"><b>¿Ha tenido problemas legales?  </b> ${response.data[0].problemasLegales}</div>
                <div class="col-md-6"><b>¿Tiene algún familiar recluido? </b> ${response.data[0].familiarRecluido}</div>
                <div class="col-md-6"><b>¿Tiene un familiar en la empresa?  </b> ${response.data[0].familiaresAdentro}</div>

            `;

        },
        error: function(response) { alert('Error al crear la empresa.'); }
        });
    }
    /* funcion para mostrar la situacuion */
    cargaSituacion()
    function cargaSituacion(){
        let idUsu = document.getElementById("idEstudio").value;
        $.ajax({
        url: `/situacion/muestro/${idUsu}`,
        method: 'POST',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
        success: function(response) {
            const tbody = document.querySelector('#miTabla tbody');

            response.data.forEach(item => {
            const row = document.createElement('tr'); // Crea una fila

            // Crea celdas para cada campo en el objeto
            row.innerHTML = `
                <td>${item.nombre}</td>
                <td>${item.parentesco}</td>
                <td>${item.salario}</td>
                <td>${item.ingreso}</td>
                <td>${item.concepto}</td>
                <td>${item.egresos}</td>
                <td>${item.superavit}</td>
                <td>${item.observaciones}</td>
            `;

            // Agrega la fila al cuerpo de la tabla
            tbody.appendChild(row);
        });
        },
        error: function(response) { alert('Error al crear la empresa.'); }
        });
    }
    /* funcion para mostrar la estructura familiar */
    cargarEstructuraFamiliar()
    function cargarEstructuraFamiliar(){
        let idUsu = document.getElementById("idEstudio").value;
        $.ajax({
        url: `/estructura/muestro/${idUsu}`,
        method: 'POST',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
        success: function(response) {
            const tbody = document.querySelector('#miTablaEstruc tbody');
            response.data.forEach(item => {
                const row = document.createElement('tr'); // Crea una fila

                row.innerHTML = `
                    <td>${item.familiar}</td>
                    <td>${item.edad}</td>
                    <td>${item.ocupacion}</td>
                    <td>${item.laboraEstudia}</td>
                    <td>${item.calle}</td>
                    <td>${item.tiempoReside}</td>
                    <td>${item.tel1}</td>
                `;
                tbody.appendChild(row);
            });

        },
        error: function(response) { alert('Error al crear la empresa.'); }
        });
    }
    /* funcino para cargar el entorno */
    cargaEntorno()
    function cargaEntorno(){
        let idUsu = document.getElementById("idEstudio").value;
        $.ajax({
        url: `/entorno/muestro/${idUsu}`,
        method: 'POST',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
        success: function(response) {
            const div = document.getElementById('tiposZona');
            div.innerHTML = `
                <div class="col-md-4"><b>TIPO DE ZONA</b> ${response.data[0].tipoZona}   </div>
            `;

           const div22 = document.getElementById('tipoVivienda');
            div22.innerHTML = `
                <div class="row">
                    <div class="col-md-3"><b>TIPO DE VIVIENDA:</b> ${response.data[0].tipoVivienda}</div>
                    <div class="col-md-3"><b>EDIFICACIÓN DE INMUEBLE: </b> ${response.data[0].edificacion}</div>
                    <div class="col-md-3"><b>TITULAR DEL INMUEBLE:</b> ${response.data[0].titular}</div>
                    <div class="col-md-3"><b>PARENTESCO: </b> ${response.data[0].parentesco}</div>

                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12 text-center"><b>DISTRIBUCIÓN DE HOGAR </b></div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-3"><b>NO. DE RECAMARAS:</b> ${response.data[0].numRecamaras}</div>
                    <div class="col-md-3"><b>SALA:</b> ${response.data[0].sala}</div>
                    <div class="col-md-3"><b>COMEDOR:</b> ${response.data[0].comedor}</div>
                    <div class="col-md-3"><b>COCINA:</b> ${response.data[0].cocina}</div>
                    <div class="col-md-3"><b>GARAJE:</b ${response.data[0].garaje}></div>
                    <div class="col-md-3"><b>JARDIN:</b> ${response.data[0].jardin}</div>

                    <div class="col-md-3"><b>Estudio:</b> ${response.data[0].estudio}</div>
                    <div class="col-md-3"><b>Zotehuela:</b> ${response.data[0].zotehuela}</div>
                    <div class="col-md-3"><b>Agua:</b> ${response.data[0].agua}</div>
                    <div class="col-md-3"><b>Luz:</b> ${response.data[0].luz}</div>
                    <div class="col-md-3"><b>Drenaje:</b> ${response.data[0].drenaje}</div>
                    <div class="col-md-3"><b>Pavimentación:</b> ${response.data[0].pavimentacion}</div>
                    <div class="col-md-3"><b>Teléfono:</b> ${response.data[0].telefonoent}</div>
                    <div class="col-md-3"><b>Transporte:</b> ${response.data[0].transporte}</div>
                    <div class="col-md-3"><b>Área de recreación:</b> ${response.data[0].areas}</div>
                    <div class="col-md-3"><b>Vigilancia:</b> ${response.data[0].vigilancia}</div>
                    <div class="col-md-3"><b>Internet:</b> ${response.data[0].internet}</div>
                    <div class="col-md-3"><b>Televisión normal:</b> ${response.data[0].telNormal}</div>
                    <div class="col-md-3"><b>Televisión de plasma:</b> ${response.data[0].telPlasma}</div>
                    <div class="col-md-3"><b>Estéreo:</b> ${response.data[0].estereo}</div>
                    <div class="col-md-3"><b>DVD:</b> ${response.data[0].dvd}</div>
                    <div class="col-md-3"><b>Blue Ray:</b> ${response.data[0].blueray}</div>
                    <div class="col-md-3"><b>Estufa:</b> ${response.data[0].estufa}</div>
                    <div class="col-md-3"><b>Horno de microondas:</b> ${response.data[0].horno}</div>
                    <div class="col-md-3"><b>Lavadora:</b> ${response.data[0].lavadora}</div>
                    <div class="col-md-3"><b>Refrigerador :</b> ${response.data[0].refrigerador}</div>
                    <div class="col-md-3"><b>Computadora:</b> ${response.data[0].computadora}</div>

                    <div class="col-md-3"><b>Número de baños:</b> ${response.data[0].nomBano}</div>
                    <div class="col-md-3"><b>Tipo de baño:</b> ${response.data[0].tipobano}</div>
                    <div class="col-md-3"><b>Con regadera:</b> ${response.data[0].regadera}</div>
                    <div class="col-md-3"><b>Renta mensual:</b> ${response.data[0].renta}</div>
                    <div class="col-md-3"><b>Tipo de paredes:</b> ${response.data[0].paredes}</div>
                    <div class="col-md-3"><b>Tipo de techos:</b> ${response.data[0].techos}</div>
                    <div class="col-md-3"><b>Tipo de pisos:</b> ${response.data[0].pisos}</div>
                    <div class="col-md-3"><b>Extensión del Inmueble:</b> ${response.data[0].extensionInmueble}</div>
                    <div class="col-md-3"><b>Condiciones Generales del Inmueble:</b> ${response.data[0].condicionesInmueble}</div>
                    <div class="col-md-3"><b>Condiciones del Mobiliario:</b> ${response.data[0].condicionesMobiliario}</div>
                    <div class="col-md-3"><b>Orden:</b> ${response.data[0].orden}</div>
                    <div class="col-md-3"><b>Limpieza:</b> ${response.data[0].limpieza}</div>
                    <div class="col-md-3"><b>Delincuencia:</b> ${response.data[0].delincuencia}</div>
                    <div class="col-md-3"><b>Vandalismo:</b> ${response.data[0].vandalismo}</div>
                    <div class="col-md-3"><b>Drogadicción:</b> ${response.data[0].drogadiccion}</div>
                    <div class="col-md-3"><b>Alcoholismo:</b> ${response.data[0].alcoholismo}</div>
                    <div class="col-md-3"><b>Principales Vías de acceso:</b> ${response.data[0].viasdeacceso}</div>
                    <div class="col-md-3"><b>Medio de transporte:</b> ${response.data[0].medioTransporte}</div>
                    <div class="col-md-3"><b>Tiempo aproximado a su Servicio:</b> ${response.data[0].tiempoServicio}</div>
                    <div class="col-md-3"><b>Entre que calles:</b> ${response.data[0].entreCalles}</div>
                    <div class="col-md-3"><b>Color de la vivienda:</b> ${response.data[0].color}</div>
                    <div class="col-md-3"><b>Color del portón:</b> ${response.data[0].porton}</div>


                </div>
            `;

        },
        error: function(response) { alert('Error al crear la empresa.'); }
        });
    }
    /* funcion para cargar las referencia personales */
    cargaReferenicaPersonales()
    function cargaReferenicaPersonales(){
        let idUsu = document.getElementById("idEstudio").value;
        $.ajax({
        url: `/referenciap/muestro/${idUsu}`,
        method: 'POST',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
        success: function(response) {

            const tbody = document.querySelector('#referencio tbody');
            response.data.forEach(item => {
                const row = document.createElement('tr'); // Crea una fila

                row.innerHTML = `
                    <td>${item.nombre}</td>
                    <td>${item.tiempoConocerlo}</td>
                    <td>${item.relacion}</td>
                    <td>${item.domicilio}</td>
                    <td>${item.tel1}</td>
                    <td>${item.opinion}</td>

                `;
                tbody.appendChild(row);
            });
        },
        error: function(response) { alert('Error al crear la empresa.'); }
        });
    }
    /* funcion para la carga de antecendentes laborales */
    cargaAntecedentes()
    function cargaAntecedentes(){
        let idUsu = document.getElementById("idEstudio").value;
        $.ajax({
        url: `/antecedentesl/muestro/${idUsu}`,
        method: 'POST',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
        success: function(response) {

            response.data.forEach(item => {

                const div = document.getElementById('laboralref');
                div.innerHTML += `
                <div class="row">
                    <div class="col-md-4"><b>Empresa:  </b>${response.data[0].empresa}</div>
                    <div class="col-md-4"><b>Giro:  </b>${response.data[0].giro}</div>
                    <div class="col-md-4"><b>Dirección:  </b>${response.data[0].direccion}</div>
                    <div class="col-md-4"><b>Teléfono:  </b>${response.data[0].telefono}</div>
                    <div class="col-md-4"><b>Fecha Ingreso:  </b>${response.data[0].fechaIngreso}</div>
                    <div class="col-md-4"><b>Fecha Egreso:  </b>${response.data[0].fechaEgreso}</div>
                    <div class="col-md-4"><b>Puesto Ocupado:  </b>${response.data[0].puesto}</div>
                    <div class="col-md-4"><b>Área:  </b>${response.data[0].area}</div>
                    <div class="col-md-4"><b>Salario:  </b>${response.data[0].salario}</div>
                    <div class="col-md-4"><b>Motivo de salida:  </b>${response.data[0].motivoSalida}</div>
                    <div class="col-md-4"><b>Quien proporciona la información:  </b>${response.data[0].quienProporciono}</div>
                    <div class="col-md-4"><b>Puesto:  </b>${response.data[0].puestoProporciono}</div>
                    <div class="col-md-4"><b>Calificación(Desempeño) del 1 al 10::  </b>${response.data[0].calificacion}</div>
                    <div class="col-md-4"><b>Sabe usted si el Candidato interpuso alguna Demanda?:  </b>${response.data[0].demanda}</div>
                    <div class="col-md-4"><b>Lo volvería a contratar:  </b>${response.data[0].volveria}</div>
                    <div class="col-md-4"><b>¿Por qué?:  </b>${response.data[0].porque}</div>
                    <div class="col-md-4"><b>El candidato es:  </b>${response.data[0].candidatoes}</div>
                    <div class="col-md-4"><b>El candidato tiene periodos Inactivos:  </b>${response.data[0].periodosInactivo}</div>
                    <div class="col-md-12"><b>Observación:  </b>${response.data[0].observaciones}</div>
                </div>
                <hr>

                `;

            });

        },
        error: function(response) { alert('Error al crear la empresa.'); }
        });
    }
    /* funcino para la carga de salud */
    cargaSalud()
    function cargaSalud(){
        let idUsu = document.getElementById("idEstudio").value;
        $.ajax({
        url: `/salud/muestro/${idUsu}`,
        method: 'POST',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
        success: function(response) {
            const div22 = document.getElementById('saludd');
            div22.innerHTML = `
                <div class="col-md-4"><b>Drogas:  </b> ${response.data[0].droga}</div>
                <div class="col-md-4"><b>Que droga:  </b> ${response.data[0].cualDroga}</div>
                <div class="col-md-4"><b>Cigarro:  </b> ${response.data[0].fuma}</div>
                <div class="col-md-4"><b>Frecuencia:  </b> ${response.data[0].frecuenciaFuma}</div>
                <div class="col-md-4"><b>Bebida:  </b> ${response.data[0].bebidas}</div>
                <div class="col-md-4"><b>Frecuencia:  </b> ${response.data[0].frecuenciaBebidas}</div>
                <div class="col-md-4"><b>Cafe:  </b> ${response.data[0].cafe}</div>
                <div class="col-md-4"><b>Frecuencia:  </b> ${response.data[0].frecuenciaCafe}</div>
                <div class="col-md-4"><b>Lentes:  </b> ${response.data[0].lentes}</div>
                <div class="col-md-4"><b>Diagnostico:  </b> ${response.data[0].diagnostico}</div>
                <div class="col-md-4"><b>Intervenciones:  </b> ${response.data[0].intervenciones}</div>
                <div class="col-md-4"><b>Tipo de intervención:  </b> ${response.data[0].dequeintervenciones}</div>
                <div class="col-md-4"><b>Enfermedades cronicas:  </b> ${response.data[0].enfermedadesCronicas}</div>
                <div class="col-md-4"><b>Cuales:  </b> ${response.data[0].dequeCronicas}</div>
                <div class="col-md-4"><b>Hereditarias:  </b> ${response.data[0].hereditarias}</div>
                <div class="col-md-4"><b>Cuales:  </b> ${response.data[0].cualHereditarias}</div>
                <div class="col-md-4"><b>Embarazo:  </b> ${response.data[0].embarazo}</div>
                <div class="col-md-4"><b>Ultima enfermedad:  </b> ${response.data[0].ultimavezDeque}</div>
                <div class="col-md-4"><b>Familiar requiere atención medica constante:  </b> ${response.data[0].quienConstante}</div>
                <div class="col-md-4"><b>Por que:  </b> ${response.data[0].porqueConstante}</div>
                <div class="col-md-4"><b>Ultimo examen medico:  </b> ${response.data[0].ultimaVez}</div>
                <div class="col-md-4"><b>Como considera su salud:  </b> ${response.data[0].considera}</div>
                <div class="col-md-4"><b>Por que:  </b> ${response.data[0].porqueConsidera}</div>
                <div class="col-md-4"><b>Practica algun deporte:  </b> ${response.data[0].deporte}</div>
                <div class="col-md-4"><b>Pasatiempos:  </b> ${response.data[0].pasatiempo}</div>
            `;
        },
        error: function(response) { alert('Error al crear la empresa.'); }
        });
    }
    /* funcion para mostrar las listas de documentos */
    cargarDocumentos()
    function cargarDocumentos(){
        let idUsu = document.getElementById("idEstudio").value;
        $.ajax({
        url: `/documentos/muestro/${idUsu}`,
        method: 'POST',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
        success: function(response) {
            response.data.forEach(item => {

                const div = document.getElementById('fotoss');
                div.innerHTML += `
                    <div class="row" id="fotoss">
                        <div class="col-xl-12 text-center">
                            <img src="${item.archivo}"><br>
                        </div>
                    </div>

                `;

            });


        },
        error: function(response) { alert('Error al crear la empresa.'); }
        });
    }




    /* funcion para hobby */
    function cargaHobby(){
        const div = document.getElementById('alerta');
        div.style.display = 'none';

        let idUsu = document.getElementById("idEstudioEdi").value;

        $.ajax({
        url: `/hobby/muestro/${idUsu}`,
        method: 'POST',
        /*  processData: false, // Necesario para evitar que jQuery procese los datos
        contentType: false, */
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
        success: function(response) {
            $('#idHobby').val(response.data[0].id);
            $('#deportes').val(response.data[0].deportes)
            $('#cual').val(response.data[0].cual)
            $('#frecuencia').val(response.data[0].frecuencia)
            $('#pasatiempos').val(response.data[0].pasatiempos)
            $('#otros').val(response.data[0].otros)

        },
        error: function(response) { alert('Error al crear la empresa.'); }
        });
    }
    /* funcion para cargar beneficiarios */
    function cargaBeneficiario(){
        const div = document.getElementById('alerta');
        div.style.display = 'none';

        let idUsu = document.getElementById("idEstudioEdi").value;
        const tabla = $('#datatable7').DataTable();
        tabla.destroy();

        $.ajax({
        url: `/beneficiario/muestro/${idUsu}`,
        method: 'POST',
        /*  processData: false, // Necesario para evitar que jQuery procese los datos
        contentType: false, */
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
        success: function(response) {

            $('#datatable7 tbody').empty();
            jsonData = Array.isArray(response) ? response : response.data;

            jsonData.forEach(row => {
                tabla.row.add([
                    row.id,
                    row.parentesco,
                    row.nombre,
                    row.edad,
                    row.ocupacion,
                    row.donde,
                    row.calle,
                    row.numero,
                    row.colonia,
                    row.delegacion,
                    row.ciudad,
                    row.estado,
                    row.cp,
                    row.tiempo,
                    row.telefono,
                    `
                        <a onclick="veoEditoBeneficiario('${row.id}','${row.parentesco}','${row.nombre}','${row.edad}','${row.ocupacion}','${row.donde}','${row.calle}','${row.numero}','${row.colonia}','${row.delegacion}','${row.ciudad}','${row.estado}','${row.cp}','${row.tiempo}','${row.telefono}')"><button class="btn btn-outline-success"><i class="fas fa-edit"></i></button></a>
                        <a onclick="eliBeneficiario(${row.id})"><button class="btn btn-outline-danger"><i class=" far fa-trash-alt"></i></button></a>

                    `
                ]).draw(false); // `draw(false)` evita recalcular toda la tabla
            });


        },
        error: function(response) { alert('Error al crear la empresa.'); }
        });
    }

    /* funcion para cargar periodos no laborados */
    function cargaPeriodos(){
        const div = document.getElementById('alerta');
        div.style.display = 'none';

        let idUsu = document.getElementById("idEstudioEdi").value;
        const tabla = $('#datatable8').DataTable();
        tabla.destroy();

        $.ajax({
        url: `/periodo/muestro/${idUsu}`,
        method: 'POST',
        /*  processData: false, // Necesario para evitar que jQuery procese los datos
        contentType: false, */
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
        success: function(response) {

            $('#datatable8 tbody').empty();
            jsonData = Array.isArray(response) ? response : response.data;

            jsonData.forEach(row => {
                tabla.row.add([
                    row.id,
                    row.inicio,
                    row.termino,
                    row.motivo,
                    row.comentarios,

                    `
                        <a onclick="veoEditoPeriodo('${row.id}','${row.inicio}','${row.termino}','${row.motivo}','${row.comentarios}')"><button class="btn btn-outline-success"><i class="fas fa-edit"></i></button></a>
                        <a onclick="eliPeriodo(${row.id})"><button class="btn btn-outline-danger"><i class=" far fa-trash-alt"></i></button></a>

                    `
                ]).draw(false); // `draw(false)` evita recalcular toda la tabla
            });


        },
        error: function(response) { alert('Error al crear la empresa.'); }
        });
    }
    /* funcion carga historial laboral */
    function cargaHistorial(){
        const div = document.getElementById('alerta');
        div.style.display = 'none';

        let idUsu = document.getElementById("idEstudioEdi").value;

        $.ajax({
        url: `/historitall/muestro/${idUsu}`,
        method: 'POST',
        /*  processData: false, // Necesario para evitar que jQuery procese los datos
        contentType: false, */
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
        success: function(response) {
            $('#idHistorial').val(response.data[0].id);

            $('#ultimoh').val(response.data[0].ultimo)
            $('#vidah').val(response.data[0].vida)
            $('#nusemanah').val(response.data[0].nusemana)
            $('#porcentajeh').val(response.data[0].porcentaje)
            $('#numeroempleadoresh').val(response.data[0].numeroempleadores)
            $('#progresionh').val(response.data[0].progresion)
            $('#finiquitoh').val(response.data[0].finiquito)
            $('#liquidacionh').val(response.data[0].liquidacion)
            $('#aguinaldoh').val(response.data[0].aguinaldo)
            $('#vacacionesh').val(response.data[0].vacaciones)
            $('#comentariosh').val(response.data[0].comentarios)

        },
        error: function(response) { alert('Error al crear la empresa.'); }
        });
    }
    /* funcion para cargar los despidos */
    function cargaDespidos(){
        const div = document.getElementById('alerta');
        div.style.display = 'none';

        let idUsu = document.getElementById("idEstudioEdi").value;
        const tabla = $('#datatable12').DataTable();
        tabla.destroy();

        $.ajax({
        url: `/despidos/muestro/${idUsu}`,
        method: 'POST',
        /*  processData: false, // Necesario para evitar que jQuery procese los datos
        contentType: false, */
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
        success: function(response) {

            $('#datatable12 tbody').empty();
            jsonData = Array.isArray(response) ? response : response.data;

            jsonData.forEach(row => {
                tabla.row.add([
                    row.id,
                    row.nombre,
                    row.periodo,
                    row.motivo,

                    `
                        <a onclick="veoEditoDespidos('${row.id}','${row.nombre}','${row.periodo}','${row.motivo}')"><button class="btn btn-outline-success"><i class="fas fa-edit"></i></button></a>
                        <a onclick="eliDespidos(${row.id})"><button class="btn btn-outline-danger"><i class=" far fa-trash-alt"></i></button></a>

                    `
                ]).draw(false); // `draw(false)` evita recalcular toda la tabla
            });


        },
        error: function(response) { alert('Error al crear la empresa.'); }
        });
    }
    /* funcion para cargar las incapaciaddes */
    function cargaIncapacidades(){
        const div = document.getElementById('alerta');
        div.style.display = 'none';

        let idUsu = document.getElementById("idEstudioEdi").value;
        const tabla = $('#datatable10').DataTable();
        tabla.destroy();

        $.ajax({
        url: `/incapacidades/muestro/${idUsu}`,
        method: 'POST',
        /*  processData: false, // Necesario para evitar que jQuery procese los datos
        contentType: false, */
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
        success: function(response) {

            $('#datatable10 tbody').empty();
            jsonData = Array.isArray(response) ? response : response.data;

            jsonData.forEach(row => {
                tabla.row.add([
                    row.id,
                    row.nombre,
                    row.periodo,
                    row.motivo,

                    `
                        <a onclick="veoEditoIncapacidades('${row.id}','${row.nombre}','${row.periodo}','${row.motivo}')"><button class="btn btn-outline-success"><i class="fas fa-edit"></i></button></a>
                        <a onclick="eliIncapacidades(${row.id})"><button class="btn btn-outline-danger"><i class=" far fa-trash-alt"></i></button></a>

                    `
                ]).draw(false); // `draw(false)` evita recalcular toda la tabla
            });


        },
        error: function(response) { alert('Error al crear la empresa.'); }
        });
    }
    /* funcion pára problemas empleao actual */
    function cargaProblemas(){
        const div = document.getElementById('alerta');
        div.style.display = 'none';

        let idUsu = document.getElementById("idEstudioEdi").value;

        $.ajax({
        url: `/problemas/muestro/${idUsu}`,
        method: 'POST',
        /*  processData: false, // Necesario para evitar que jQuery procese los datos
        contentType: false, */
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
        success: function(response) {
            $('#idProblemas').val(response.data[0].id);

            $('#nombrepro').val(response.data[0].nombre)
            $('#informantepro').val(response.data[0].informante)
            $('#comentariospro').val(response.data[0].comentarios)
            $('#datopro').val(response.data[0].dato)

        },
        error: function(response) { alert('Error al crear la empresa.'); }
        });
    }
    /* funcion para cargar incidencias laboral */
    function cargaInfoLab(){
        const div = document.getElementById('alerta');
        div.style.display = 'none';

        let idUsu = document.getElementById("idEstudioEdi").value;

        $.ajax({
        url: `/infoLab/muestro/${idUsu}`,
        method: 'POST',
        /*  processData: false, // Necesario para evitar que jQuery procese los datos
        contentType: false, */
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
        success: function(response) {
            $('#idInfoLab').val(response.data[0].id);
            $('#laborall').val(response.data[0].laboral)
            $('#campol').val(response.data[0].campol)
            $('#fechal').val(response.data[0].fechal)
            $('#acuerdol').val(response.data[0].acuerdol)
            $('#civiles').val(response.data[0].civiles)
            $('#campoc').val(response.data[0].campoc)
            $('#fechac').val(response.data[0].fechac)
            $('#acuerdoc').val(response.data[0].acuerdoc)
            $('#familiares').val(response.data[0].familiares)
            $('#campof').val(response.data[0].campof)
            $('#fechaf').val(response.data[0].fechaf)
            $('#acuerdof').val(response.data[0].acuerdof)
            $('#penales').val(response.data[0].penales)
            $('#campop').val(response.data[0].campop)
            $('#fechap').val(response.data[0].fechap)
            $('#acuerdop').val(response.data[0].acuerdop)
            $('#administrativa').val(response.data[0].administrativa)
            $('#campoa').val(response.data[0].campoa)
            $('#fechaa').val(response.data[0].fechaa)
            $('#acuerdoa').val(response.data[0].acuerdoa)
            $('#internacional').val(response.data[0].internacional)
            $('#campoi').val(response.data[0].campoi)
            $('#fechai').val(response.data[0].fechai)
            $('#acuerdoi').val(response.data[0].acuerdoi)
            $('#sat').val(response.data[0].sat)
            $('#camposat').val(response.data[0].camposat)
            $('#fechasat').val(response.data[0].fechasat)
            $('#acuerdosat').val(response.data[0].acuerdosat)
            $('#comentariol').val(response.data[0].comentariol)
            $('#comentarioc').val(response.data[0].comentarioc)
            $('#comentariof').val(response.data[0].comentariof)
            $('#comentariop').val(response.data[0].comentariop)
            $('#comentarioa').val(response.data[0].comentarioa)
            $('#comentarioi').val(response.data[0].comentarioi)
            $('#comentariosat').val(response.data[0].comentariosat)

        },
        error: function(response) { alert('Error al crear la empresa.'); }
        });
    }
    /* funcion creditos */
    function cargaCreditos(){
        const div = document.getElementById('alerta');
        div.style.display = 'none';

        let idUsu = document.getElementById("idEstudioEdi").value;
        const tabla = $('#datatable11').DataTable();
        tabla.destroy();

        $.ajax({
        url: `/creditos/muestro/${idUsu}`,
        method: 'POST',
        /*  processData: false, // Necesario para evitar que jQuery procese los datos
        contentType: false, */
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
        success: function(response) {

            $('#datatable11 tbody').empty();
            jsonData = Array.isArray(response) ? response : response.data;

            jsonData.forEach(row => {
                tabla.row.add([
                    row.id,
                    row.fecha,
                    row.entidad,
                    row.monto,
                    row.total,
                    row.estatus,
                    row.comentario,
                    row.endeudamiento,
                    row.hipoteca,
                    row.score,
                    `
                        <a onclick="veoEditoCreditos('${row.id}','${row.fecha}','${row.entidad}','${row.monto}','${row.total}','${row.estatus}','${row.comentario}','${row.endeudamiento}','${row.hipoteca}','${row.score}')"><button class="btn btn-outline-success"><i class="fas fa-edit"></i></button></a>
                        <a onclick="eliCreditos(${row.id})"><button class="btn btn-outline-danger"><i class=" far fa-trash-alt"></i></button></a>

                    `
                ]).draw(false); // `draw(false)` evita recalcular toda la tabla
            });


        },
        error: function(response) { alert('Error al crear la empresa.'); }
        });
    }
    /* funcion para cargar infonavit */
    function cargaInfonaviot(){
        const div = document.getElementById('alerta');
        div.style.display = 'none';

        let idUsu = document.getElementById("idEstudioEdi").value;

        $.ajax({
        url: `/infonavit/muestro/${idUsu}`,
        method: 'POST',
        /*  processData: false, // Necesario para evitar que jQuery procese los datos
        contentType: false, */
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
        success: function(response) {
            $('#idInfonavit').val(response.data[0].id);
            $('#estatusvit').val(response.data[0].estatus)
            $('#puntosvit').val(response.data[0].puntos)
            $('#subcuentavit').val(response.data[0].subcuenta)
            $('#maximovit').val(response.data[0].maximo)
            $('#hipotecavit').val(response.data[0].hipoteca)

        },
        error: function(response) { alert('Error al crear la empresa.'); }
        });
    }
    /* funcino para cargar servicio medico */
    function cargaServicioMedico(){
        const div = document.getElementById('alerta');
        div.style.display = 'none';

        let idUsu = document.getElementById("idEstudioEdi").value;

        $.ajax({
        url: `/medico/muestro/${idUsu}`,
        method: 'POST',
        /*  processData: false, // Necesario para evitar que jQuery procese los datos
        contentType: false, */
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
        success: function(response) {
            $('#clinicai').val(response.data[0].clinicai)
            $('#incidentei').val(response.data[0].incidentei)
            $('#tipoi').val(response.data[0].tipoi)
            $('#clinicaim').val(response.data[0].clinicaim)
            $('#incidenteim').val(response.data[0].incidenteim)
            $('#tipoim').val(response.data[0].tipoim)
            $('#clinicais').val(response.data[0].clinicais)
            $('#incidenteis').val(response.data[0].incidenteis)
            $('#tipois').val(response.data[0].tipois)
            $('#clinicase').val(response.data[0].clinicase)
            $('#incidentese').val(response.data[0].incidentese)
            $('#tipose').val(response.data[0].tipose)
            $('#aseguradora').val(response.data[0].aseguradora)
            $('#incidentepri').val(response.data[0].incidentepri)
            $('#tipopri').val(response.data[0].tipopri)
            $('#clinicaisse').val(response.data[0].clinicaisse)
            $('#incidenteisse').val(response.data[0].incidenteisse)
            $('#tipoisse').val(response.data[0].tipoisse)
            $('#idMedico').val(response.data[0].id);
        },
        error: function(response) { alert('Error al crear la empresa.'); }
        });
    }


</script>


