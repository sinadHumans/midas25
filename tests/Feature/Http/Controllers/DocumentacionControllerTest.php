<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Documentacion;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\DocumentacionController
 */
final class DocumentacionControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $documentacions = Documentacion::factory()->count(3)->create();

        $response = $this->get(route('documentacions.index'));

        $response->assertOk();
        $response->assertViewIs('documentacion.index');
        $response->assertViewHas('documentacions');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('documentacions.create'));

        $response->assertOk();
        $response->assertViewIs('documentacion.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\DocumentacionController::class,
            'store',
            \App\Http\Requests\DocumentacionStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $idEstudio = $this->faker->word();
        $titulo = $this->faker->word();
        $observaciones = $this->faker->text();
        $archivo = $this->faker->text();
        $idUsuario = $this->faker->word();
        $folio = $this->faker->word();
        $seccion = $this->faker->word();
        $tipo = $this->faker->word();

        $response = $this->post(route('documentacions.store'), [
            'idEstudio' => $idEstudio,
            'titulo' => $titulo,
            'observaciones' => $observaciones,
            'archivo' => $archivo,
            'idUsuario' => $idUsuario,
            'folio' => $folio,
            'seccion' => $seccion,
            'tipo' => $tipo,
        ]);

        $documentacions = Documentacion::query()
            ->where('idEstudio', $idEstudio)
            ->where('titulo', $titulo)
            ->where('observaciones', $observaciones)
            ->where('archivo', $archivo)
            ->where('idUsuario', $idUsuario)
            ->where('folio', $folio)
            ->where('seccion', $seccion)
            ->where('tipo', $tipo)
            ->get();
        $this->assertCount(1, $documentacions);
        $documentacion = $documentacions->first();

        $response->assertRedirect(route('documentacions.index'));
        $response->assertSessionHas('documentacion.id', $documentacion->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $documentacion = Documentacion::factory()->create();

        $response = $this->get(route('documentacions.show', $documentacion));

        $response->assertOk();
        $response->assertViewIs('documentacion.show');
        $response->assertViewHas('documentacion');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $documentacion = Documentacion::factory()->create();

        $response = $this->get(route('documentacions.edit', $documentacion));

        $response->assertOk();
        $response->assertViewIs('documentacion.edit');
        $response->assertViewHas('documentacion');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\DocumentacionController::class,
            'update',
            \App\Http\Requests\DocumentacionUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $documentacion = Documentacion::factory()->create();
        $idEstudio = $this->faker->word();
        $titulo = $this->faker->word();
        $observaciones = $this->faker->text();
        $archivo = $this->faker->text();
        $idUsuario = $this->faker->word();
        $folio = $this->faker->word();
        $seccion = $this->faker->word();
        $tipo = $this->faker->word();

        $response = $this->put(route('documentacions.update', $documentacion), [
            'idEstudio' => $idEstudio,
            'titulo' => $titulo,
            'observaciones' => $observaciones,
            'archivo' => $archivo,
            'idUsuario' => $idUsuario,
            'folio' => $folio,
            'seccion' => $seccion,
            'tipo' => $tipo,
        ]);

        $documentacion->refresh();

        $response->assertRedirect(route('documentacions.index'));
        $response->assertSessionHas('documentacion.id', $documentacion->id);

        $this->assertEquals($idEstudio, $documentacion->idEstudio);
        $this->assertEquals($titulo, $documentacion->titulo);
        $this->assertEquals($observaciones, $documentacion->observaciones);
        $this->assertEquals($archivo, $documentacion->archivo);
        $this->assertEquals($idUsuario, $documentacion->idUsuario);
        $this->assertEquals($folio, $documentacion->folio);
        $this->assertEquals($seccion, $documentacion->seccion);
        $this->assertEquals($tipo, $documentacion->tipo);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $documentacion = Documentacion::factory()->create();

        $response = $this->delete(route('documentacions.destroy', $documentacion));

        $response->assertRedirect(route('documentacions.index'));

        $this->assertModelMissing($documentacion);
    }
}
