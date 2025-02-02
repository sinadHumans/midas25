<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Vehiculo;
use App\Models\Vehiculos;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\VehiculosController
 */
final class VehiculosControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $vehiculos = Vehiculos::factory()->count(3)->create();

        $response = $this->get(route('vehiculos.index'));

        $response->assertOk();
        $response->assertViewIs('vehiculo.index');
        $response->assertViewHas('vehiculos');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('vehiculos.create'));

        $response->assertOk();
        $response->assertViewIs('vehiculo.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\VehiculosController::class,
            'store',
            \App\Http\Requests\VehiculosStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $marca = $this->faker->word();
        $modelo = $this->faker->word();
        $valor = $this->faker->word();
        $pagado = $this->faker->word();
        $abono = $this->faker->word();
        $idUsuario = $this->faker->word();

        $response = $this->post(route('vehiculos.store'), [
            'marca' => $marca,
            'modelo' => $modelo,
            'valor' => $valor,
            'pagado' => $pagado,
            'abono' => $abono,
            'idUsuario' => $idUsuario,
        ]);

        $vehiculos = Vehiculo::query()
            ->where('marca', $marca)
            ->where('modelo', $modelo)
            ->where('valor', $valor)
            ->where('pagado', $pagado)
            ->where('abono', $abono)
            ->where('idUsuario', $idUsuario)
            ->get();
        $this->assertCount(1, $vehiculos);
        $vehiculo = $vehiculos->first();

        $response->assertRedirect(route('vehiculos.index'));
        $response->assertSessionHas('vehiculo.id', $vehiculo->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $vehiculo = Vehiculos::factory()->create();

        $response = $this->get(route('vehiculos.show', $vehiculo));

        $response->assertOk();
        $response->assertViewIs('vehiculo.show');
        $response->assertViewHas('vehiculo');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $vehiculo = Vehiculos::factory()->create();

        $response = $this->get(route('vehiculos.edit', $vehiculo));

        $response->assertOk();
        $response->assertViewIs('vehiculo.edit');
        $response->assertViewHas('vehiculo');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\VehiculosController::class,
            'update',
            \App\Http\Requests\VehiculosUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $vehiculo = Vehiculos::factory()->create();
        $marca = $this->faker->word();
        $modelo = $this->faker->word();
        $valor = $this->faker->word();
        $pagado = $this->faker->word();
        $abono = $this->faker->word();
        $idUsuario = $this->faker->word();

        $response = $this->put(route('vehiculos.update', $vehiculo), [
            'marca' => $marca,
            'modelo' => $modelo,
            'valor' => $valor,
            'pagado' => $pagado,
            'abono' => $abono,
            'idUsuario' => $idUsuario,
        ]);

        $vehiculo->refresh();

        $response->assertRedirect(route('vehiculos.index'));
        $response->assertSessionHas('vehiculo.id', $vehiculo->id);

        $this->assertEquals($marca, $vehiculo->marca);
        $this->assertEquals($modelo, $vehiculo->modelo);
        $this->assertEquals($valor, $vehiculo->valor);
        $this->assertEquals($pagado, $vehiculo->pagado);
        $this->assertEquals($abono, $vehiculo->abono);
        $this->assertEquals($idUsuario, $vehiculo->idUsuario);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $vehiculo = Vehiculos::factory()->create();
        $vehiculo = Vehiculo::factory()->create();

        $response = $this->delete(route('vehiculos.destroy', $vehiculo));

        $response->assertRedirect(route('vehiculos.index'));

        $this->assertModelMissing($vehiculo);
    }
}
