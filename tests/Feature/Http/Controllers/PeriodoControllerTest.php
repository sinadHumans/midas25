<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Periodo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\PeriodoController
 */
final class PeriodoControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $periodos = Periodo::factory()->count(3)->create();

        $response = $this->get(route('periodos.index'));

        $response->assertOk();
        $response->assertViewIs('periodo.index');
        $response->assertViewHas('periodos');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('periodos.create'));

        $response->assertOk();
        $response->assertViewIs('periodo.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PeriodoController::class,
            'store',
            \App\Http\Requests\PeriodoStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $inicio = $this->faker->word();
        $termino = $this->faker->word();
        $motivo = $this->faker->text();
        $comentarios = $this->faker->text();
        $idUsuario = $this->faker->word();
        $idEstudio = $this->faker->word();

        $response = $this->post(route('periodos.store'), [
            'inicio' => $inicio,
            'termino' => $termino,
            'motivo' => $motivo,
            'comentarios' => $comentarios,
            'idUsuario' => $idUsuario,
            'idEstudio' => $idEstudio,
        ]);

        $periodos = Periodo::query()
            ->where('inicio', $inicio)
            ->where('termino', $termino)
            ->where('motivo', $motivo)
            ->where('comentarios', $comentarios)
            ->where('idUsuario', $idUsuario)
            ->where('idEstudio', $idEstudio)
            ->get();
        $this->assertCount(1, $periodos);
        $periodo = $periodos->first();

        $response->assertRedirect(route('periodos.index'));
        $response->assertSessionHas('periodo.id', $periodo->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $periodo = Periodo::factory()->create();

        $response = $this->get(route('periodos.show', $periodo));

        $response->assertOk();
        $response->assertViewIs('periodo.show');
        $response->assertViewHas('periodo');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $periodo = Periodo::factory()->create();

        $response = $this->get(route('periodos.edit', $periodo));

        $response->assertOk();
        $response->assertViewIs('periodo.edit');
        $response->assertViewHas('periodo');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PeriodoController::class,
            'update',
            \App\Http\Requests\PeriodoUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $periodo = Periodo::factory()->create();
        $inicio = $this->faker->word();
        $termino = $this->faker->word();
        $motivo = $this->faker->text();
        $comentarios = $this->faker->text();
        $idUsuario = $this->faker->word();
        $idEstudio = $this->faker->word();

        $response = $this->put(route('periodos.update', $periodo), [
            'inicio' => $inicio,
            'termino' => $termino,
            'motivo' => $motivo,
            'comentarios' => $comentarios,
            'idUsuario' => $idUsuario,
            'idEstudio' => $idEstudio,
        ]);

        $periodo->refresh();

        $response->assertRedirect(route('periodos.index'));
        $response->assertSessionHas('periodo.id', $periodo->id);

        $this->assertEquals($inicio, $periodo->inicio);
        $this->assertEquals($termino, $periodo->termino);
        $this->assertEquals($motivo, $periodo->motivo);
        $this->assertEquals($comentarios, $periodo->comentarios);
        $this->assertEquals($idUsuario, $periodo->idUsuario);
        $this->assertEquals($idEstudio, $periodo->idEstudio);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $periodo = Periodo::factory()->create();

        $response = $this->delete(route('periodos.destroy', $periodo));

        $response->assertRedirect(route('periodos.index'));

        $this->assertModelMissing($periodo);
    }
}
