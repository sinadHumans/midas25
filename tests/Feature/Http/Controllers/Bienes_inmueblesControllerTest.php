<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\BienesInmueble;
use App\Models\Bienes_inmuebles;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Bienes_inmueblesController
 */
final class Bienes_inmueblesControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $bienesInmuebles = Bienes_inmuebles::factory()->count(3)->create();

        $response = $this->get(route('bienes_inmuebles.index'));

        $response->assertOk();
        $response->assertViewIs('bienesInmueble.index');
        $response->assertViewHas('bienesInmuebles');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('bienes_inmuebles.create'));

        $response->assertOk();
        $response->assertViewIs('bienesInmueble.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Bienes_inmueblesController::class,
            'store',
            \App\Http\Requests\Bienes_inmueblesStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $response = $this->post(route('bienes_inmuebles.store'));

        $response->assertRedirect(route('bienesInmuebles.index'));
        $response->assertSessionHas('bienesInmueble.id', $bienesInmueble->id);

        $this->assertDatabaseHas(bienesInmuebles, [ /* ... */ ]);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $bienesInmueble = Bienes_inmuebles::factory()->create();

        $response = $this->get(route('bienes_inmuebles.show', $bienesInmueble));

        $response->assertOk();
        $response->assertViewIs('bienesInmueble.show');
        $response->assertViewHas('bienesInmueble');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $bienesInmueble = Bienes_inmuebles::factory()->create();

        $response = $this->get(route('bienes_inmuebles.edit', $bienesInmueble));

        $response->assertOk();
        $response->assertViewIs('bienesInmueble.edit');
        $response->assertViewHas('bienesInmueble');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Bienes_inmueblesController::class,
            'update',
            \App\Http\Requests\Bienes_inmueblesUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $bienesInmueble = Bienes_inmuebles::factory()->create();

        $response = $this->put(route('bienes_inmuebles.update', $bienesInmueble));

        $bienesInmueble->refresh();

        $response->assertRedirect(route('bienesInmuebles.index'));
        $response->assertSessionHas('bienesInmueble.id', $bienesInmueble->id);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $bienesInmueble = Bienes_inmuebles::factory()->create();
        $bienesInmueble = BienesInmueble::factory()->create();

        $response = $this->delete(route('bienes_inmuebles.destroy', $bienesInmueble));

        $response->assertRedirect(route('bienesInmuebles.index'));

        $this->assertModelMissing($bienesInmueble);
    }
}
