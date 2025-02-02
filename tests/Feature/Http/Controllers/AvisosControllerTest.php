<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Aviso;
use App\Models\Avisos;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\AvisosController
 */
final class AvisosControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $avisos = Avisos::factory()->count(3)->create();

        $response = $this->get(route('avisos.index'));

        $response->assertOk();
        $response->assertViewIs('aviso.index');
        $response->assertViewHas('avisos');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('avisos.create'));

        $response->assertOk();
        $response->assertViewIs('aviso.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\AvisosController::class,
            'store',
            \App\Http\Requests\AvisosStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $titulo = $this->faker->word();
        $mensaje = $this->faker->text();
        $dirigido = $this->faker->word();
        $tipo = $this->faker->text();
        $estatus = $this->faker->text();
        $idUsuario = $this->faker->word();

        $response = $this->post(route('avisos.store'), [
            'titulo' => $titulo,
            'mensaje' => $mensaje,
            'dirigido' => $dirigido,
            'tipo' => $tipo,
            'estatus' => $estatus,
            'idUsuario' => $idUsuario,
        ]);

        $avisos = Aviso::query()
            ->where('titulo', $titulo)
            ->where('mensaje', $mensaje)
            ->where('dirigido', $dirigido)
            ->where('tipo', $tipo)
            ->where('estatus', $estatus)
            ->where('idUsuario', $idUsuario)
            ->get();
        $this->assertCount(1, $avisos);
        $aviso = $avisos->first();

        $response->assertRedirect(route('avisos.index'));
        $response->assertSessionHas('aviso.id', $aviso->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $aviso = Avisos::factory()->create();

        $response = $this->get(route('avisos.show', $aviso));

        $response->assertOk();
        $response->assertViewIs('aviso.show');
        $response->assertViewHas('aviso');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $aviso = Avisos::factory()->create();

        $response = $this->get(route('avisos.edit', $aviso));

        $response->assertOk();
        $response->assertViewIs('aviso.edit');
        $response->assertViewHas('aviso');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\AvisosController::class,
            'update',
            \App\Http\Requests\AvisosUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $aviso = Avisos::factory()->create();
        $titulo = $this->faker->word();
        $mensaje = $this->faker->text();
        $dirigido = $this->faker->word();
        $tipo = $this->faker->text();
        $estatus = $this->faker->text();
        $idUsuario = $this->faker->word();

        $response = $this->put(route('avisos.update', $aviso), [
            'titulo' => $titulo,
            'mensaje' => $mensaje,
            'dirigido' => $dirigido,
            'tipo' => $tipo,
            'estatus' => $estatus,
            'idUsuario' => $idUsuario,
        ]);

        $aviso->refresh();

        $response->assertRedirect(route('avisos.index'));
        $response->assertSessionHas('aviso.id', $aviso->id);

        $this->assertEquals($titulo, $aviso->titulo);
        $this->assertEquals($mensaje, $aviso->mensaje);
        $this->assertEquals($dirigido, $aviso->dirigido);
        $this->assertEquals($tipo, $aviso->tipo);
        $this->assertEquals($estatus, $aviso->estatus);
        $this->assertEquals($idUsuario, $aviso->idUsuario);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $aviso = Avisos::factory()->create();
        $aviso = Aviso::factory()->create();

        $response = $this->delete(route('avisos.destroy', $aviso));

        $response->assertRedirect(route('avisos.index'));

        $this->assertModelMissing($aviso);
    }
}
