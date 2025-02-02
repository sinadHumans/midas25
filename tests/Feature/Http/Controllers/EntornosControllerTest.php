<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Entorno;
use App\Models\Entornos;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\EntornosController
 */
final class EntornosControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $entornos = Entornos::factory()->count(3)->create();

        $response = $this->get(route('entornos.index'));

        $response->assertOk();
        $response->assertViewIs('entorno.index');
        $response->assertViewHas('entornos');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('entornos.create'));

        $response->assertOk();
        $response->assertViewIs('entorno.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\EntornosController::class,
            'store',
            \App\Http\Requests\EntornosStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $comentarios = $this->faker->text();
        $tiempoVivir = $this->faker->word();
        $calle = $this->faker->word();
        $numero = $this->faker->word();
        $interior = $this->faker->word();
        $colonia = $this->faker->word();
        $entre = $this->faker->word();
        $delegacionMunicpio = $this->faker->word();
        $estado = $this->faker->word();
        $cp = $this->faker->word();
        $color = $this->faker->word();
        $tipo = $this->faker->word();
        $dondeEs = $this->faker->word();
        $ubicación = $this->faker->word();
        $idUsuario = $this->faker->word();

        $response = $this->post(route('entornos.store'), [
            'comentarios' => $comentarios,
            'tiempoVivir' => $tiempoVivir,
            'calle' => $calle,
            'numero' => $numero,
            'interior' => $interior,
            'colonia' => $colonia,
            'entre' => $entre,
            'delegacionMunicpio' => $delegacionMunicpio,
            'estado' => $estado,
            'cp' => $cp,
            'color' => $color,
            'tipo' => $tipo,
            'dondeEs' => $dondeEs,
            'ubicación' => $ubicación,
            'idUsuario' => $idUsuario,
        ]);

        $entornos = Entorno::query()
            ->where('comentarios', $comentarios)
            ->where('tiempoVivir', $tiempoVivir)
            ->where('calle', $calle)
            ->where('numero', $numero)
            ->where('interior', $interior)
            ->where('colonia', $colonia)
            ->where('entre', $entre)
            ->where('delegacionMunicpio', $delegacionMunicpio)
            ->where('estado', $estado)
            ->where('cp', $cp)
            ->where('color', $color)
            ->where('tipo', $tipo)
            ->where('dondeEs', $dondeEs)
            ->where('ubicación', $ubicación)
            ->where('idUsuario', $idUsuario)
            ->get();
        $this->assertCount(1, $entornos);
        $entorno = $entornos->first();

        $response->assertRedirect(route('entornos.index'));
        $response->assertSessionHas('entorno.id', $entorno->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $entorno = Entornos::factory()->create();

        $response = $this->get(route('entornos.show', $entorno));

        $response->assertOk();
        $response->assertViewIs('entorno.show');
        $response->assertViewHas('entorno');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $entorno = Entornos::factory()->create();

        $response = $this->get(route('entornos.edit', $entorno));

        $response->assertOk();
        $response->assertViewIs('entorno.edit');
        $response->assertViewHas('entorno');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\EntornosController::class,
            'update',
            \App\Http\Requests\EntornosUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $entorno = Entornos::factory()->create();
        $comentarios = $this->faker->text();
        $tiempoVivir = $this->faker->word();
        $calle = $this->faker->word();
        $numero = $this->faker->word();
        $interior = $this->faker->word();
        $colonia = $this->faker->word();
        $entre = $this->faker->word();
        $delegacionMunicpio = $this->faker->word();
        $estado = $this->faker->word();
        $cp = $this->faker->word();
        $color = $this->faker->word();
        $tipo = $this->faker->word();
        $dondeEs = $this->faker->word();
        $ubicación = $this->faker->word();
        $idUsuario = $this->faker->word();

        $response = $this->put(route('entornos.update', $entorno), [
            'comentarios' => $comentarios,
            'tiempoVivir' => $tiempoVivir,
            'calle' => $calle,
            'numero' => $numero,
            'interior' => $interior,
            'colonia' => $colonia,
            'entre' => $entre,
            'delegacionMunicpio' => $delegacionMunicpio,
            'estado' => $estado,
            'cp' => $cp,
            'color' => $color,
            'tipo' => $tipo,
            'dondeEs' => $dondeEs,
            'ubicación' => $ubicación,
            'idUsuario' => $idUsuario,
        ]);

        $entorno->refresh();

        $response->assertRedirect(route('entornos.index'));
        $response->assertSessionHas('entorno.id', $entorno->id);

        $this->assertEquals($comentarios, $entorno->comentarios);
        $this->assertEquals($tiempoVivir, $entorno->tiempoVivir);
        $this->assertEquals($calle, $entorno->calle);
        $this->assertEquals($numero, $entorno->numero);
        $this->assertEquals($interior, $entorno->interior);
        $this->assertEquals($colonia, $entorno->colonia);
        $this->assertEquals($entre, $entorno->entre);
        $this->assertEquals($delegacionMunicpio, $entorno->delegacionMunicpio);
        $this->assertEquals($estado, $entorno->estado);
        $this->assertEquals($cp, $entorno->cp);
        $this->assertEquals($color, $entorno->color);
        $this->assertEquals($tipo, $entorno->tipo);
        $this->assertEquals($dondeEs, $entorno->dondeEs);
        $this->assertEquals($ubicación, $entorno->ubicación);
        $this->assertEquals($idUsuario, $entorno->idUsuario);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $entorno = Entornos::factory()->create();
        $entorno = Entorno::factory()->create();

        $response = $this->delete(route('entornos.destroy', $entorno));

        $response->assertRedirect(route('entornos.index'));

        $this->assertModelMissing($entorno);
    }
}
