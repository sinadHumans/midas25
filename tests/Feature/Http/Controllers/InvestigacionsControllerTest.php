<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Investigacion;
use App\Models\Investigacions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\InvestigacionsController
 */
final class InvestigacionsControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $investigacions = Investigacions::factory()->count(3)->create();

        $response = $this->get(route('investigacions.index'));

        $response->assertOk();
        $response->assertViewIs('investigacion.index');
        $response->assertViewHas('investigacions');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('investigacions.create'));

        $response->assertOk();
        $response->assertViewIs('investigacion.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\InvestigacionsController::class,
            'store',
            \App\Http\Requests\InvestigacionsStoreRequest::class
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

        $response = $this->post(route('investigacions.store'), [
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

        $investigacions = Investigacion::query()
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
        $this->assertCount(1, $investigacions);
        $investigacion = $investigacions->first();

        $response->assertRedirect(route('investigacions.index'));
        $response->assertSessionHas('investigacion.id', $investigacion->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $investigacion = Investigacions::factory()->create();

        $response = $this->get(route('investigacions.show', $investigacion));

        $response->assertOk();
        $response->assertViewIs('investigacion.show');
        $response->assertViewHas('investigacion');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $investigacion = Investigacions::factory()->create();

        $response = $this->get(route('investigacions.edit', $investigacion));

        $response->assertOk();
        $response->assertViewIs('investigacion.edit');
        $response->assertViewHas('investigacion');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\InvestigacionsController::class,
            'update',
            \App\Http\Requests\InvestigacionsUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $investigacion = Investigacions::factory()->create();
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

        $response = $this->put(route('investigacions.update', $investigacion), [
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

        $investigacion->refresh();

        $response->assertRedirect(route('investigacions.index'));
        $response->assertSessionHas('investigacion.id', $investigacion->id);

        $this->assertEquals($cuentaConstancia, $investigacion->cuentaConstancia);
        $this->assertEquals($proporciono, $investigacion->proporciono);
        $this->assertEquals($casoNo, $investigacion->casoNo);
        $this->assertEquals($demandado, $investigacion->demandado);
        $this->assertEquals($actualmente, $investigacion->actualmente);
        $this->assertEquals($estabilidad, $investigacion->estabilidad);
        $this->assertEquals($inactividad, $investigacion->inactividad);
        $this->assertEquals($registoPatronal, $investigacion->registoPatronal);
        $this->assertEquals($referenciayPeriodos, $investigacion->referenciayPeriodos);
        $this->assertEquals($dosEmpleos, $investigacion->dosEmpleos);
        $this->assertEquals($ausentismo, $investigacion->ausentismo);
        $this->assertEquals($abandono, $investigacion->abandono);
        $this->assertEquals($desempenoRegular, $investigacion->desempenoRegular);
        $this->assertEquals($omitio, $investigacion->omitio);
        $this->assertEquals($informacion, $investigacion->informacion);
        $this->assertEquals($referencias, $investigacion->referencias);
        $this->assertEquals($confiable, $investigacion->confiable);
        $this->assertEquals($comentarios, $investigacion->comentarios);
        $this->assertEquals($notasLegales, $investigacion->notasLegales);
        $this->assertEquals($idUsuario, $investigacion->idUsuario);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $investigacion = Investigacions::factory()->create();
        $investigacion = Investigacion::factory()->create();

        $response = $this->delete(route('investigacions.destroy', $investigacion));

        $response->assertRedirect(route('investigacions.index'));

        $this->assertModelMissing($investigacion);
    }
}
