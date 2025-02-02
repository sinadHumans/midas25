<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Despido;
use App\Models\Despidos;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\DespidosController
 */
final class DespidosControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $despidos = Despidos::factory()->count(3)->create();

        $response = $this->get(route('despidos.index'));

        $response->assertOk();
        $response->assertViewIs('despido.index');
        $response->assertViewHas('despidos');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('despidos.create'));

        $response->assertOk();
        $response->assertViewIs('despido.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\DespidosController::class,
            'store',
            \App\Http\Requests\DespidosStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $nombre = $this->faker->word();
        $periodo = $this->faker->word();
        $motivo = $this->faker->text();
        $idUsuario = $this->faker->word();
        $idEstudio = $this->faker->word();

        $response = $this->post(route('despidos.store'), [
            'nombre' => $nombre,
            'periodo' => $periodo,
            'motivo' => $motivo,
            'idUsuario' => $idUsuario,
            'idEstudio' => $idEstudio,
        ]);

        $despidos = Despido::query()
            ->where('nombre', $nombre)
            ->where('periodo', $periodo)
            ->where('motivo', $motivo)
            ->where('idUsuario', $idUsuario)
            ->where('idEstudio', $idEstudio)
            ->get();
        $this->assertCount(1, $despidos);
        $despido = $despidos->first();

        $response->assertRedirect(route('despidos.index'));
        $response->assertSessionHas('despido.id', $despido->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $despido = Despidos::factory()->create();

        $response = $this->get(route('despidos.show', $despido));

        $response->assertOk();
        $response->assertViewIs('despido.show');
        $response->assertViewHas('despido');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $despido = Despidos::factory()->create();

        $response = $this->get(route('despidos.edit', $despido));

        $response->assertOk();
        $response->assertViewIs('despido.edit');
        $response->assertViewHas('despido');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\DespidosController::class,
            'update',
            \App\Http\Requests\DespidosUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $despido = Despidos::factory()->create();
        $nombre = $this->faker->word();
        $periodo = $this->faker->word();
        $motivo = $this->faker->text();
        $idUsuario = $this->faker->word();
        $idEstudio = $this->faker->word();

        $response = $this->put(route('despidos.update', $despido), [
            'nombre' => $nombre,
            'periodo' => $periodo,
            'motivo' => $motivo,
            'idUsuario' => $idUsuario,
            'idEstudio' => $idEstudio,
        ]);

        $despido->refresh();

        $response->assertRedirect(route('despidos.index'));
        $response->assertSessionHas('despido.id', $despido->id);

        $this->assertEquals($nombre, $despido->nombre);
        $this->assertEquals($periodo, $despido->periodo);
        $this->assertEquals($motivo, $despido->motivo);
        $this->assertEquals($idUsuario, $despido->idUsuario);
        $this->assertEquals($idEstudio, $despido->idEstudio);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $despido = Despidos::factory()->create();
        $despido = Despido::factory()->create();

        $response = $this->delete(route('despidos.destroy', $despido));

        $response->assertRedirect(route('despidos.index'));

        $this->assertModelMissing($despido);
    }
}
