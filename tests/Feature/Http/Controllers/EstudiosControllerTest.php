<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Estudio;
use App\Models\Estudios;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\EstudiosController
 */
final class EstudiosControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $estudios = Estudios::factory()->count(3)->create();

        $response = $this->get(route('estudios.index'));

        $response->assertOk();
        $response->assertViewIs('estudio.index');
        $response->assertViewHas('estudios');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('estudios.create'));

        $response->assertOk();
        $response->assertViewIs('estudio.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\EstudiosController::class,
            'store',
            \App\Http\Requests\EstudiosStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $idUsuario = $this->faker->word();
        $idEmpresa = $this->faker->word();
        $nombreCandidato = $this->faker->word();
        $apePaterno = $this->faker->word();
        $apeMaterno = $this->faker->word();
        $puesto = $this->faker->word();
        $fechaSolicitud = $this->faker->word();
        $valida = $this->faker->word();
        $realizo = $this->faker->word();
        $foto = $this->faker->text();
        $estatus = $this->faker->word();
        $rfc = $this->faker->word();
        $curp = $this->faker->word();
        $archivo = $this->faker->text();
        $proceso = $this->faker->word();
        $fechaTermino = $this->faker->word();
        $motivoCancelacion = $this->faker->text();
        $fechaCancelacion = $this->faker->word();
        $usuarioCancela = $this->faker->word();
        $encuestador = $this->faker->word();
        $fechaCita = $this->faker->word();
        $horacita = $this->faker->word();
        $nss = $this->faker->word();
        $tiposervicio = $this->faker->word();
        $telefono = $this->faker->word();
        $correo = $this->faker->word();
        $verdoc = $this->faker->word();
        $encuViaticos = $this->faker->word();
        $encuTel = $this->faker->word();
        $encuDireccion = $this->faker->word();
        $estatusper = $this->faker->word();
        $sexo = $this->faker->word();
        $edad = $this->faker->word();
        $estadoCivil = $this->faker->word();
        $lugarNacimiento = $this->faker->word();
        $fechaNacimiento = $this->faker->word();
        $escolaridad = $this->faker->word();
        $llamadaEmergencia = $this->faker->word();
        $parentesco = $this->faker->word();
        $telEmergencia = $this->faker->word();
        $hijos = $this->faker->word();
        $nacionalidad = $this->faker->word();
        $viveCon = $this->faker->word();
        $direccion = $this->faker->word();
        $celular = $this->faker->word();
        $otroContacto = $this->faker->word();
        $infonavit = $this->faker->word();
        $fonacot = $this->faker->word();
        $cv = $this->faker->text();
        $img = $this->faker->text();

        $response = $this->post(route('estudios.store'), [
            'idUsuario' => $idUsuario,
            'idEmpresa' => $idEmpresa,
            'nombreCandidato' => $nombreCandidato,
            'apePaterno' => $apePaterno,
            'apeMaterno' => $apeMaterno,
            'puesto' => $puesto,
            'fechaSolicitud' => $fechaSolicitud,
            'valida' => $valida,
            'realizo' => $realizo,
            'foto' => $foto,
            'estatus' => $estatus,
            'rfc' => $rfc,
            'curp' => $curp,
            'archivo' => $archivo,
            'proceso' => $proceso,
            'fechaTermino' => $fechaTermino,
            'motivoCancelacion' => $motivoCancelacion,
            'fechaCancelacion' => $fechaCancelacion,
            'usuarioCancela' => $usuarioCancela,
            'encuestador' => $encuestador,
            'fechaCita' => $fechaCita,
            'horacita' => $horacita,
            'nss' => $nss,
            'tiposervicio' => $tiposervicio,
            'telefono' => $telefono,
            'correo' => $correo,
            'verdoc' => $verdoc,
            'encuViaticos' => $encuViaticos,
            'encuTel' => $encuTel,
            'encuDireccion' => $encuDireccion,
            'estatusper' => $estatusper,
            'sexo' => $sexo,
            'edad' => $edad,
            'estadoCivil' => $estadoCivil,
            'lugarNacimiento' => $lugarNacimiento,
            'fechaNacimiento' => $fechaNacimiento,
            'escolaridad' => $escolaridad,
            'llamadaEmergencia' => $llamadaEmergencia,
            'parentesco' => $parentesco,
            'telEmergencia' => $telEmergencia,
            'hijos' => $hijos,
            'nacionalidad' => $nacionalidad,
            'viveCon' => $viveCon,
            'direccion' => $direccion,
            'celular' => $celular,
            'otroContacto' => $otroContacto,
            'infonavit' => $infonavit,
            'fonacot' => $fonacot,
            'cv' => $cv,
            'img' => $img,
        ]);

        $estudios = Estudio::query()
            ->where('idUsuario', $idUsuario)
            ->where('idEmpresa', $idEmpresa)
            ->where('nombreCandidato', $nombreCandidato)
            ->where('apePaterno', $apePaterno)
            ->where('apeMaterno', $apeMaterno)
            ->where('puesto', $puesto)
            ->where('fechaSolicitud', $fechaSolicitud)
            ->where('valida', $valida)
            ->where('realizo', $realizo)
            ->where('foto', $foto)
            ->where('estatus', $estatus)
            ->where('rfc', $rfc)
            ->where('curp', $curp)
            ->where('archivo', $archivo)
            ->where('proceso', $proceso)
            ->where('fechaTermino', $fechaTermino)
            ->where('motivoCancelacion', $motivoCancelacion)
            ->where('fechaCancelacion', $fechaCancelacion)
            ->where('usuarioCancela', $usuarioCancela)
            ->where('encuestador', $encuestador)
            ->where('fechaCita', $fechaCita)
            ->where('horacita', $horacita)
            ->where('nss', $nss)
            ->where('tiposervicio', $tiposervicio)
            ->where('telefono', $telefono)
            ->where('correo', $correo)
            ->where('verdoc', $verdoc)
            ->where('encuViaticos', $encuViaticos)
            ->where('encuTel', $encuTel)
            ->where('encuDireccion', $encuDireccion)
            ->where('estatusper', $estatusper)
            ->where('sexo', $sexo)
            ->where('edad', $edad)
            ->where('estadoCivil', $estadoCivil)
            ->where('lugarNacimiento', $lugarNacimiento)
            ->where('fechaNacimiento', $fechaNacimiento)
            ->where('escolaridad', $escolaridad)
            ->where('llamadaEmergencia', $llamadaEmergencia)
            ->where('parentesco', $parentesco)
            ->where('telEmergencia', $telEmergencia)
            ->where('hijos', $hijos)
            ->where('nacionalidad', $nacionalidad)
            ->where('viveCon', $viveCon)
            ->where('direccion', $direccion)
            ->where('celular', $celular)
            ->where('otroContacto', $otroContacto)
            ->where('infonavit', $infonavit)
            ->where('fonacot', $fonacot)
            ->where('cv', $cv)
            ->where('img', $img)
            ->get();
        $this->assertCount(1, $estudios);
        $estudio = $estudios->first();

        $response->assertRedirect(route('estudios.index'));
        $response->assertSessionHas('estudio.id', $estudio->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $estudio = Estudios::factory()->create();

        $response = $this->get(route('estudios.show', $estudio));

        $response->assertOk();
        $response->assertViewIs('estudio.show');
        $response->assertViewHas('estudio');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $estudio = Estudios::factory()->create();

        $response = $this->get(route('estudios.edit', $estudio));

        $response->assertOk();
        $response->assertViewIs('estudio.edit');
        $response->assertViewHas('estudio');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\EstudiosController::class,
            'update',
            \App\Http\Requests\EstudiosUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $estudio = Estudios::factory()->create();
        $idUsuario = $this->faker->word();
        $idEmpresa = $this->faker->word();
        $nombreCandidato = $this->faker->word();
        $apePaterno = $this->faker->word();
        $apeMaterno = $this->faker->word();
        $puesto = $this->faker->word();
        $fechaSolicitud = $this->faker->word();
        $valida = $this->faker->word();
        $realizo = $this->faker->word();
        $foto = $this->faker->text();
        $estatus = $this->faker->word();
        $rfc = $this->faker->word();
        $curp = $this->faker->word();
        $archivo = $this->faker->text();
        $proceso = $this->faker->word();
        $fechaTermino = $this->faker->word();
        $motivoCancelacion = $this->faker->text();
        $fechaCancelacion = $this->faker->word();
        $usuarioCancela = $this->faker->word();
        $encuestador = $this->faker->word();
        $fechaCita = $this->faker->word();
        $horacita = $this->faker->word();
        $nss = $this->faker->word();
        $tiposervicio = $this->faker->word();
        $telefono = $this->faker->word();
        $correo = $this->faker->word();
        $verdoc = $this->faker->word();
        $encuViaticos = $this->faker->word();
        $encuTel = $this->faker->word();
        $encuDireccion = $this->faker->word();
        $estatusper = $this->faker->word();
        $sexo = $this->faker->word();
        $edad = $this->faker->word();
        $estadoCivil = $this->faker->word();
        $lugarNacimiento = $this->faker->word();
        $fechaNacimiento = $this->faker->word();
        $escolaridad = $this->faker->word();
        $llamadaEmergencia = $this->faker->word();
        $parentesco = $this->faker->word();
        $telEmergencia = $this->faker->word();
        $hijos = $this->faker->word();
        $nacionalidad = $this->faker->word();
        $viveCon = $this->faker->word();
        $direccion = $this->faker->word();
        $celular = $this->faker->word();
        $otroContacto = $this->faker->word();
        $infonavit = $this->faker->word();
        $fonacot = $this->faker->word();
        $cv = $this->faker->text();
        $img = $this->faker->text();

        $response = $this->put(route('estudios.update', $estudio), [
            'idUsuario' => $idUsuario,
            'idEmpresa' => $idEmpresa,
            'nombreCandidato' => $nombreCandidato,
            'apePaterno' => $apePaterno,
            'apeMaterno' => $apeMaterno,
            'puesto' => $puesto,
            'fechaSolicitud' => $fechaSolicitud,
            'valida' => $valida,
            'realizo' => $realizo,
            'foto' => $foto,
            'estatus' => $estatus,
            'rfc' => $rfc,
            'curp' => $curp,
            'archivo' => $archivo,
            'proceso' => $proceso,
            'fechaTermino' => $fechaTermino,
            'motivoCancelacion' => $motivoCancelacion,
            'fechaCancelacion' => $fechaCancelacion,
            'usuarioCancela' => $usuarioCancela,
            'encuestador' => $encuestador,
            'fechaCita' => $fechaCita,
            'horacita' => $horacita,
            'nss' => $nss,
            'tiposervicio' => $tiposervicio,
            'telefono' => $telefono,
            'correo' => $correo,
            'verdoc' => $verdoc,
            'encuViaticos' => $encuViaticos,
            'encuTel' => $encuTel,
            'encuDireccion' => $encuDireccion,
            'estatusper' => $estatusper,
            'sexo' => $sexo,
            'edad' => $edad,
            'estadoCivil' => $estadoCivil,
            'lugarNacimiento' => $lugarNacimiento,
            'fechaNacimiento' => $fechaNacimiento,
            'escolaridad' => $escolaridad,
            'llamadaEmergencia' => $llamadaEmergencia,
            'parentesco' => $parentesco,
            'telEmergencia' => $telEmergencia,
            'hijos' => $hijos,
            'nacionalidad' => $nacionalidad,
            'viveCon' => $viveCon,
            'direccion' => $direccion,
            'celular' => $celular,
            'otroContacto' => $otroContacto,
            'infonavit' => $infonavit,
            'fonacot' => $fonacot,
            'cv' => $cv,
            'img' => $img,
        ]);

        $estudio->refresh();

        $response->assertRedirect(route('estudios.index'));
        $response->assertSessionHas('estudio.id', $estudio->id);

        $this->assertEquals($idUsuario, $estudio->idUsuario);
        $this->assertEquals($idEmpresa, $estudio->idEmpresa);
        $this->assertEquals($nombreCandidato, $estudio->nombreCandidato);
        $this->assertEquals($apePaterno, $estudio->apePaterno);
        $this->assertEquals($apeMaterno, $estudio->apeMaterno);
        $this->assertEquals($puesto, $estudio->puesto);
        $this->assertEquals($fechaSolicitud, $estudio->fechaSolicitud);
        $this->assertEquals($valida, $estudio->valida);
        $this->assertEquals($realizo, $estudio->realizo);
        $this->assertEquals($foto, $estudio->foto);
        $this->assertEquals($estatus, $estudio->estatus);
        $this->assertEquals($rfc, $estudio->rfc);
        $this->assertEquals($curp, $estudio->curp);
        $this->assertEquals($archivo, $estudio->archivo);
        $this->assertEquals($proceso, $estudio->proceso);
        $this->assertEquals($fechaTermino, $estudio->fechaTermino);
        $this->assertEquals($motivoCancelacion, $estudio->motivoCancelacion);
        $this->assertEquals($fechaCancelacion, $estudio->fechaCancelacion);
        $this->assertEquals($usuarioCancela, $estudio->usuarioCancela);
        $this->assertEquals($encuestador, $estudio->encuestador);
        $this->assertEquals($fechaCita, $estudio->fechaCita);
        $this->assertEquals($horacita, $estudio->horacita);
        $this->assertEquals($nss, $estudio->nss);
        $this->assertEquals($tiposervicio, $estudio->tiposervicio);
        $this->assertEquals($telefono, $estudio->telefono);
        $this->assertEquals($correo, $estudio->correo);
        $this->assertEquals($verdoc, $estudio->verdoc);
        $this->assertEquals($encuViaticos, $estudio->encuViaticos);
        $this->assertEquals($encuTel, $estudio->encuTel);
        $this->assertEquals($encuDireccion, $estudio->encuDireccion);
        $this->assertEquals($estatusper, $estudio->estatusper);
        $this->assertEquals($sexo, $estudio->sexo);
        $this->assertEquals($edad, $estudio->edad);
        $this->assertEquals($estadoCivil, $estudio->estadoCivil);
        $this->assertEquals($lugarNacimiento, $estudio->lugarNacimiento);
        $this->assertEquals($fechaNacimiento, $estudio->fechaNacimiento);
        $this->assertEquals($escolaridad, $estudio->escolaridad);
        $this->assertEquals($llamadaEmergencia, $estudio->llamadaEmergencia);
        $this->assertEquals($parentesco, $estudio->parentesco);
        $this->assertEquals($telEmergencia, $estudio->telEmergencia);
        $this->assertEquals($hijos, $estudio->hijos);
        $this->assertEquals($nacionalidad, $estudio->nacionalidad);
        $this->assertEquals($viveCon, $estudio->viveCon);
        $this->assertEquals($direccion, $estudio->direccion);
        $this->assertEquals($celular, $estudio->celular);
        $this->assertEquals($otroContacto, $estudio->otroContacto);
        $this->assertEquals($infonavit, $estudio->infonavit);
        $this->assertEquals($fonacot, $estudio->fonacot);
        $this->assertEquals($cv, $estudio->cv);
        $this->assertEquals($img, $estudio->img);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $estudio = Estudios::factory()->create();
        $estudio = Estudio::factory()->create();

        $response = $this->delete(route('estudios.destroy', $estudio));

        $response->assertRedirect(route('estudios.index'));

        $this->assertModelMissing($estudio);
    }
}
