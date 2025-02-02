<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Nivelacademico;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\NivelacademicoController
 */
final class NivelacademicoControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $nivelacademicos = Nivelacademico::factory()->count(3)->create();

        $response = $this->get(route('nivelacademicos.index'));

        $response->assertOk();
        $response->assertViewIs('nivelacademico.index');
        $response->assertViewHas('nivelacademicos');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('nivelacademicos.create'));

        $response->assertOk();
        $response->assertViewIs('nivelacademico.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\NivelacademicoController::class,
            'store',
            \App\Http\Requests\NivelacademicoStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $ultimo = $this->faker->word();
        $periodo = $this->faker->word();
        $profesional = $this->faker->word();
        $cedula = $this->faker->word();
        $especialidad = $this->faker->word();
        $caso = $this->faker->word();
        $idUsuario = $this->faker->word();
        $idEstudio = $this->faker->word();
        $otros = $this->faker->text();

        $response = $this->post(route('nivelacademicos.store'), [
            'ultimo' => $ultimo,
            'periodo' => $periodo,
            'profesional' => $profesional,
            'cedula' => $cedula,
            'especialidad' => $especialidad,
            'caso' => $caso,
            'idUsuario' => $idUsuario,
            'idEstudio' => $idEstudio,
            'otros' => $otros,
        ]);

        $nivelacademicos = Nivelacademico::query()
            ->where('ultimo', $ultimo)
            ->where('periodo', $periodo)
            ->where('profesional', $profesional)
            ->where('cedula', $cedula)
            ->where('especialidad', $especialidad)
            ->where('caso', $caso)
            ->where('idUsuario', $idUsuario)
            ->where('idEstudio', $idEstudio)
            ->where('otros', $otros)
            ->get();
        $this->assertCount(1, $nivelacademicos);
        $nivelacademico = $nivelacademicos->first();

        $response->assertRedirect(route('nivelacademicos.index'));
        $response->assertSessionHas('nivelacademico.id', $nivelacademico->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $nivelacademico = Nivelacademico::factory()->create();

        $response = $this->get(route('nivelacademicos.show', $nivelacademico));

        $response->assertOk();
        $response->assertViewIs('nivelacademico.show');
        $response->assertViewHas('nivelacademico');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $nivelacademico = Nivelacademico::factory()->create();

        $response = $this->get(route('nivelacademicos.edit', $nivelacademico));

        $response->assertOk();
        $response->assertViewIs('nivelacademico.edit');
        $response->assertViewHas('nivelacademico');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\NivelacademicoController::class,
            'update',
            \App\Http\Requests\NivelacademicoUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $nivelacademico = Nivelacademico::factory()->create();
        $ultimo = $this->faker->word();
        $periodo = $this->faker->word();
        $profesional = $this->faker->word();
        $cedula = $this->faker->word();
        $especialidad = $this->faker->word();
        $caso = $this->faker->word();
        $idUsuario = $this->faker->word();
        $idEstudio = $this->faker->word();
        $otros = $this->faker->text();

        $response = $this->put(route('nivelacademicos.update', $nivelacademico), [
            'ultimo' => $ultimo,
            'periodo' => $periodo,
            'profesional' => $profesional,
            'cedula' => $cedula,
            'especialidad' => $especialidad,
            'caso' => $caso,
            'idUsuario' => $idUsuario,
            'idEstudio' => $idEstudio,
            'otros' => $otros,
        ]);

        $nivelacademico->refresh();

        $response->assertRedirect(route('nivelacademicos.index'));
        $response->assertSessionHas('nivelacademico.id', $nivelacademico->id);

        $this->assertEquals($ultimo, $nivelacademico->ultimo);
        $this->assertEquals($periodo, $nivelacademico->periodo);
        $this->assertEquals($profesional, $nivelacademico->profesional);
        $this->assertEquals($cedula, $nivelacademico->cedula);
        $this->assertEquals($especialidad, $nivelacademico->especialidad);
        $this->assertEquals($caso, $nivelacademico->caso);
        $this->assertEquals($idUsuario, $nivelacademico->idUsuario);
        $this->assertEquals($idEstudio, $nivelacademico->idEstudio);
        $this->assertEquals($otros, $nivelacademico->otros);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $nivelacademico = Nivelacademico::factory()->create();

        $response = $this->delete(route('nivelacademicos.destroy', $nivelacademico));

        $response->assertRedirect(route('nivelacademicos.index'));

        $this->assertModelMissing($nivelacademico);
    }
}
