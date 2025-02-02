<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\EgresoFamiliare;
use App\Models\Egreso_familiares;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Egreso_familiaresController
 */
final class Egreso_familiaresControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $egresoFamiliares = Egreso_familiares::factory()->count(3)->create();

        $response = $this->get(route('egreso_familiares.index'));

        $response->assertOk();
        $response->assertViewIs('egresoFamiliare.index');
        $response->assertViewHas('egresoFamiliares');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('egreso_familiares.create'));

        $response->assertOk();
        $response->assertViewIs('egresoFamiliare.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Egreso_familiaresController::class,
            'store',
            \App\Http\Requests\Egreso_familiaresStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $response = $this->post(route('egreso_familiares.store'));

        $response->assertRedirect(route('egresoFamiliares.index'));
        $response->assertSessionHas('egresoFamiliare.id', $egresoFamiliare->id);

        $this->assertDatabaseHas(egresoFamiliares, [ /* ... */ ]);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $egresoFamiliare = Egreso_familiares::factory()->create();

        $response = $this->get(route('egreso_familiares.show', $egresoFamiliare));

        $response->assertOk();
        $response->assertViewIs('egresoFamiliare.show');
        $response->assertViewHas('egresoFamiliare');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $egresoFamiliare = Egreso_familiares::factory()->create();

        $response = $this->get(route('egreso_familiares.edit', $egresoFamiliare));

        $response->assertOk();
        $response->assertViewIs('egresoFamiliare.edit');
        $response->assertViewHas('egresoFamiliare');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Egreso_familiaresController::class,
            'update',
            \App\Http\Requests\Egreso_familiaresUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $egresoFamiliare = Egreso_familiares::factory()->create();

        $response = $this->put(route('egreso_familiares.update', $egresoFamiliare));

        $egresoFamiliare->refresh();

        $response->assertRedirect(route('egresoFamiliares.index'));
        $response->assertSessionHas('egresoFamiliare.id', $egresoFamiliare->id);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $egresoFamiliare = Egreso_familiares::factory()->create();
        $egresoFamiliare = EgresoFamiliare::factory()->create();

        $response = $this->delete(route('egreso_familiares.destroy', $egresoFamiliare));

        $response->assertRedirect(route('egresoFamiliares.index'));

        $this->assertModelMissing($egresoFamiliare);
    }
}
