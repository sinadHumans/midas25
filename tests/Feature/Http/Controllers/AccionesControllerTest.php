<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Accione;
use App\Models\Acciones;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\AccionesController
 */
final class AccionesControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $acciones = Acciones::factory()->count(3)->create();

        $response = $this->get(route('acciones.index'));

        $response->assertOk();
        $response->assertViewIs('accione.index');
        $response->assertViewHas('acciones');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('acciones.create'));

        $response->assertOk();
        $response->assertViewIs('accione.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\AccionesController::class,
            'store',
            \App\Http\Requests\AccionesStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $idUsuario = $this->faker->word();
        $accion = $this->faker->word();

        $response = $this->post(route('acciones.store'), [
            'idUsuario' => $idUsuario,
            'accion' => $accion,
        ]);

        $acciones = Accione::query()
            ->where('idUsuario', $idUsuario)
            ->where('accion', $accion)
            ->get();
        $this->assertCount(1, $acciones);
        $accione = $acciones->first();

        $response->assertRedirect(route('acciones.index'));
        $response->assertSessionHas('accione.id', $accione->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $accione = Acciones::factory()->create();

        $response = $this->get(route('acciones.show', $accione));

        $response->assertOk();
        $response->assertViewIs('accione.show');
        $response->assertViewHas('accione');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $accione = Acciones::factory()->create();

        $response = $this->get(route('acciones.edit', $accione));

        $response->assertOk();
        $response->assertViewIs('accione.edit');
        $response->assertViewHas('accione');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\AccionesController::class,
            'update',
            \App\Http\Requests\AccionesUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $accione = Acciones::factory()->create();
        $idUsuario = $this->faker->word();
        $accion = $this->faker->word();

        $response = $this->put(route('acciones.update', $accione), [
            'idUsuario' => $idUsuario,
            'accion' => $accion,
        ]);

        $accione->refresh();

        $response->assertRedirect(route('acciones.index'));
        $response->assertSessionHas('accione.id', $accione->id);

        $this->assertEquals($idUsuario, $accione->idUsuario);
        $this->assertEquals($accion, $accione->accion);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $accione = Acciones::factory()->create();
        $accione = Accione::factory()->create();

        $response = $this->delete(route('acciones.destroy', $accione));

        $response->assertRedirect(route('acciones.index'));

        $this->assertModelMissing($accione);
    }
}
