<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Cuentasinversione;
use App\Models\Cuentasinversiones;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\CuentasinversionesController
 */
final class CuentasinversionesControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $cuentasinversiones = Cuentasinversiones::factory()->count(3)->create();

        $response = $this->get(route('cuentasinversiones.index'));

        $response->assertOk();
        $response->assertViewIs('cuentasinversione.index');
        $response->assertViewHas('cuentasinversiones');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('cuentasinversiones.create'));

        $response->assertOk();
        $response->assertViewIs('cuentasinversione.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\CuentasinversionesController::class,
            'store',
            \App\Http\Requests\CuentasinversionesStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $institucion = $this->faker->word();
        $tipo = $this->faker->word();
        $objetivo = $this->faker->word();
        $deposito = $this->faker->word();
        $idUsuario = $this->faker->word();

        $response = $this->post(route('cuentasinversiones.store'), [
            'institucion' => $institucion,
            'tipo' => $tipo,
            'objetivo' => $objetivo,
            'deposito' => $deposito,
            'idUsuario' => $idUsuario,
        ]);

        $cuentasinversiones = Cuentasinversione::query()
            ->where('institucion', $institucion)
            ->where('tipo', $tipo)
            ->where('objetivo', $objetivo)
            ->where('deposito', $deposito)
            ->where('idUsuario', $idUsuario)
            ->get();
        $this->assertCount(1, $cuentasinversiones);
        $cuentasinversione = $cuentasinversiones->first();

        $response->assertRedirect(route('cuentasinversiones.index'));
        $response->assertSessionHas('cuentasinversione.id', $cuentasinversione->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $cuentasinversione = Cuentasinversiones::factory()->create();

        $response = $this->get(route('cuentasinversiones.show', $cuentasinversione));

        $response->assertOk();
        $response->assertViewIs('cuentasinversione.show');
        $response->assertViewHas('cuentasinversione');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $cuentasinversione = Cuentasinversiones::factory()->create();

        $response = $this->get(route('cuentasinversiones.edit', $cuentasinversione));

        $response->assertOk();
        $response->assertViewIs('cuentasinversione.edit');
        $response->assertViewHas('cuentasinversione');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\CuentasinversionesController::class,
            'update',
            \App\Http\Requests\CuentasinversionesUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $cuentasinversione = Cuentasinversiones::factory()->create();
        $institucion = $this->faker->word();
        $tipo = $this->faker->word();
        $objetivo = $this->faker->word();
        $deposito = $this->faker->word();
        $idUsuario = $this->faker->word();

        $response = $this->put(route('cuentasinversiones.update', $cuentasinversione), [
            'institucion' => $institucion,
            'tipo' => $tipo,
            'objetivo' => $objetivo,
            'deposito' => $deposito,
            'idUsuario' => $idUsuario,
        ]);

        $cuentasinversione->refresh();

        $response->assertRedirect(route('cuentasinversiones.index'));
        $response->assertSessionHas('cuentasinversione.id', $cuentasinversione->id);

        $this->assertEquals($institucion, $cuentasinversione->institucion);
        $this->assertEquals($tipo, $cuentasinversione->tipo);
        $this->assertEquals($objetivo, $cuentasinversione->objetivo);
        $this->assertEquals($deposito, $cuentasinversione->deposito);
        $this->assertEquals($idUsuario, $cuentasinversione->idUsuario);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $cuentasinversione = Cuentasinversiones::factory()->create();
        $cuentasinversione = Cuentasinversione::factory()->create();

        $response = $this->delete(route('cuentasinversiones.destroy', $cuentasinversione));

        $response->assertRedirect(route('cuentasinversiones.index'));

        $this->assertModelMissing($cuentasinversione);
    }
}
