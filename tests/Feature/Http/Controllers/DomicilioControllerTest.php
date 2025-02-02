<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Domicilio;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\DomicilioController
 */
final class DomicilioControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $domicilios = Domicilio::factory()->count(3)->create();

        $response = $this->get(route('domicilios.index'));

        $response->assertOk();
        $response->assertViewIs('domicilio.index');
        $response->assertViewHas('domicilios');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('domicilios.create'));

        $response->assertOk();
        $response->assertViewIs('domicilio.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\DomicilioController::class,
            'store',
            \App\Http\Requests\DomicilioStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $idEstudio = $this->faker->word();
        $delegacionMunicipio = $this->faker->word();
        $ciudad = $this->faker->word();
        $estado = $this->faker->word();
        $cp = $this->faker->word();
        $tiempoResindir = $this->faker->word();
        $tel1 = $this->faker->word();
        $tel2 = $this->faker->word();
        $tel3 = $this->faker->word();
        $cel1 = $this->faker->word();
        $cel2 = $this->faker->word();
        $cel3 = $this->faker->word();
        $calle = $this->faker->word();
        $numero = $this->faker->word();
        $colonia = $this->faker->word();
        $idUsuario = $this->faker->word();

        $response = $this->post(route('domicilios.store'), [
            'idEstudio' => $idEstudio,
            'delegacionMunicipio' => $delegacionMunicipio,
            'ciudad' => $ciudad,
            'estado' => $estado,
            'cp' => $cp,
            'tiempoResindir' => $tiempoResindir,
            'tel1' => $tel1,
            'tel2' => $tel2,
            'tel3' => $tel3,
            'cel1' => $cel1,
            'cel2' => $cel2,
            'cel3' => $cel3,
            'calle' => $calle,
            'numero' => $numero,
            'colonia' => $colonia,
            'idUsuario' => $idUsuario,
        ]);

        $domicilios = Domicilio::query()
            ->where('idEstudio', $idEstudio)
            ->where('delegacionMunicipio', $delegacionMunicipio)
            ->where('ciudad', $ciudad)
            ->where('estado', $estado)
            ->where('cp', $cp)
            ->where('tiempoResindir', $tiempoResindir)
            ->where('tel1', $tel1)
            ->where('tel2', $tel2)
            ->where('tel3', $tel3)
            ->where('cel1', $cel1)
            ->where('cel2', $cel2)
            ->where('cel3', $cel3)
            ->where('calle', $calle)
            ->where('numero', $numero)
            ->where('colonia', $colonia)
            ->where('idUsuario', $idUsuario)
            ->get();
        $this->assertCount(1, $domicilios);
        $domicilio = $domicilios->first();

        $response->assertRedirect(route('domicilios.index'));
        $response->assertSessionHas('domicilio.id', $domicilio->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $domicilio = Domicilio::factory()->create();

        $response = $this->get(route('domicilios.show', $domicilio));

        $response->assertOk();
        $response->assertViewIs('domicilio.show');
        $response->assertViewHas('domicilio');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $domicilio = Domicilio::factory()->create();

        $response = $this->get(route('domicilios.edit', $domicilio));

        $response->assertOk();
        $response->assertViewIs('domicilio.edit');
        $response->assertViewHas('domicilio');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\DomicilioController::class,
            'update',
            \App\Http\Requests\DomicilioUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $domicilio = Domicilio::factory()->create();
        $idEstudio = $this->faker->word();
        $delegacionMunicipio = $this->faker->word();
        $ciudad = $this->faker->word();
        $estado = $this->faker->word();
        $cp = $this->faker->word();
        $tiempoResindir = $this->faker->word();
        $tel1 = $this->faker->word();
        $tel2 = $this->faker->word();
        $tel3 = $this->faker->word();
        $cel1 = $this->faker->word();
        $cel2 = $this->faker->word();
        $cel3 = $this->faker->word();
        $calle = $this->faker->word();
        $numero = $this->faker->word();
        $colonia = $this->faker->word();
        $idUsuario = $this->faker->word();

        $response = $this->put(route('domicilios.update', $domicilio), [
            'idEstudio' => $idEstudio,
            'delegacionMunicipio' => $delegacionMunicipio,
            'ciudad' => $ciudad,
            'estado' => $estado,
            'cp' => $cp,
            'tiempoResindir' => $tiempoResindir,
            'tel1' => $tel1,
            'tel2' => $tel2,
            'tel3' => $tel3,
            'cel1' => $cel1,
            'cel2' => $cel2,
            'cel3' => $cel3,
            'calle' => $calle,
            'numero' => $numero,
            'colonia' => $colonia,
            'idUsuario' => $idUsuario,
        ]);

        $domicilio->refresh();

        $response->assertRedirect(route('domicilios.index'));
        $response->assertSessionHas('domicilio.id', $domicilio->id);

        $this->assertEquals($idEstudio, $domicilio->idEstudio);
        $this->assertEquals($delegacionMunicipio, $domicilio->delegacionMunicipio);
        $this->assertEquals($ciudad, $domicilio->ciudad);
        $this->assertEquals($estado, $domicilio->estado);
        $this->assertEquals($cp, $domicilio->cp);
        $this->assertEquals($tiempoResindir, $domicilio->tiempoResindir);
        $this->assertEquals($tel1, $domicilio->tel1);
        $this->assertEquals($tel2, $domicilio->tel2);
        $this->assertEquals($tel3, $domicilio->tel3);
        $this->assertEquals($cel1, $domicilio->cel1);
        $this->assertEquals($cel2, $domicilio->cel2);
        $this->assertEquals($cel3, $domicilio->cel3);
        $this->assertEquals($calle, $domicilio->calle);
        $this->assertEquals($numero, $domicilio->numero);
        $this->assertEquals($colonia, $domicilio->colonia);
        $this->assertEquals($idUsuario, $domicilio->idUsuario);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $domicilio = Domicilio::factory()->create();

        $response = $this->delete(route('domicilios.destroy', $domicilio));

        $response->assertRedirect(route('domicilios.index'));

        $this->assertModelMissing($domicilio);
    }
}
