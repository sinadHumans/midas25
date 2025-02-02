<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Beneficiario;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\BeneficiarioController
 */
final class BeneficiarioControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $beneficiarios = Beneficiario::factory()->count(3)->create();

        $response = $this->get(route('beneficiarios.index'));

        $response->assertOk();
        $response->assertViewIs('beneficiario.index');
        $response->assertViewHas('beneficiarios');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('beneficiarios.create'));

        $response->assertOk();
        $response->assertViewIs('beneficiario.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\BeneficiarioController::class,
            'store',
            \App\Http\Requests\BeneficiarioStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $idEstudio = $this->faker->word();
        $idUsuario = $this->faker->word();
        $parentesco = $this->faker->word();
        $nombre = $this->faker->word();
        $edad = $this->faker->word();
        $ocupacion = $this->faker->word();
        $donde = $this->faker->word();
        $calle = $this->faker->word();
        $numero = $this->faker->word();
        $colonia = $this->faker->word();
        $delegacion = $this->faker->word();
        $ciudad = $this->faker->word();
        $estado = $this->faker->word();
        $cp = $this->faker->word();
        $tiempo = $this->faker->word();
        $telefono = $this->faker->word();

        $response = $this->post(route('beneficiarios.store'), [
            'idEstudio' => $idEstudio,
            'idUsuario' => $idUsuario,
            'parentesco' => $parentesco,
            'nombre' => $nombre,
            'edad' => $edad,
            'ocupacion' => $ocupacion,
            'donde' => $donde,
            'calle' => $calle,
            'numero' => $numero,
            'colonia' => $colonia,
            'delegacion' => $delegacion,
            'ciudad' => $ciudad,
            'estado' => $estado,
            'cp' => $cp,
            'tiempo' => $tiempo,
            'telefono' => $telefono,
        ]);

        $beneficiarios = Beneficiario::query()
            ->where('idEstudio', $idEstudio)
            ->where('idUsuario', $idUsuario)
            ->where('parentesco', $parentesco)
            ->where('nombre', $nombre)
            ->where('edad', $edad)
            ->where('ocupacion', $ocupacion)
            ->where('donde', $donde)
            ->where('calle', $calle)
            ->where('numero', $numero)
            ->where('colonia', $colonia)
            ->where('delegacion', $delegacion)
            ->where('ciudad', $ciudad)
            ->where('estado', $estado)
            ->where('cp', $cp)
            ->where('tiempo', $tiempo)
            ->where('telefono', $telefono)
            ->get();
        $this->assertCount(1, $beneficiarios);
        $beneficiario = $beneficiarios->first();

        $response->assertRedirect(route('beneficiarios.index'));
        $response->assertSessionHas('beneficiario.id', $beneficiario->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $beneficiario = Beneficiario::factory()->create();

        $response = $this->get(route('beneficiarios.show', $beneficiario));

        $response->assertOk();
        $response->assertViewIs('beneficiario.show');
        $response->assertViewHas('beneficiario');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $beneficiario = Beneficiario::factory()->create();

        $response = $this->get(route('beneficiarios.edit', $beneficiario));

        $response->assertOk();
        $response->assertViewIs('beneficiario.edit');
        $response->assertViewHas('beneficiario');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\BeneficiarioController::class,
            'update',
            \App\Http\Requests\BeneficiarioUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $beneficiario = Beneficiario::factory()->create();
        $idEstudio = $this->faker->word();
        $idUsuario = $this->faker->word();
        $parentesco = $this->faker->word();
        $nombre = $this->faker->word();
        $edad = $this->faker->word();
        $ocupacion = $this->faker->word();
        $donde = $this->faker->word();
        $calle = $this->faker->word();
        $numero = $this->faker->word();
        $colonia = $this->faker->word();
        $delegacion = $this->faker->word();
        $ciudad = $this->faker->word();
        $estado = $this->faker->word();
        $cp = $this->faker->word();
        $tiempo = $this->faker->word();
        $telefono = $this->faker->word();

        $response = $this->put(route('beneficiarios.update', $beneficiario), [
            'idEstudio' => $idEstudio,
            'idUsuario' => $idUsuario,
            'parentesco' => $parentesco,
            'nombre' => $nombre,
            'edad' => $edad,
            'ocupacion' => $ocupacion,
            'donde' => $donde,
            'calle' => $calle,
            'numero' => $numero,
            'colonia' => $colonia,
            'delegacion' => $delegacion,
            'ciudad' => $ciudad,
            'estado' => $estado,
            'cp' => $cp,
            'tiempo' => $tiempo,
            'telefono' => $telefono,
        ]);

        $beneficiario->refresh();

        $response->assertRedirect(route('beneficiarios.index'));
        $response->assertSessionHas('beneficiario.id', $beneficiario->id);

        $this->assertEquals($idEstudio, $beneficiario->idEstudio);
        $this->assertEquals($idUsuario, $beneficiario->idUsuario);
        $this->assertEquals($parentesco, $beneficiario->parentesco);
        $this->assertEquals($nombre, $beneficiario->nombre);
        $this->assertEquals($edad, $beneficiario->edad);
        $this->assertEquals($ocupacion, $beneficiario->ocupacion);
        $this->assertEquals($donde, $beneficiario->donde);
        $this->assertEquals($calle, $beneficiario->calle);
        $this->assertEquals($numero, $beneficiario->numero);
        $this->assertEquals($colonia, $beneficiario->colonia);
        $this->assertEquals($delegacion, $beneficiario->delegacion);
        $this->assertEquals($ciudad, $beneficiario->ciudad);
        $this->assertEquals($estado, $beneficiario->estado);
        $this->assertEquals($cp, $beneficiario->cp);
        $this->assertEquals($tiempo, $beneficiario->tiempo);
        $this->assertEquals($telefono, $beneficiario->telefono);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $beneficiario = Beneficiario::factory()->create();

        $response = $this->delete(route('beneficiarios.destroy', $beneficiario));

        $response->assertRedirect(route('beneficiarios.index'));

        $this->assertModelMissing($beneficiario);
    }
}
