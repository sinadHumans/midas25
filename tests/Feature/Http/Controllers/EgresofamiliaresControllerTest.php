<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Egresofamiliare;
use App\Models\Egresofamiliares;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\EgresofamiliaresController
 */
final class EgresofamiliaresControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $egresofamiliares = Egresofamiliares::factory()->count(3)->create();

        $response = $this->get(route('egresofamiliares.index'));

        $response->assertOk();
        $response->assertViewIs('egresofamiliare.index');
        $response->assertViewHas('egresofamiliares');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('egresofamiliares.create'));

        $response->assertOk();
        $response->assertViewIs('egresofamiliare.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\EgresofamiliaresController::class,
            'store',
            \App\Http\Requests\EgresofamiliaresStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $ahorro = $this->faker->word();
        $alimentacion = $this->faker->word();
        $transporte = $this->faker->word();
        $seguros = $this->faker->word();
        $luz = $this->faker->word();
        $tv = $this->faker->word();
        $gas = $this->faker->word();
        $celular = $this->faker->word();
        $agua = $this->faker->word();
        $total = $this->faker->word();
        $comentarios = $this->faker->text();
        $idUsuario = $this->faker->word();

        $response = $this->post(route('egresofamiliares.store'), [
            'ahorro' => $ahorro,
            'alimentacion' => $alimentacion,
            'transporte' => $transporte,
            'seguros' => $seguros,
            'luz' => $luz,
            'tv' => $tv,
            'gas' => $gas,
            'celular' => $celular,
            'agua' => $agua,
            'total' => $total,
            'comentarios' => $comentarios,
            'idUsuario' => $idUsuario,
        ]);

        $egresofamiliares = Egresofamiliare::query()
            ->where('ahorro', $ahorro)
            ->where('alimentacion', $alimentacion)
            ->where('transporte', $transporte)
            ->where('seguros', $seguros)
            ->where('luz', $luz)
            ->where('tv', $tv)
            ->where('gas', $gas)
            ->where('celular', $celular)
            ->where('agua', $agua)
            ->where('total', $total)
            ->where('comentarios', $comentarios)
            ->where('idUsuario', $idUsuario)
            ->get();
        $this->assertCount(1, $egresofamiliares);
        $egresofamiliare = $egresofamiliares->first();

        $response->assertRedirect(route('egresofamiliares.index'));
        $response->assertSessionHas('egresofamiliare.id', $egresofamiliare->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $egresofamiliare = Egresofamiliares::factory()->create();

        $response = $this->get(route('egresofamiliares.show', $egresofamiliare));

        $response->assertOk();
        $response->assertViewIs('egresofamiliare.show');
        $response->assertViewHas('egresofamiliare');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $egresofamiliare = Egresofamiliares::factory()->create();

        $response = $this->get(route('egresofamiliares.edit', $egresofamiliare));

        $response->assertOk();
        $response->assertViewIs('egresofamiliare.edit');
        $response->assertViewHas('egresofamiliare');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\EgresofamiliaresController::class,
            'update',
            \App\Http\Requests\EgresofamiliaresUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $egresofamiliare = Egresofamiliares::factory()->create();
        $ahorro = $this->faker->word();
        $alimentacion = $this->faker->word();
        $transporte = $this->faker->word();
        $seguros = $this->faker->word();
        $luz = $this->faker->word();
        $tv = $this->faker->word();
        $gas = $this->faker->word();
        $celular = $this->faker->word();
        $agua = $this->faker->word();
        $total = $this->faker->word();
        $comentarios = $this->faker->text();
        $idUsuario = $this->faker->word();

        $response = $this->put(route('egresofamiliares.update', $egresofamiliare), [
            'ahorro' => $ahorro,
            'alimentacion' => $alimentacion,
            'transporte' => $transporte,
            'seguros' => $seguros,
            'luz' => $luz,
            'tv' => $tv,
            'gas' => $gas,
            'celular' => $celular,
            'agua' => $agua,
            'total' => $total,
            'comentarios' => $comentarios,
            'idUsuario' => $idUsuario,
        ]);

        $egresofamiliare->refresh();

        $response->assertRedirect(route('egresofamiliares.index'));
        $response->assertSessionHas('egresofamiliare.id', $egresofamiliare->id);

        $this->assertEquals($ahorro, $egresofamiliare->ahorro);
        $this->assertEquals($alimentacion, $egresofamiliare->alimentacion);
        $this->assertEquals($transporte, $egresofamiliare->transporte);
        $this->assertEquals($seguros, $egresofamiliare->seguros);
        $this->assertEquals($luz, $egresofamiliare->luz);
        $this->assertEquals($tv, $egresofamiliare->tv);
        $this->assertEquals($gas, $egresofamiliare->gas);
        $this->assertEquals($celular, $egresofamiliare->celular);
        $this->assertEquals($agua, $egresofamiliare->agua);
        $this->assertEquals($total, $egresofamiliare->total);
        $this->assertEquals($comentarios, $egresofamiliare->comentarios);
        $this->assertEquals($idUsuario, $egresofamiliare->idUsuario);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $egresofamiliare = Egresofamiliares::factory()->create();
        $egresofamiliare = Egresofamiliare::factory()->create();

        $response = $this->delete(route('egresofamiliares.destroy', $egresofamiliare));

        $response->assertRedirect(route('egresofamiliares.index'));

        $this->assertModelMissing($egresofamiliare);
    }
}
