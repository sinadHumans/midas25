<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Investigacione;
use App\Models\Investigaciones;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\InvestigacionesController
 */
final class InvestigacionesControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $investigaciones = Investigaciones::factory()->count(3)->create();

        $response = $this->get(route('investigaciones.index'));

        $response->assertOk();
        $response->assertViewIs('investigacione.index');
        $response->assertViewHas('investigaciones');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('investigaciones.create'));

        $response->assertOk();
        $response->assertViewIs('investigacione.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\InvestigacionesController::class,
            'store',
            \App\Http\Requests\InvestigacionesStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $cuentaConstancia = $this->faker->word();
        $proporciono = $this->faker->word();
        $casoNo = $this->faker->word();
        $demandado = $this->faker->word();
        $actualmente = $this->faker->word();
        $estabilidad = $this->faker->word();
        $inactividad = $this->faker->word();
        $registoPatronal = $this->faker->word();
        $referenciayPeriodos = $this->faker->word();
        $dosEmpleos = $this->faker->word();
        $ausentismo = $this->faker->word();
        $abandono = $this->faker->word();
        $desempenoRegular = $this->faker->word();
        $omitio = $this->faker->word();
        $informacion = $this->faker->word();
        $referencias = $this->faker->word();
        $confiable = $this->faker->word();
        $comentarios = $this->faker->text();
        $notasLegales = $this->faker->word();
        $idUsuario = $this->faker->word();

        $response = $this->post(route('investigaciones.store'), [
            'cuentaConstancia' => $cuentaConstancia,
            'proporciono' => $proporciono,
            'casoNo' => $casoNo,
            'demandado' => $demandado,
            'actualmente' => $actualmente,
            'estabilidad' => $estabilidad,
            'inactividad' => $inactividad,
            'registoPatronal' => $registoPatronal,
            'referenciayPeriodos' => $referenciayPeriodos,
            'dosEmpleos' => $dosEmpleos,
            'ausentismo' => $ausentismo,
            'abandono' => $abandono,
            'desempenoRegular' => $desempenoRegular,
            'omitio' => $omitio,
            'informacion' => $informacion,
            'referencias' => $referencias,
            'confiable' => $confiable,
            'comentarios' => $comentarios,
            'notasLegales' => $notasLegales,
            'idUsuario' => $idUsuario,
        ]);

        $investigaciones = Investigacione::query()
            ->where('cuentaConstancia', $cuentaConstancia)
            ->where('proporciono', $proporciono)
            ->where('casoNo', $casoNo)
            ->where('demandado', $demandado)
            ->where('actualmente', $actualmente)
            ->where('estabilidad', $estabilidad)
            ->where('inactividad', $inactividad)
            ->where('registoPatronal', $registoPatronal)
            ->where('referenciayPeriodos', $referenciayPeriodos)
            ->where('dosEmpleos', $dosEmpleos)
            ->where('ausentismo', $ausentismo)
            ->where('abandono', $abandono)
            ->where('desempenoRegular', $desempenoRegular)
            ->where('omitio', $omitio)
            ->where('informacion', $informacion)
            ->where('referencias', $referencias)
            ->where('confiable', $confiable)
            ->where('comentarios', $comentarios)
            ->where('notasLegales', $notasLegales)
            ->where('idUsuario', $idUsuario)
            ->get();
        $this->assertCount(1, $investigaciones);
        $investigacione = $investigaciones->first();

        $response->assertRedirect(route('investigaciones.index'));
        $response->assertSessionHas('investigacione.id', $investigacione->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $investigacione = Investigaciones::factory()->create();

        $response = $this->get(route('investigaciones.show', $investigacione));

        $response->assertOk();
        $response->assertViewIs('investigacione.show');
        $response->assertViewHas('investigacione');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $investigacione = Investigaciones::factory()->create();

        $response = $this->get(route('investigaciones.edit', $investigacione));

        $response->assertOk();
        $response->assertViewIs('investigacione.edit');
        $response->assertViewHas('investigacione');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\InvestigacionesController::class,
            'update',
            \App\Http\Requests\InvestigacionesUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $investigacione = Investigaciones::factory()->create();
        $cuentaConstancia = $this->faker->word();
        $proporciono = $this->faker->word();
        $casoNo = $this->faker->word();
        $demandado = $this->faker->word();
        $actualmente = $this->faker->word();
        $estabilidad = $this->faker->word();
        $inactividad = $this->faker->word();
        $registoPatronal = $this->faker->word();
        $referenciayPeriodos = $this->faker->word();
        $dosEmpleos = $this->faker->word();
        $ausentismo = $this->faker->word();
        $abandono = $this->faker->word();
        $desempenoRegular = $this->faker->word();
        $omitio = $this->faker->word();
        $informacion = $this->faker->word();
        $referencias = $this->faker->word();
        $confiable = $this->faker->word();
        $comentarios = $this->faker->text();
        $notasLegales = $this->faker->word();
        $idUsuario = $this->faker->word();

        $response = $this->put(route('investigaciones.update', $investigacione), [
            'cuentaConstancia' => $cuentaConstancia,
            'proporciono' => $proporciono,
            'casoNo' => $casoNo,
            'demandado' => $demandado,
            'actualmente' => $actualmente,
            'estabilidad' => $estabilidad,
            'inactividad' => $inactividad,
            'registoPatronal' => $registoPatronal,
            'referenciayPeriodos' => $referenciayPeriodos,
            'dosEmpleos' => $dosEmpleos,
            'ausentismo' => $ausentismo,
            'abandono' => $abandono,
            'desempenoRegular' => $desempenoRegular,
            'omitio' => $omitio,
            'informacion' => $informacion,
            'referencias' => $referencias,
            'confiable' => $confiable,
            'comentarios' => $comentarios,
            'notasLegales' => $notasLegales,
            'idUsuario' => $idUsuario,
        ]);

        $investigacione->refresh();

        $response->assertRedirect(route('investigaciones.index'));
        $response->assertSessionHas('investigacione.id', $investigacione->id);

        $this->assertEquals($cuentaConstancia, $investigacione->cuentaConstancia);
        $this->assertEquals($proporciono, $investigacione->proporciono);
        $this->assertEquals($casoNo, $investigacione->casoNo);
        $this->assertEquals($demandado, $investigacione->demandado);
        $this->assertEquals($actualmente, $investigacione->actualmente);
        $this->assertEquals($estabilidad, $investigacione->estabilidad);
        $this->assertEquals($inactividad, $investigacione->inactividad);
        $this->assertEquals($registoPatronal, $investigacione->registoPatronal);
        $this->assertEquals($referenciayPeriodos, $investigacione->referenciayPeriodos);
        $this->assertEquals($dosEmpleos, $investigacione->dosEmpleos);
        $this->assertEquals($ausentismo, $investigacione->ausentismo);
        $this->assertEquals($abandono, $investigacione->abandono);
        $this->assertEquals($desempenoRegular, $investigacione->desempenoRegular);
        $this->assertEquals($omitio, $investigacione->omitio);
        $this->assertEquals($informacion, $investigacione->informacion);
        $this->assertEquals($referencias, $investigacione->referencias);
        $this->assertEquals($confiable, $investigacione->confiable);
        $this->assertEquals($comentarios, $investigacione->comentarios);
        $this->assertEquals($notasLegales, $investigacione->notasLegales);
        $this->assertEquals($idUsuario, $investigacione->idUsuario);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $investigacione = Investigaciones::factory()->create();
        $investigacione = Investigacione::factory()->create();

        $response = $this->delete(route('investigaciones.destroy', $investigacione));

        $response->assertRedirect(route('investigaciones.index'));

        $this->assertModelMissing($investigacione);
    }
}
