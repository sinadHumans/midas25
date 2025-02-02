<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Problema;
use App\Models\Problemas;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ProblemasController
 */
final class ProblemasControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $problemas = Problemas::factory()->count(3)->create();

        $response = $this->get(route('problemas.index'));

        $response->assertOk();
        $response->assertViewIs('problema.index');
        $response->assertViewHas('problemas');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('problemas.create'));

        $response->assertOk();
        $response->assertViewIs('problema.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ProblemasController::class,
            'store',
            \App\Http\Requests\ProblemasStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $nombre = $this->faker->word();
        $informante = $this->faker->word();
        $comentarios = $this->faker->text();
        $idUsuario = $this->faker->word();
        $idEstudio = $this->faker->word();
        $dato = $this->faker->word();

        $response = $this->post(route('problemas.store'), [
            'nombre' => $nombre,
            'informante' => $informante,
            'comentarios' => $comentarios,
            'idUsuario' => $idUsuario,
            'idEstudio' => $idEstudio,
            'dato' => $dato,
        ]);

        $problemas = Problema::query()
            ->where('nombre', $nombre)
            ->where('informante', $informante)
            ->where('comentarios', $comentarios)
            ->where('idUsuario', $idUsuario)
            ->where('idEstudio', $idEstudio)
            ->where('dato', $dato)
            ->get();
        $this->assertCount(1, $problemas);
        $problema = $problemas->first();

        $response->assertRedirect(route('problemas.index'));
        $response->assertSessionHas('problema.id', $problema->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $problema = Problemas::factory()->create();

        $response = $this->get(route('problemas.show', $problema));

        $response->assertOk();
        $response->assertViewIs('problema.show');
        $response->assertViewHas('problema');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $problema = Problemas::factory()->create();

        $response = $this->get(route('problemas.edit', $problema));

        $response->assertOk();
        $response->assertViewIs('problema.edit');
        $response->assertViewHas('problema');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ProblemasController::class,
            'update',
            \App\Http\Requests\ProblemasUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $problema = Problemas::factory()->create();
        $nombre = $this->faker->word();
        $informante = $this->faker->word();
        $comentarios = $this->faker->text();
        $idUsuario = $this->faker->word();
        $idEstudio = $this->faker->word();
        $dato = $this->faker->word();

        $response = $this->put(route('problemas.update', $problema), [
            'nombre' => $nombre,
            'informante' => $informante,
            'comentarios' => $comentarios,
            'idUsuario' => $idUsuario,
            'idEstudio' => $idEstudio,
            'dato' => $dato,
        ]);

        $problema->refresh();

        $response->assertRedirect(route('problemas.index'));
        $response->assertSessionHas('problema.id', $problema->id);

        $this->assertEquals($nombre, $problema->nombre);
        $this->assertEquals($informante, $problema->informante);
        $this->assertEquals($comentarios, $problema->comentarios);
        $this->assertEquals($idUsuario, $problema->idUsuario);
        $this->assertEquals($idEstudio, $problema->idEstudio);
        $this->assertEquals($dato, $problema->dato);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $problema = Problemas::factory()->create();
        $problema = Problema::factory()->create();

        $response = $this->delete(route('problemas.destroy', $problema));

        $response->assertRedirect(route('problemas.index'));

        $this->assertModelMissing($problema);
    }
}
