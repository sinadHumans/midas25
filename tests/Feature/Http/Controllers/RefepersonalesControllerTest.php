<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Refepersonale;
use App\Models\Refepersonales;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\RefepersonalesController
 */
final class RefepersonalesControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $refepersonales = Refepersonales::factory()->count(3)->create();

        $response = $this->get(route('refepersonales.index'));

        $response->assertOk();
        $response->assertViewIs('refepersonale.index');
        $response->assertViewHas('refepersonales');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('refepersonales.create'));

        $response->assertOk();
        $response->assertViewIs('refepersonale.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\RefepersonalesController::class,
            'store',
            \App\Http\Requests\RefepersonalesStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $idEstudio = $this->faker->word();
        $nombre = $this->faker->word();
        $tiempoConocerlo = $this->faker->word();
        $relacion = $this->faker->word();
        $domicilio = $this->faker->word();
        $tel1 = $this->faker->word();
        $opinion = $this->faker->text();
        $idUsuario = $this->faker->word();

        $response = $this->post(route('refepersonales.store'), [
            'idEstudio' => $idEstudio,
            'nombre' => $nombre,
            'tiempoConocerlo' => $tiempoConocerlo,
            'relacion' => $relacion,
            'domicilio' => $domicilio,
            'tel1' => $tel1,
            'opinion' => $opinion,
            'idUsuario' => $idUsuario,
        ]);

        $refepersonales = Refepersonale::query()
            ->where('idEstudio', $idEstudio)
            ->where('nombre', $nombre)
            ->where('tiempoConocerlo', $tiempoConocerlo)
            ->where('relacion', $relacion)
            ->where('domicilio', $domicilio)
            ->where('tel1', $tel1)
            ->where('opinion', $opinion)
            ->where('idUsuario', $idUsuario)
            ->get();
        $this->assertCount(1, $refepersonales);
        $refepersonale = $refepersonales->first();

        $response->assertRedirect(route('refepersonales.index'));
        $response->assertSessionHas('refepersonale.id', $refepersonale->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $refepersonale = Refepersonales::factory()->create();

        $response = $this->get(route('refepersonales.show', $refepersonale));

        $response->assertOk();
        $response->assertViewIs('refepersonale.show');
        $response->assertViewHas('refepersonale');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $refepersonale = Refepersonales::factory()->create();

        $response = $this->get(route('refepersonales.edit', $refepersonale));

        $response->assertOk();
        $response->assertViewIs('refepersonale.edit');
        $response->assertViewHas('refepersonale');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\RefepersonalesController::class,
            'update',
            \App\Http\Requests\RefepersonalesUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $refepersonale = Refepersonales::factory()->create();
        $idEstudio = $this->faker->word();
        $nombre = $this->faker->word();
        $tiempoConocerlo = $this->faker->word();
        $relacion = $this->faker->word();
        $domicilio = $this->faker->word();
        $tel1 = $this->faker->word();
        $opinion = $this->faker->text();
        $idUsuario = $this->faker->word();

        $response = $this->put(route('refepersonales.update', $refepersonale), [
            'idEstudio' => $idEstudio,
            'nombre' => $nombre,
            'tiempoConocerlo' => $tiempoConocerlo,
            'relacion' => $relacion,
            'domicilio' => $domicilio,
            'tel1' => $tel1,
            'opinion' => $opinion,
            'idUsuario' => $idUsuario,
        ]);

        $refepersonale->refresh();

        $response->assertRedirect(route('refepersonales.index'));
        $response->assertSessionHas('refepersonale.id', $refepersonale->id);

        $this->assertEquals($idEstudio, $refepersonale->idEstudio);
        $this->assertEquals($nombre, $refepersonale->nombre);
        $this->assertEquals($tiempoConocerlo, $refepersonale->tiempoConocerlo);
        $this->assertEquals($relacion, $refepersonale->relacion);
        $this->assertEquals($domicilio, $refepersonale->domicilio);
        $this->assertEquals($tel1, $refepersonale->tel1);
        $this->assertEquals($opinion, $refepersonale->opinion);
        $this->assertEquals($idUsuario, $refepersonale->idUsuario);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $refepersonale = Refepersonales::factory()->create();
        $refepersonale = Refepersonale::factory()->create();

        $response = $this->delete(route('refepersonales.destroy', $refepersonale));

        $response->assertRedirect(route('refepersonales.index'));

        $this->assertModelMissing($refepersonale);
    }
}
