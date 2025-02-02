<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Estructurafamiliar;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\EstructurafamiliarController
 */
final class EstructurafamiliarControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $estructurafamiliars = Estructurafamiliar::factory()->count(3)->create();

        $response = $this->get(route('estructurafamiliars.index'));

        $response->assertOk();
        $response->assertViewIs('estructurafamiliar.index');
        $response->assertViewHas('estructurafamiliars');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('estructurafamiliars.create'));

        $response->assertOk();
        $response->assertViewIs('estructurafamiliar.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\EstructurafamiliarController::class,
            'store',
            \App\Http\Requests\EstructurafamiliarStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $idEstudio = $this->faker->word();
        $familiar = $this->faker->word();
        $edad = $this->faker->word();
        $ocupacion = $this->faker->word();
        $laboraEstudia = $this->faker->word();
        $calle = $this->faker->word();
        $numero = $this->faker->word();
        $colonia = $this->faker->word();
        $delegacionMunicipio = $this->faker->word();
        $ciudad = $this->faker->word();
        $estado = $this->faker->word();
        $cpde = $this->faker->word();
        $tiempoReside = $this->faker->word();
        $tel1 = $this->faker->word();
        $idUsuario = $this->faker->word();

        $response = $this->post(route('estructurafamiliars.store'), [
            'idEstudio' => $idEstudio,
            'familiar' => $familiar,
            'edad' => $edad,
            'ocupacion' => $ocupacion,
            'laboraEstudia' => $laboraEstudia,
            'calle' => $calle,
            'numero' => $numero,
            'colonia' => $colonia,
            'delegacionMunicipio' => $delegacionMunicipio,
            'ciudad' => $ciudad,
            'estado' => $estado,
            'cpde' => $cpde,
            'tiempoReside' => $tiempoReside,
            'tel1' => $tel1,
            'idUsuario' => $idUsuario,
        ]);

        $estructurafamiliars = Estructurafamiliar::query()
            ->where('idEstudio', $idEstudio)
            ->where('familiar', $familiar)
            ->where('edad', $edad)
            ->where('ocupacion', $ocupacion)
            ->where('laboraEstudia', $laboraEstudia)
            ->where('calle', $calle)
            ->where('numero', $numero)
            ->where('colonia', $colonia)
            ->where('delegacionMunicipio', $delegacionMunicipio)
            ->where('ciudad', $ciudad)
            ->where('estado', $estado)
            ->where('cpde', $cpde)
            ->where('tiempoReside', $tiempoReside)
            ->where('tel1', $tel1)
            ->where('idUsuario', $idUsuario)
            ->get();
        $this->assertCount(1, $estructurafamiliars);
        $estructurafamiliar = $estructurafamiliars->first();

        $response->assertRedirect(route('estructurafamiliars.index'));
        $response->assertSessionHas('estructurafamiliar.id', $estructurafamiliar->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $estructurafamiliar = Estructurafamiliar::factory()->create();

        $response = $this->get(route('estructurafamiliars.show', $estructurafamiliar));

        $response->assertOk();
        $response->assertViewIs('estructurafamiliar.show');
        $response->assertViewHas('estructurafamiliar');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $estructurafamiliar = Estructurafamiliar::factory()->create();

        $response = $this->get(route('estructurafamiliars.edit', $estructurafamiliar));

        $response->assertOk();
        $response->assertViewIs('estructurafamiliar.edit');
        $response->assertViewHas('estructurafamiliar');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\EstructurafamiliarController::class,
            'update',
            \App\Http\Requests\EstructurafamiliarUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $estructurafamiliar = Estructurafamiliar::factory()->create();
        $idEstudio = $this->faker->word();
        $familiar = $this->faker->word();
        $edad = $this->faker->word();
        $ocupacion = $this->faker->word();
        $laboraEstudia = $this->faker->word();
        $calle = $this->faker->word();
        $numero = $this->faker->word();
        $colonia = $this->faker->word();
        $delegacionMunicipio = $this->faker->word();
        $ciudad = $this->faker->word();
        $estado = $this->faker->word();
        $cpde = $this->faker->word();
        $tiempoReside = $this->faker->word();
        $tel1 = $this->faker->word();
        $idUsuario = $this->faker->word();

        $response = $this->put(route('estructurafamiliars.update', $estructurafamiliar), [
            'idEstudio' => $idEstudio,
            'familiar' => $familiar,
            'edad' => $edad,
            'ocupacion' => $ocupacion,
            'laboraEstudia' => $laboraEstudia,
            'calle' => $calle,
            'numero' => $numero,
            'colonia' => $colonia,
            'delegacionMunicipio' => $delegacionMunicipio,
            'ciudad' => $ciudad,
            'estado' => $estado,
            'cpde' => $cpde,
            'tiempoReside' => $tiempoReside,
            'tel1' => $tel1,
            'idUsuario' => $idUsuario,
        ]);

        $estructurafamiliar->refresh();

        $response->assertRedirect(route('estructurafamiliars.index'));
        $response->assertSessionHas('estructurafamiliar.id', $estructurafamiliar->id);

        $this->assertEquals($idEstudio, $estructurafamiliar->idEstudio);
        $this->assertEquals($familiar, $estructurafamiliar->familiar);
        $this->assertEquals($edad, $estructurafamiliar->edad);
        $this->assertEquals($ocupacion, $estructurafamiliar->ocupacion);
        $this->assertEquals($laboraEstudia, $estructurafamiliar->laboraEstudia);
        $this->assertEquals($calle, $estructurafamiliar->calle);
        $this->assertEquals($numero, $estructurafamiliar->numero);
        $this->assertEquals($colonia, $estructurafamiliar->colonia);
        $this->assertEquals($delegacionMunicipio, $estructurafamiliar->delegacionMunicipio);
        $this->assertEquals($ciudad, $estructurafamiliar->ciudad);
        $this->assertEquals($estado, $estructurafamiliar->estado);
        $this->assertEquals($cpde, $estructurafamiliar->cpde);
        $this->assertEquals($tiempoReside, $estructurafamiliar->tiempoReside);
        $this->assertEquals($tel1, $estructurafamiliar->tel1);
        $this->assertEquals($idUsuario, $estructurafamiliar->idUsuario);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $estructurafamiliar = Estructurafamiliar::factory()->create();

        $response = $this->delete(route('estructurafamiliars.destroy', $estructurafamiliar));

        $response->assertRedirect(route('estructurafamiliars.index'));

        $this->assertModelMissing($estructurafamiliar);
    }
}
