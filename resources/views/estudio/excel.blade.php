@include('include.header')

<div id="layout-wrapper">

    {{-- menu --}}
    @include('include.menu')

    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                {{-- titulo de pagina --}}
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <div>
                                <h4 class="fs-16 fw-semibold mb-1 mb-md-2">Bienvenido, <span class="text-primary">{{ session('name') }}!</span></h4>
                            </div>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Inicio</a></li>
                                    <li class="breadcrumb-item active">Carga de info excel</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- seccion de alerta --}}
                @include('include.aviso')

                {{-- avisos del dia --}}
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                {{-- titulos de seccion --}}
                                <div class="row">
                                    <div class="col-xl-6"> <div class="alert alert-label-warning"><b>Recuerda, solo puedes subir el archivo de excel de la empresa, y el archivo tiene que tener el número del estudio en el nombre.</b></div> </div>
                                    <div class="col-xl-6"> <a href="{{asset('backend/assets/images/informacion_.xlsx')}}" download style="cursor: pointer"><div class="alert alert-label-info">Archivo de excel</div></a> </div>
                                </div>

                                <hr>
                                {{-- carga de archivo --}}
                                <div class="row">
                                    <div class="col-xl-12 text-center"> <input type="file" class="form-control" id="archivoExcel" onchange="leerExcel(event)"> </div>
                                </div>
                                <hr>
                                {{-- aviso de carga --}}
                                <div class="row text-center" style="display: none ;" id="aviuso"><div class="alert alert-label-primary">Carga completada con exito</div></div>

                                {{-- formulario oculto para cargar informacion --}}
                                <input type="hidden" id="uno" name="uno" >
                                <input type="hidden" id="dos"  name="dos">
                                <input type="hidden" id="tres"  name="tres">
                                <input type="hidden" id="cuatro"  name="cuatro">
                                <input type="hidden" id="cinco"  name="cinco">
                                <input type="hidden" id="seis"  name="seis">
                                <input type="hidden" id="siete"  name="siete">
                                <input type="hidden" id="ocho"  name="ocho">
                                <input type="hidden" id="nueve"  name="nueve">
                                <input type="hidden" id="diez"  name="diez">
                                <input type="hidden" id="once"  name="once">
                                <input type="hidden" id="doce"  name="doce">
                                <input type="hidden" id="nombre"  name="nombre">

                            </div>
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

function leerExcel(event) {
    const archivo = event.target.files[0];
    var nombreArchivo = archivo.name.split("_");
    var nombreArchivoDinal = nombreArchivo[1].split(".");
    const lector = new FileReader();
    lector.onload = function(e) {
        const contenido = e.target.result;

        // Parsear el contenido del archivo Excel
        const workbook = XLSX.read(contenido, {type: 'binary'});

        // Obtener la primera hoja del archivo Excel
        const uno = workbook.Sheets[workbook.SheetNames[0]];
        const dos = workbook.Sheets[workbook.SheetNames[1]];
        const tres = workbook.Sheets[workbook.SheetNames[2]];
        const cuatro = workbook.Sheets[workbook.SheetNames[3]];
        const cinco = workbook.Sheets[workbook.SheetNames[4]];
        const seis = workbook.Sheets[workbook.SheetNames[5]];
        const siete = workbook.Sheets[workbook.SheetNames[6]];
        const ocho = workbook.Sheets[workbook.SheetNames[7]];
        const nueve = workbook.Sheets[workbook.SheetNames[8]];
        const diez = workbook.Sheets[workbook.SheetNames[9]];
        const once = workbook.Sheets[workbook.SheetNames[10]];
        const doce = workbook.Sheets[workbook.SheetNames[11]];
        // Convertir la hoja a un formato legible
        const datos1 = XLSX.utils.sheet_to_json(uno, {header: 1});
        const datos2 = XLSX.utils.sheet_to_json(dos, {header: 1});
        const datos3 = XLSX.utils.sheet_to_json(tres, {header: 1});
        const datos4 = XLSX.utils.sheet_to_json(cuatro, {header: 1});
        const datos5 = XLSX.utils.sheet_to_json(cinco, {header: 1});
        const datos6 = XLSX.utils.sheet_to_json(seis, {header: 1});
        const datos7 = XLSX.utils.sheet_to_json(siete, {header: 1});
        const datos8 = XLSX.utils.sheet_to_json(ocho, {header: 1});
        const datos9 = XLSX.utils.sheet_to_json(nueve, {header: 1});
        const datos10 = XLSX.utils.sheet_to_json(diez, {header: 1});
        const datos11 = XLSX.utils.sheet_to_json(once, {header: 1});
        const datos12 = XLSX.utils.sheet_to_json(doce, {header: 1});

        document.getElementById("uno").value =JSON.stringify( datos1)
        document.getElementById("dos").value =JSON.stringify(datos2)
        document.getElementById("tres").value =JSON.stringify(datos3)
        document.getElementById("cuatro").value =JSON.stringify(datos4)
        document.getElementById("cinco").value =JSON.stringify(datos5)
        document.getElementById("seis").value =JSON.stringify(datos6)
        document.getElementById("siete").value =JSON.stringify(datos7)
        document.getElementById("ocho").value =JSON.stringify(datos8)
        document.getElementById("nueve").value =JSON.stringify(datos9)
        document.getElementById("diez").value =JSON.stringify(datos10)
        document.getElementById("once").value =JSON.stringify(datos11)
        document.getElementById("doce").value =JSON.stringify(datos12)
        document.getElementById("nombre").value =JSON.stringify(nombreArchivoDinal[0])

        /* enviar valores por funcion */
        envioFormulario()
    };
    lector.readAsBinaryString(archivo);
}
/* /////////////////////////////////////////////////////////// */

/* funcion para enviar formulario */
function envioFormulario(){

    var formData = {
        uno : $('#uno').val(),
        dos : $('#dos').val(),
        tres : $('#tres').val(),
        cuatro : $('#cuatro').val(),
        cinco : $('#cinco').val(),
        seis : $('#seis').val(),
        siete : $('#siete').val(),
        ocho : $('#ocho').val(),
        nueve : $('#nueve').val(),
        diez : $('#diez').val(),
        once : $('#once').val(),
        doce : $('#doce').val(),
        nombre : $('#nombre').val()
    };

    $.ajax({
    url: `/estudio/cargoexcel`,
    method: 'POST',
    data: formData,
    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
    success: function(response) {
        $('#archivoExcel').val('')
        const aviuso = document.getElementById("aviuso");
        aviuso.style.display = "";
    },
    error: function(response) { alert('Error al crear la empresa.'); }
    });
}


</script>


