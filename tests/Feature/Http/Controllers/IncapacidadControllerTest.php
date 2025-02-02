<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Incapacidad;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\IncapacidadController
 */
final class IncapacidadControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $incapacidads = Incapacidad::factory()->count(3)->create();

        $response = $this->get(route('incapacidads.index'));

        $response->assertOk();
        $response->assertViewIs('incapacidad.index');
        $response->assertViewHas('incapacidads');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('incapacidads.create'));

        $response->assertOk();
        $response->assertViewIs('incapacidad.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\IncapacidadController::class,
            'store',
            \App\Http\Requests\IncapacidadStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $nombre = $this->faker->word();
        $periodo = $this->faker->word();
        $idUsuario = $this->faker->word();
        $idEstudio = $this->faker->word();
        $motivo = $this->faker->text();

        $response = $this->post(route('incapacidads.store'), [
            'nombre' => $nombre,
            'periodo' => $periodo,
            'idUsuario' => $idUsuario,
            'idEstudio' => $idEstudio,
            'motivo' => $motivo,
        ]);

        $incapacidads = Incapacidad::query()
            ->where('nombre', $nombre)
            ->where('periodo', $periodo)
            ->where('idUsuario', $idUsuario)
            ->where('idEstudio', $idEstudio)
            ->where('motivo', $motivo)
            ->get();
        $this->assertCount(1, $incapacidads);
        $incapacidad = $incapacidads->first();

        $response->assertRedirect(route('incapacidads.index'));
        $response->assertSessionHas('incapacidad.id', $incapacidad->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $incapacidad = Incapacidad::factory()->create();

        $response = $this->get(route('incapacidads.show', $incapacidad));

        $response->assertOk();
        $response->assertViewIs('incapacidad.show');
        $response->assertViewHas('incapacidad');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $incapacidad = Incapacidad::factory()->create();

        $response = $this->get(route('incapacidads.edit', $incapacidad));

        $response->assertOk();
        $response->assertViewIs('incapacidad.edit');
        $response->assertViewHas('incapacidad');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\IncapacidadController::class,
            'update',
            \App\Http\Requests\IncapacidadUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $incapacidad = Incapacidad::factory()->create();
        $nombre = $this->faker->word();
        $periodo = $this->faker->word();
        $idUsuario = $this->faker->word();
        $idEstudio = $this->faker->word();
        $motivo = $this->faker->text();

        $response = $this->put(route('incapacidads.update', $incapacidad), [
            'nombre' => $nombre,
            'periodo' => $periodo,
            'idUsuario' => $idUsuario,
            'idEstudio' => $idEstudio,
            'motivo' => $motivo,
        ]);

        $incapacidad->refresh();

        $response->assertRedirect(route('incapacidads.index'));
        $response->assertSessionHas('incapacidad.id', $incapacidad->id);

        $this->assertEquals($nombre, $incapacidad->nombre);
        $this->assertEquals($periodo, $incapacidad->periodo);
        $this->assertEquals($idUsuario, $incapacidad->idUsuario);
        $this->assertEquals($idEstudio, $incapacidad->idEstudio);
        $this->assertEquals($motivo, $incapacidad->motivo);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $incapacidad = Incapacidad::factory()->create();

        $response = $this->delete(route('incapacidads.destroy', $incapacidad));

        $response->assertRedirect(route('incapacidads.index'));

        $this->assertModelMissing($incapacidad);
    }
}
