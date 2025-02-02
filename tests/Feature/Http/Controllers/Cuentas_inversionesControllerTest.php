<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\CuentasInversione;
use App\Models\Cuentas_inversiones;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Cuentas_inversionesController
 */
final class Cuentas_inversionesControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $cuentasInversiones = Cuentas_inversiones::factory()->count(3)->create();

        $response = $this->get(route('cuentas_inversiones.index'));

        $response->assertOk();
        $response->assertViewIs('cuentasInversione.index');
        $response->assertViewHas('cuentasInversiones');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('cuentas_inversiones.create'));

        $response->assertOk();
        $response->assertViewIs('cuentasInversione.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Cuentas_inversionesController::class,
            'store',
            \App\Http\Requests\Cuentas_inversionesStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $response = $this->post(route('cuentas_inversiones.store'));

        $response->assertRedirect(route('cuentasInversiones.index'));
        $response->assertSessionHas('cuentasInversione.id', $cuentasInversione->id);

        $this->assertDatabaseHas(cuentasInversiones, [ /* ... */ ]);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $cuentasInversione = Cuentas_inversiones::factory()->create();

        $response = $this->get(route('cuentas_inversiones.show', $cuentasInversione));

        $response->assertOk();
        $response->assertViewIs('cuentasInversione.show');
        $response->assertViewHas('cuentasInversione');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $cuentasInversione = Cuentas_inversiones::factory()->create();

        $response = $this->get(route('cuentas_inversiones.edit', $cuentasInversione));

        $response->assertOk();
        $response->assertViewIs('cuentasInversione.edit');
        $response->assertViewHas('cuentasInversione');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Cuentas_inversionesController::class,
            'update',
            \App\Http\Requests\Cuentas_inversionesUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $cuentasInversione = Cuentas_inversiones::factory()->create();

        $response = $this->put(route('cuentas_inversiones.update', $cuentasInversione));

        $cuentasInversione->refresh();

        $response->assertRedirect(route('cuentasInversiones.index'));
        $response->assertSessionHas('cuentasInversione.id', $cuentasInversione->id);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $cuentasInversione = Cuentas_inversiones::factory()->create();
        $cuentasInversione = CuentasInversione::factory()->create();

        $response = $this->delete(route('cuentas_inversiones.destroy', $cuentasInversione));

        $response->assertRedirect(route('cuentasInversiones.index'));

        $this->assertModelMissing($cuentasInversione);
    }
}
