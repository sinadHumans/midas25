<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Bienesinmueble;
use App\Models\Bienesinmuebles;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\BienesinmueblesController
 */
final class BienesinmueblesControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $bienesinmuebles = Bienesinmuebles::factory()->count(3)->create();

        $response = $this->get(route('bienesinmuebles.index'));

        $response->assertOk();
        $response->assertViewIs('bienesinmueble.index');
        $response->assertViewHas('bienesinmuebles');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('bienesinmuebles.create'));

        $response->assertOk();
        $response->assertViewIs('bienesinmueble.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\BienesinmueblesController::class,
            'store',
            \App\Http\Requests\BienesinmueblesStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $tipo = $this->faker->word();
        $ubicacion = $this->faker->word();
        $valor = $this->faker->word();
        $pagado = $this->faker->word();
        $abono = $this->faker->word();
        $idUsuario = $this->faker->word();

        $response = $this->post(route('bienesinmuebles.store'), [
            'tipo' => $tipo,
            'ubicacion' => $ubicacion,
            'valor' => $valor,
            'pagado' => $pagado,
            'abono' => $abono,
            'idUsuario' => $idUsuario,
        ]);

        $bienesinmuebles = Bienesinmueble::query()
            ->where('tipo', $tipo)
            ->where('ubicacion', $ubicacion)
            ->where('valor', $valor)
            ->where('pagado', $pagado)
            ->where('abono', $abono)
            ->where('idUsuario', $idUsuario)
            ->get();
        $this->assertCount(1, $bienesinmuebles);
        $bienesinmueble = $bienesinmuebles->first();

        $response->assertRedirect(route('bienesinmuebles.index'));
        $response->assertSessionHas('bienesinmueble.id', $bienesinmueble->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $bienesinmueble = Bienesinmuebles::factory()->create();

        $response = $this->get(route('bienesinmuebles.show', $bienesinmueble));

        $response->assertOk();
        $response->assertViewIs('bienesinmueble.show');
        $response->assertViewHas('bienesinmueble');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $bienesinmueble = Bienesinmuebles::factory()->create();

        $response = $this->get(route('bienesinmuebles.edit', $bienesinmueble));

        $response->assertOk();
        $response->assertViewIs('bienesinmueble.edit');
        $response->assertViewHas('bienesinmueble');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\BienesinmueblesController::class,
            'update',
            \App\Http\Requests\BienesinmueblesUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $bienesinmueble = Bienesinmuebles::factory()->create();
        $tipo = $this->faker->word();
        $ubicacion = $this->faker->word();
        $valor = $this->faker->word();
        $pagado = $this->faker->word();
        $abono = $this->faker->word();
        $idUsuario = $this->faker->word();

        $response = $this->put(route('bienesinmuebles.update', $bienesinmueble), [
            'tipo' => $tipo,
            'ubicacion' => $ubicacion,
            'valor' => $valor,
            'pagado' => $pagado,
            'abono' => $abono,
            'idUsuario' => $idUsuario,
        ]);

        $bienesinmueble->refresh();

        $response->assertRedirect(route('bienesinmuebles.index'));
        $response->assertSessionHas('bienesinmueble.id', $bienesinmueble->id);

        $this->assertEquals($tipo, $bienesinmueble->tipo);
        $this->assertEquals($ubicacion, $bienesinmueble->ubicacion);
        $this->assertEquals($valor, $bienesinmueble->valor);
        $this->assertEquals($pagado, $bienesinmueble->pagado);
        $this->assertEquals($abono, $bienesinmueble->abono);
        $this->assertEquals($idUsuario, $bienesinmueble->idUsuario);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $bienesinmueble = Bienesinmuebles::factory()->create();
        $bienesinmueble = Bienesinmueble::factory()->create();

        $response = $this->delete(route('bienesinmuebles.destroy', $bienesinmueble));

        $response->assertRedirect(route('bienesinmuebles.index'));

        $this->assertModelMissing($bienesinmueble);
    }
}
