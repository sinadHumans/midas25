<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Acceso;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\AccesoController
 */
final class AccesoControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $accesos = Acceso::factory()->count(3)->create();

        $response = $this->get(route('accesos.index'));

        $response->assertOk();
        $response->assertViewIs('acceso.index');
        $response->assertViewHas('accesos');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('accesos.create'));

        $response->assertOk();
        $response->assertViewIs('acceso.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\AccesoController::class,
            'store',
            \App\Http\Requests\AccesoStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $acceso = $this->faker->word();

        $response = $this->post(route('accesos.store'), [
            'acceso' => $acceso,
        ]);

        $accesos = Acceso::query()
            ->where('acceso', $acceso)
            ->get();
        $this->assertCount(1, $accesos);
        $acceso = $accesos->first();

        $response->assertRedirect(route('accesos.index'));
        $response->assertSessionHas('acceso.id', $acceso->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $acceso = Acceso::factory()->create();

        $response = $this->get(route('accesos.show', $acceso));

        $response->assertOk();
        $response->assertViewIs('acceso.show');
        $response->assertViewHas('acceso');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $acceso = Acceso::factory()->create();

        $response = $this->get(route('accesos.edit', $acceso));

        $response->assertOk();
        $response->assertViewIs('acceso.edit');
        $response->assertViewHas('acceso');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\AccesoController::class,
            'update',
            \App\Http\Requests\AccesoUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $acceso = Acceso::factory()->create();
        $acceso = $this->faker->word();

        $response = $this->put(route('accesos.update', $acceso), [
            'acceso' => $acceso,
        ]);

        $acceso->refresh();

        $response->assertRedirect(route('accesos.index'));
        $response->assertSessionHas('acceso.id', $acceso->id);

        $this->assertEquals($acceso, $acceso->acceso);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $acceso = Acceso::factory()->create();

        $response = $this->delete(route('accesos.destroy', $acceso));

        $response->assertRedirect(route('accesos.index'));

        $this->assertModelMissing($acceso);
    }
}
