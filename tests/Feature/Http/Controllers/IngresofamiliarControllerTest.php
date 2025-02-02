<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Ingresofamiliar;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\IngresofamiliarController
 */
final class IngresofamiliarControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $ingresofamiliars = Ingresofamiliar::factory()->count(3)->create();

        $response = $this->get(route('ingresofamiliars.index'));

        $response->assertOk();
        $response->assertViewIs('ingresofamiliar.index');
        $response->assertViewHas('ingresofamiliars');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('ingresofamiliars.create'));

        $response->assertOk();
        $response->assertViewIs('ingresofamiliar.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\IngresofamiliarController::class,
            'store',
            \App\Http\Requests\IngresofamiliarStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $quien = $this->faker->word();
        $fuente = $this->faker->word();
        $monto = $this->faker->word();
        $total = $this->faker->word();
        $comentarios = $this->faker->text();
        $idUsuario = $this->faker->word();

        $response = $this->post(route('ingresofamiliars.store'), [
            'quien' => $quien,
            'fuente' => $fuente,
            'monto' => $monto,
            'total' => $total,
            'comentarios' => $comentarios,
            'idUsuario' => $idUsuario,
        ]);

        $ingresofamiliars = Ingresofamiliar::query()
            ->where('quien', $quien)
            ->where('fuente', $fuente)
            ->where('monto', $monto)
            ->where('total', $total)
            ->where('comentarios', $comentarios)
            ->where('idUsuario', $idUsuario)
            ->get();
        $this->assertCount(1, $ingresofamiliars);
        $ingresofamiliar = $ingresofamiliars->first();

        $response->assertRedirect(route('ingresofamiliars.index'));
        $response->assertSessionHas('ingresofamiliar.id', $ingresofamiliar->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $ingresofamiliar = Ingresofamiliar::factory()->create();

        $response = $this->get(route('ingresofamiliars.show', $ingresofamiliar));

        $response->assertOk();
        $response->assertViewIs('ingresofamiliar.show');
        $response->assertViewHas('ingresofamiliar');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $ingresofamiliar = Ingresofamiliar::factory()->create();

        $response = $this->get(route('ingresofamiliars.edit', $ingresofamiliar));

        $response->assertOk();
        $response->assertViewIs('ingresofamiliar.edit');
        $response->assertViewHas('ingresofamiliar');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\IngresofamiliarController::class,
            'update',
            \App\Http\Requests\IngresofamiliarUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $ingresofamiliar = Ingresofamiliar::factory()->create();
        $quien = $this->faker->word();
        $fuente = $this->faker->word();
        $monto = $this->faker->word();
        $total = $this->faker->word();
        $comentarios = $this->faker->text();
        $idUsuario = $this->faker->word();

        $response = $this->put(route('ingresofamiliars.update', $ingresofamiliar), [
            'quien' => $quien,
            'fuente' => $fuente,
            'monto' => $monto,
            'total' => $total,
            'comentarios' => $comentarios,
            'idUsuario' => $idUsuario,
        ]);

        $ingresofamiliar->refresh();

        $response->assertRedirect(route('ingresofamiliars.index'));
        $response->assertSessionHas('ingresofamiliar.id', $ingresofamiliar->id);

        $this->assertEquals($quien, $ingresofamiliar->quien);
        $this->assertEquals($fuente, $ingresofamiliar->fuente);
        $this->assertEquals($monto, $ingresofamiliar->monto);
        $this->assertEquals($total, $ingresofamiliar->total);
        $this->assertEquals($comentarios, $ingresofamiliar->comentarios);
        $this->assertEquals($idUsuario, $ingresofamiliar->idUsuario);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $ingresofamiliar = Ingresofamiliar::factory()->create();

        $response = $this->delete(route('ingresofamiliars.destroy', $ingresofamiliar));

        $response->assertRedirect(route('ingresofamiliars.index'));

        $this->assertModelMissing($ingresofamiliar);
    }
}
