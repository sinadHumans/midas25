<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\GradoEstudio;
use App\Models\GradoEstudios;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\GradoEstudiosController
 */
final class GradoEstudiosControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $gradoEstudios = GradoEstudios::factory()->count(3)->create();

        $response = $this->get(route('grado-estudios.index'));

        $response->assertOk();
        $response->assertViewIs('gradoEstudio.index');
        $response->assertViewHas('gradoEstudios');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('grado-estudios.create'));

        $response->assertOk();
        $response->assertViewIs('gradoEstudio.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\GradoEstudiosController::class,
            'store',
            \App\Http\Requests\GradoEstudiosStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $grado = $this->faker->word();
        $nombre = $this->faker->word();
        $lugar = $this->faker->word();
        $periodo = $this->faker->word();
        $documento = $this->faker->word();
        $folio = $this->faker->word();
        $idUsuario = $this->faker->word();

        $response = $this->post(route('grado-estudios.store'), [
            'grado' => $grado,
            'nombre' => $nombre,
            'lugar' => $lugar,
            'periodo' => $periodo,
            'documento' => $documento,
            'folio' => $folio,
            'idUsuario' => $idUsuario,
        ]);

        $gradoEstudios = GradoEstudio::query()
            ->where('grado', $grado)
            ->where('nombre', $nombre)
            ->where('lugar', $lugar)
            ->where('periodo', $periodo)
            ->where('documento', $documento)
            ->where('folio', $folio)
            ->where('idUsuario', $idUsuario)
            ->get();
        $this->assertCount(1, $gradoEstudios);
        $gradoEstudio = $gradoEstudios->first();

        $response->assertRedirect(route('gradoEstudios.index'));
        $response->assertSessionHas('gradoEstudio.id', $gradoEstudio->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $gradoEstudio = GradoEstudios::factory()->create();

        $response = $this->get(route('grado-estudios.show', $gradoEstudio));

        $response->assertOk();
        $response->assertViewIs('gradoEstudio.show');
        $response->assertViewHas('gradoEstudio');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $gradoEstudio = GradoEstudios::factory()->create();

        $response = $this->get(route('grado-estudios.edit', $gradoEstudio));

        $response->assertOk();
        $response->assertViewIs('gradoEstudio.edit');
        $response->assertViewHas('gradoEstudio');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\GradoEstudiosController::class,
            'update',
            \App\Http\Requests\GradoEstudiosUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $gradoEstudio = GradoEstudios::factory()->create();
        $grado = $this->faker->word();
        $nombre = $this->faker->word();
        $lugar = $this->faker->word();
        $periodo = $this->faker->word();
        $documento = $this->faker->word();
        $folio = $this->faker->word();
        $idUsuario = $this->faker->word();

        $response = $this->put(route('grado-estudios.update', $gradoEstudio), [
            'grado' => $grado,
            'nombre' => $nombre,
            'lugar' => $lugar,
            'periodo' => $periodo,
            'documento' => $documento,
            'folio' => $folio,
            'idUsuario' => $idUsuario,
        ]);

        $gradoEstudio->refresh();

        $response->assertRedirect(route('gradoEstudios.index'));
        $response->assertSessionHas('gradoEstudio.id', $gradoEstudio->id);

        $this->assertEquals($grado, $gradoEstudio->grado);
        $this->assertEquals($nombre, $gradoEstudio->nombre);
        $this->assertEquals($lugar, $gradoEstudio->lugar);
        $this->assertEquals($periodo, $gradoEstudio->periodo);
        $this->assertEquals($documento, $gradoEstudio->documento);
        $this->assertEquals($folio, $gradoEstudio->folio);
        $this->assertEquals($idUsuario, $gradoEstudio->idUsuario);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $gradoEstudio = GradoEstudios::factory()->create();
        $gradoEstudio = GradoEstudio::factory()->create();

        $response = $this->delete(route('grado-estudios.destroy', $gradoEstudio));

        $response->assertRedirect(route('gradoEstudios.index'));

        $this->assertModelMissing($gradoEstudio);
    }
}
