<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Documentospresentado;
use App\Models\Documentospresentados;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\DocumentospresentadosController
 */
final class DocumentospresentadosControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $documentospresentados = Documentospresentados::factory()->count(3)->create();

        $response = $this->get(route('documentospresentados.index'));

        $response->assertOk();
        $response->assertViewIs('documentospresentado.index');
        $response->assertViewHas('documentospresentados');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('documentospresentados.create'));

        $response->assertOk();
        $response->assertViewIs('documentospresentado.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\DocumentospresentadosController::class,
            'store',
            \App\Http\Requests\DocumentospresentadosStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $documento = $this->faker->word();
        $ine = $this->faker->word();
        $comprobante = $this->faker->word();
        $acta = $this->faker->word();
        $cartas = $this->faker->word();
        $aviso = $this->faker->word();
        $comentarios = $this->faker->text();
        $idUsuario = $this->faker->word();

        $response = $this->post(route('documentospresentados.store'), [
            'documento' => $documento,
            'ine' => $ine,
            'comprobante' => $comprobante,
            'acta' => $acta,
            'cartas' => $cartas,
            'aviso' => $aviso,
            'comentarios' => $comentarios,
            'idUsuario' => $idUsuario,
        ]);

        $documentospresentados = Documentospresentado::query()
            ->where('documento', $documento)
            ->where('ine', $ine)
            ->where('comprobante', $comprobante)
            ->where('acta', $acta)
            ->where('cartas', $cartas)
            ->where('aviso', $aviso)
            ->where('comentarios', $comentarios)
            ->where('idUsuario', $idUsuario)
            ->get();
        $this->assertCount(1, $documentospresentados);
        $documentospresentado = $documentospresentados->first();

        $response->assertRedirect(route('documentospresentados.index'));
        $response->assertSessionHas('documentospresentado.id', $documentospresentado->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $documentospresentado = Documentospresentados::factory()->create();

        $response = $this->get(route('documentospresentados.show', $documentospresentado));

        $response->assertOk();
        $response->assertViewIs('documentospresentado.show');
        $response->assertViewHas('documentospresentado');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $documentospresentado = Documentospresentados::factory()->create();

        $response = $this->get(route('documentospresentados.edit', $documentospresentado));

        $response->assertOk();
        $response->assertViewIs('documentospresentado.edit');
        $response->assertViewHas('documentospresentado');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\DocumentospresentadosController::class,
            'update',
            \App\Http\Requests\DocumentospresentadosUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $documentospresentado = Documentospresentados::factory()->create();
        $documento = $this->faker->word();
        $ine = $this->faker->word();
        $comprobante = $this->faker->word();
        $acta = $this->faker->word();
        $cartas = $this->faker->word();
        $aviso = $this->faker->word();
        $comentarios = $this->faker->text();
        $idUsuario = $this->faker->word();

        $response = $this->put(route('documentospresentados.update', $documentospresentado), [
            'documento' => $documento,
            'ine' => $ine,
            'comprobante' => $comprobante,
            'acta' => $acta,
            'cartas' => $cartas,
            'aviso' => $aviso,
            'comentarios' => $comentarios,
            'idUsuario' => $idUsuario,
        ]);

        $documentospresentado->refresh();

        $response->assertRedirect(route('documentospresentados.index'));
        $response->assertSessionHas('documentospresentado.id', $documentospresentado->id);

        $this->assertEquals($documento, $documentospresentado->documento);
        $this->assertEquals($ine, $documentospresentado->ine);
        $this->assertEquals($comprobante, $documentospresentado->comprobante);
        $this->assertEquals($acta, $documentospresentado->acta);
        $this->assertEquals($cartas, $documentospresentado->cartas);
        $this->assertEquals($aviso, $documentospresentado->aviso);
        $this->assertEquals($comentarios, $documentospresentado->comentarios);
        $this->assertEquals($idUsuario, $documentospresentado->idUsuario);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $documentospresentado = Documentospresentados::factory()->create();
        $documentospresentado = Documentospresentado::factory()->create();

        $response = $this->delete(route('documentospresentados.destroy', $documentospresentado));

        $response->assertRedirect(route('documentospresentados.index'));

        $this->assertModelMissing($documentospresentado);
    }
}
