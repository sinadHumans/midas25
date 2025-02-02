<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Seguro;
use App\Models\Seguros;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\SegurosController
 */
final class SegurosControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $seguros = Seguros::factory()->count(3)->create();

        $response = $this->get(route('seguros.index'));

        $response->assertOk();
        $response->assertViewIs('seguro.index');
        $response->assertViewHas('seguros');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('seguros.create'));

        $response->assertOk();
        $response->assertViewIs('seguro.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\SegurosController::class,
            'store',
            \App\Http\Requests\SegurosStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $institucion = $this->faker->word();
        $tipo = $this->faker->word();
        $forma = $this->faker->word();
        $prima = $this->faker->word();
        $vigencia = $this->faker->word();
        $idUsuario = $this->faker->word();

        $response = $this->post(route('seguros.store'), [
            'institucion' => $institucion,
            'tipo' => $tipo,
            'forma' => $forma,
            'prima' => $prima,
            'vigencia' => $vigencia,
            'idUsuario' => $idUsuario,
        ]);

        $seguros = Seguro::query()
            ->where('institucion', $institucion)
            ->where('tipo', $tipo)
            ->where('forma', $forma)
            ->where('prima', $prima)
            ->where('vigencia', $vigencia)
            ->where('idUsuario', $idUsuario)
            ->get();
        $this->assertCount(1, $seguros);
        $seguro = $seguros->first();

        $response->assertRedirect(route('seguros.index'));
        $response->assertSessionHas('seguro.id', $seguro->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $seguro = Seguros::factory()->create();

        $response = $this->get(route('seguros.show', $seguro));

        $response->assertOk();
        $response->assertViewIs('seguro.show');
        $response->assertViewHas('seguro');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $seguro = Seguros::factory()->create();

        $response = $this->get(route('seguros.edit', $seguro));

        $response->assertOk();
        $response->assertViewIs('seguro.edit');
        $response->assertViewHas('seguro');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\SegurosController::class,
            'update',
            \App\Http\Requests\SegurosUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $seguro = Seguros::factory()->create();
        $institucion = $this->faker->word();
        $tipo = $this->faker->word();
        $forma = $this->faker->word();
        $prima = $this->faker->word();
        $vigencia = $this->faker->word();
        $idUsuario = $this->faker->word();

        $response = $this->put(route('seguros.update', $seguro), [
            'institucion' => $institucion,
            'tipo' => $tipo,
            'forma' => $forma,
            'prima' => $prima,
            'vigencia' => $vigencia,
            'idUsuario' => $idUsuario,
        ]);

        $seguro->refresh();

        $response->assertRedirect(route('seguros.index'));
        $response->assertSessionHas('seguro.id', $seguro->id);

        $this->assertEquals($institucion, $seguro->institucion);
        $this->assertEquals($tipo, $seguro->tipo);
        $this->assertEquals($forma, $seguro->forma);
        $this->assertEquals($prima, $seguro->prima);
        $this->assertEquals($vigencia, $seguro->vigencia);
        $this->assertEquals($idUsuario, $seguro->idUsuario);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $seguro = Seguros::factory()->create();
        $seguro = Seguro::factory()->create();

        $response = $this->delete(route('seguros.destroy', $seguro));

        $response->assertRedirect(route('seguros.index'));

        $this->assertModelMissing($seguro);
    }
}
