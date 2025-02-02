<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Historiallaboral;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\HistoriallaboralController
 */
final class HistoriallaboralControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $historiallaborals = Historiallaboral::factory()->count(3)->create();

        $response = $this->get(route('historiallaborals.index'));

        $response->assertOk();
        $response->assertViewIs('historiallaboral.index');
        $response->assertViewHas('historiallaborals');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('historiallaborals.create'));

        $response->assertOk();
        $response->assertViewIs('historiallaboral.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\HistoriallaboralController::class,
            'store',
            \App\Http\Requests\HistoriallaboralStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $ultimo = $this->faker->word();
        $vida = $this->faker->word();
        $nusemana = $this->faker->word();
        $porcentaje = $this->faker->word();
        $numeroempleadores = $this->faker->word();
        $progresion = $this->faker->word();
        $finiquito = $this->faker->word();
        $liquidacion = $this->faker->word();
        $aguinaldo = $this->faker->word();
        $vacaciones = $this->faker->word();
        $comentarios = $this->faker->word();
        $idUsuario = $this->faker->word();
        $idEstudio = $this->faker->word();

        $response = $this->post(route('historiallaborals.store'), [
            'ultimo' => $ultimo,
            'vida' => $vida,
            'nusemana' => $nusemana,
            'porcentaje' => $porcentaje,
            'numeroempleadores' => $numeroempleadores,
            'progresion' => $progresion,
            'finiquito' => $finiquito,
            'liquidacion' => $liquidacion,
            'aguinaldo' => $aguinaldo,
            'vacaciones' => $vacaciones,
            'comentarios' => $comentarios,
            'idUsuario' => $idUsuario,
            'idEstudio' => $idEstudio,
        ]);

        $historiallaborals = Historiallaboral::query()
            ->where('ultimo', $ultimo)
            ->where('vida', $vida)
            ->where('nusemana', $nusemana)
            ->where('porcentaje', $porcentaje)
            ->where('numeroempleadores', $numeroempleadores)
            ->where('progresion', $progresion)
            ->where('finiquito', $finiquito)
            ->where('liquidacion', $liquidacion)
            ->where('aguinaldo', $aguinaldo)
            ->where('vacaciones', $vacaciones)
            ->where('comentarios', $comentarios)
            ->where('idUsuario', $idUsuario)
            ->where('idEstudio', $idEstudio)
            ->get();
        $this->assertCount(1, $historiallaborals);
        $historiallaboral = $historiallaborals->first();

        $response->assertRedirect(route('historiallaborals.index'));
        $response->assertSessionHas('historiallaboral.id', $historiallaboral->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $historiallaboral = Historiallaboral::factory()->create();

        $response = $this->get(route('historiallaborals.show', $historiallaboral));

        $response->assertOk();
        $response->assertViewIs('historiallaboral.show');
        $response->assertViewHas('historiallaboral');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $historiallaboral = Historiallaboral::factory()->create();

        $response = $this->get(route('historiallaborals.edit', $historiallaboral));

        $response->assertOk();
        $response->assertViewIs('historiallaboral.edit');
        $response->assertViewHas('historiallaboral');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\HistoriallaboralController::class,
            'update',
            \App\Http\Requests\HistoriallaboralUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $historiallaboral = Historiallaboral::factory()->create();
        $ultimo = $this->faker->word();
        $vida = $this->faker->word();
        $nusemana = $this->faker->word();
        $porcentaje = $this->faker->word();
        $numeroempleadores = $this->faker->word();
        $progresion = $this->faker->word();
        $finiquito = $this->faker->word();
        $liquidacion = $this->faker->word();
        $aguinaldo = $this->faker->word();
        $vacaciones = $this->faker->word();
        $comentarios = $this->faker->word();
        $idUsuario = $this->faker->word();
        $idEstudio = $this->faker->word();

        $response = $this->put(route('historiallaborals.update', $historiallaboral), [
            'ultimo' => $ultimo,
            'vida' => $vida,
            'nusemana' => $nusemana,
            'porcentaje' => $porcentaje,
            'numeroempleadores' => $numeroempleadores,
            'progresion' => $progresion,
            'finiquito' => $finiquito,
            'liquidacion' => $liquidacion,
            'aguinaldo' => $aguinaldo,
            'vacaciones' => $vacaciones,
            'comentarios' => $comentarios,
            'idUsuario' => $idUsuario,
            'idEstudio' => $idEstudio,
        ]);

        $historiallaboral->refresh();

        $response->assertRedirect(route('historiallaborals.index'));
        $response->assertSessionHas('historiallaboral.id', $historiallaboral->id);

        $this->assertEquals($ultimo, $historiallaboral->ultimo);
        $this->assertEquals($vida, $historiallaboral->vida);
        $this->assertEquals($nusemana, $historiallaboral->nusemana);
        $this->assertEquals($porcentaje, $historiallaboral->porcentaje);
        $this->assertEquals($numeroempleadores, $historiallaboral->numeroempleadores);
        $this->assertEquals($progresion, $historiallaboral->progresion);
        $this->assertEquals($finiquito, $historiallaboral->finiquito);
        $this->assertEquals($liquidacion, $historiallaboral->liquidacion);
        $this->assertEquals($aguinaldo, $historiallaboral->aguinaldo);
        $this->assertEquals($vacaciones, $historiallaboral->vacaciones);
        $this->assertEquals($comentarios, $historiallaboral->comentarios);
        $this->assertEquals($idUsuario, $historiallaboral->idUsuario);
        $this->assertEquals($idEstudio, $historiallaboral->idEstudio);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $historiallaboral = Historiallaboral::factory()->create();

        $response = $this->delete(route('historiallaborals.destroy', $historiallaboral));

        $response->assertRedirect(route('historiallaborals.index'));

        $this->assertModelMissing($historiallaboral);
    }
}
