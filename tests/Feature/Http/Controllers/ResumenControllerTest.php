<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Resuman;
use App\Models\Resumen;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ResumenController
 */
final class ResumenControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $resumen = Resumen::factory()->count(3)->create();

        $response = $this->get(route('resumen.index'));

        $response->assertOk();
        $response->assertViewIs('resuman.index');
        $response->assertViewHas('resumen');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('resumen.create'));

        $response->assertOk();
        $response->assertViewIs('resuman.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ResumenController::class,
            'store',
            \App\Http\Requests\ResumenStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $idEstudio = $this->faker->word();
        $social = $this->faker->word();
        $escolar = $this->faker->word();
        $economica = $this->faker->word();
        $laboral = $this->faker->word();
        $actitud = $this->faker->word();
        $observaciones = $this->faker->text();
        $recomendacion = $this->faker->text();
        $idUsuario = $this->faker->word();
        $observacionesPersonal = $this->faker->text();
        $observacionesLaboral = $this->faker->text();
        $cali = $this->faker->word();

        $response = $this->post(route('resumen.store'), [
            'idEstudio' => $idEstudio,
            'social' => $social,
            'escolar' => $escolar,
            'economica' => $economica,
            'laboral' => $laboral,
            'actitud' => $actitud,
            'observaciones' => $observaciones,
            'recomendacion' => $recomendacion,
            'idUsuario' => $idUsuario,
            'observacionesPersonal' => $observacionesPersonal,
            'observacionesLaboral' => $observacionesLaboral,
            'cali' => $cali,
        ]);

        $resumen = Resuman::query()
            ->where('idEstudio', $idEstudio)
            ->where('social', $social)
            ->where('escolar', $escolar)
            ->where('economica', $economica)
            ->where('laboral', $laboral)
            ->where('actitud', $actitud)
            ->where('observaciones', $observaciones)
            ->where('recomendacion', $recomendacion)
            ->where('idUsuario', $idUsuario)
            ->where('observacionesPersonal', $observacionesPersonal)
            ->where('observacionesLaboral', $observacionesLaboral)
            ->where('cali', $cali)
            ->get();
        $this->assertCount(1, $resumen);
        $resuman = $resumen->first();

        $response->assertRedirect(route('resumen.index'));
        $response->assertSessionHas('resuman.id', $resuman->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $resuman = Resumen::factory()->create();

        $response = $this->get(route('resumen.show', $resuman));

        $response->assertOk();
        $response->assertViewIs('resuman.show');
        $response->assertViewHas('resuman');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $resuman = Resumen::factory()->create();

        $response = $this->get(route('resumen.edit', $resuman));

        $response->assertOk();
        $response->assertViewIs('resuman.edit');
        $response->assertViewHas('resuman');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ResumenController::class,
            'update',
            \App\Http\Requests\ResumenUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $resuman = Resumen::factory()->create();
        $idEstudio = $this->faker->word();
        $social = $this->faker->word();
        $escolar = $this->faker->word();
        $economica = $this->faker->word();
        $laboral = $this->faker->word();
        $actitud = $this->faker->word();
        $observaciones = $this->faker->text();
        $recomendacion = $this->faker->text();
        $idUsuario = $this->faker->word();
        $observacionesPersonal = $this->faker->text();
        $observacionesLaboral = $this->faker->text();
        $cali = $this->faker->word();

        $response = $this->put(route('resumen.update', $resuman), [
            'idEstudio' => $idEstudio,
            'social' => $social,
            'escolar' => $escolar,
            'economica' => $economica,
            'laboral' => $laboral,
            'actitud' => $actitud,
            'observaciones' => $observaciones,
            'recomendacion' => $recomendacion,
            'idUsuario' => $idUsuario,
            'observacionesPersonal' => $observacionesPersonal,
            'observacionesLaboral' => $observacionesLaboral,
            'cali' => $cali,
        ]);

        $resuman->refresh();

        $response->assertRedirect(route('resumen.index'));
        $response->assertSessionHas('resuman.id', $resuman->id);

        $this->assertEquals($idEstudio, $resuman->idEstudio);
        $this->assertEquals($social, $resuman->social);
        $this->assertEquals($escolar, $resuman->escolar);
        $this->assertEquals($economica, $resuman->economica);
        $this->assertEquals($laboral, $resuman->laboral);
        $this->assertEquals($actitud, $resuman->actitud);
        $this->assertEquals($observaciones, $resuman->observaciones);
        $this->assertEquals($recomendacion, $resuman->recomendacion);
        $this->assertEquals($idUsuario, $resuman->idUsuario);
        $this->assertEquals($observacionesPersonal, $resuman->observacionesPersonal);
        $this->assertEquals($observacionesLaboral, $resuman->observacionesLaboral);
        $this->assertEquals($cali, $resuman->cali);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $resuman = Resumen::factory()->create();
        $resuman = Resuman::factory()->create();

        $response = $this->delete(route('resumen.destroy', $resuman));

        $response->assertRedirect(route('resumen.index'));

        $this->assertModelMissing($resuman);
    }
}
