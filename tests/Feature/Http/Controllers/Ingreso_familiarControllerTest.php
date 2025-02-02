<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\IngresoFamiliar;
use App\Models\Ingreso_familiar;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Ingreso_familiarController
 */
final class Ingreso_familiarControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $ingresoFamiliars = Ingreso_familiar::factory()->count(3)->create();

        $response = $this->get(route('ingreso_familiars.index'));

        $response->assertOk();
        $response->assertViewIs('ingresoFamiliar.index');
        $response->assertViewHas('ingresoFamiliars');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('ingreso_familiars.create'));

        $response->assertOk();
        $response->assertViewIs('ingresoFamiliar.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Ingreso_familiarController::class,
            'store',
            \App\Http\Requests\Ingreso_familiarStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $response = $this->post(route('ingreso_familiars.store'));

        $response->assertRedirect(route('ingresoFamiliars.index'));
        $response->assertSessionHas('ingresoFamiliar.id', $ingresoFamiliar->id);

        $this->assertDatabaseHas(ingresoFamiliars, [ /* ... */ ]);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $ingresoFamiliar = Ingreso_familiar::factory()->create();

        $response = $this->get(route('ingreso_familiars.show', $ingresoFamiliar));

        $response->assertOk();
        $response->assertViewIs('ingresoFamiliar.show');
        $response->assertViewHas('ingresoFamiliar');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $ingresoFamiliar = Ingreso_familiar::factory()->create();

        $response = $this->get(route('ingreso_familiars.edit', $ingresoFamiliar));

        $response->assertOk();
        $response->assertViewIs('ingresoFamiliar.edit');
        $response->assertViewHas('ingresoFamiliar');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Ingreso_familiarController::class,
            'update',
            \App\Http\Requests\Ingreso_familiarUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $ingresoFamiliar = Ingreso_familiar::factory()->create();

        $response = $this->put(route('ingreso_familiars.update', $ingresoFamiliar));

        $ingresoFamiliar->refresh();

        $response->assertRedirect(route('ingresoFamiliars.index'));
        $response->assertSessionHas('ingresoFamiliar.id', $ingresoFamiliar->id);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $ingresoFamiliar = Ingreso_familiar::factory()->create();
        $ingresoFamiliar = IngresoFamiliar::factory()->create();

        $response = $this->delete(route('ingreso_familiars.destroy', $ingresoFamiliar));

        $response->assertRedirect(route('ingresoFamiliars.index'));

        $this->assertModelMissing($ingresoFamiliar);
    }
}
