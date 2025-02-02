<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\DocumentosPresentado;
use App\Models\Documentos_presentados;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Documentos_presentadosController
 */
final class Documentos_presentadosControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $documentosPresentados = Documentos_presentados::factory()->count(3)->create();

        $response = $this->get(route('documentos_presentados.index'));

        $response->assertOk();
        $response->assertViewIs('documentosPresentado.index');
        $response->assertViewHas('documentosPresentados');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('documentos_presentados.create'));

        $response->assertOk();
        $response->assertViewIs('documentosPresentado.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Documentos_presentadosController::class,
            'store',
            \App\Http\Requests\Documentos_presentadosStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $response = $this->post(route('documentos_presentados.store'));

        $response->assertRedirect(route('documentosPresentados.index'));
        $response->assertSessionHas('documentosPresentado.id', $documentosPresentado->id);

        $this->assertDatabaseHas(documentosPresentados, [ /* ... */ ]);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $documentosPresentado = Documentos_presentados::factory()->create();

        $response = $this->get(route('documentos_presentados.show', $documentosPresentado));

        $response->assertOk();
        $response->assertViewIs('documentosPresentado.show');
        $response->assertViewHas('documentosPresentado');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $documentosPresentado = Documentos_presentados::factory()->create();

        $response = $this->get(route('documentos_presentados.edit', $documentosPresentado));

        $response->assertOk();
        $response->assertViewIs('documentosPresentado.edit');
        $response->assertViewHas('documentosPresentado');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Documentos_presentadosController::class,
            'update',
            \App\Http\Requests\Documentos_presentadosUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $documentosPresentado = Documentos_presentados::factory()->create();

        $response = $this->put(route('documentos_presentados.update', $documentosPresentado));

        $documentosPresentado->refresh();

        $response->assertRedirect(route('documentosPresentados.index'));
        $response->assertSessionHas('documentosPresentado.id', $documentosPresentado->id);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $documentosPresentado = Documentos_presentados::factory()->create();
        $documentosPresentado = DocumentosPresentado::factory()->create();

        $response = $this->delete(route('documentos_presentados.destroy', $documentosPresentado));

        $response->assertRedirect(route('documentosPresentados.index'));

        $this->assertModelMissing($documentosPresentado);
    }
}
