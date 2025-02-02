<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Credito;
use App\Models\Creditos;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\CreditosController
 */
final class CreditosControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $creditos = Creditos::factory()->count(3)->create();

        $response = $this->get(route('creditos.index'));

        $response->assertOk();
        $response->assertViewIs('credito.index');
        $response->assertViewHas('creditos');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('creditos.create'));

        $response->assertOk();
        $response->assertViewIs('credito.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\CreditosController::class,
            'store',
            \App\Http\Requests\CreditosStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $fecha = $this->faker->word();
        $entidad = $this->faker->word();
        $monto = $this->faker->word();
        $total = $this->faker->word();
        $estatus = $this->faker->word();
        $comentario = $this->faker->text();
        $endeudamiento = $this->faker->word();
        $hipoteca = $this->faker->word();
        $score = $this->faker->word();
        $idUsuario = $this->faker->word();
        $idEstudio = $this->faker->word();

        $response = $this->post(route('creditos.store'), [
            'fecha' => $fecha,
            'entidad' => $entidad,
            'monto' => $monto,
            'total' => $total,
            'estatus' => $estatus,
            'comentario' => $comentario,
            'endeudamiento' => $endeudamiento,
            'hipoteca' => $hipoteca,
            'score' => $score,
            'idUsuario' => $idUsuario,
            'idEstudio' => $idEstudio,
        ]);

        $creditos = Credito::query()
            ->where('fecha', $fecha)
            ->where('entidad', $entidad)
            ->where('monto', $monto)
            ->where('total', $total)
            ->where('estatus', $estatus)
            ->where('comentario', $comentario)
            ->where('endeudamiento', $endeudamiento)
            ->where('hipoteca', $hipoteca)
            ->where('score', $score)
            ->where('idUsuario', $idUsuario)
            ->where('idEstudio', $idEstudio)
            ->get();
        $this->assertCount(1, $creditos);
        $credito = $creditos->first();

        $response->assertRedirect(route('creditos.index'));
        $response->assertSessionHas('credito.id', $credito->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $credito = Creditos::factory()->create();

        $response = $this->get(route('creditos.show', $credito));

        $response->assertOk();
        $response->assertViewIs('credito.show');
        $response->assertViewHas('credito');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $credito = Creditos::factory()->create();

        $response = $this->get(route('creditos.edit', $credito));

        $response->assertOk();
        $response->assertViewIs('credito.edit');
        $response->assertViewHas('credito');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\CreditosController::class,
            'update',
            \App\Http\Requests\CreditosUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $credito = Creditos::factory()->create();
        $fecha = $this->faker->word();
        $entidad = $this->faker->word();
        $monto = $this->faker->word();
        $total = $this->faker->word();
        $estatus = $this->faker->word();
        $comentario = $this->faker->text();
        $endeudamiento = $this->faker->word();
        $hipoteca = $this->faker->word();
        $score = $this->faker->word();
        $idUsuario = $this->faker->word();
        $idEstudio = $this->faker->word();

        $response = $this->put(route('creditos.update', $credito), [
            'fecha' => $fecha,
            'entidad' => $entidad,
            'monto' => $monto,
            'total' => $total,
            'estatus' => $estatus,
            'comentario' => $comentario,
            'endeudamiento' => $endeudamiento,
            'hipoteca' => $hipoteca,
            'score' => $score,
            'idUsuario' => $idUsuario,
            'idEstudio' => $idEstudio,
        ]);

        $credito->refresh();

        $response->assertRedirect(route('creditos.index'));
        $response->assertSessionHas('credito.id', $credito->id);

        $this->assertEquals($fecha, $credito->fecha);
        $this->assertEquals($entidad, $credito->entidad);
        $this->assertEquals($monto, $credito->monto);
        $this->assertEquals($total, $credito->total);
        $this->assertEquals($estatus, $credito->estatus);
        $this->assertEquals($comentario, $credito->comentario);
        $this->assertEquals($endeudamiento, $credito->endeudamiento);
        $this->assertEquals($hipoteca, $credito->hipoteca);
        $this->assertEquals($score, $credito->score);
        $this->assertEquals($idUsuario, $credito->idUsuario);
        $this->assertEquals($idEstudio, $credito->idEstudio);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $credito = Creditos::factory()->create();
        $credito = Credito::factory()->create();

        $response = $this->delete(route('creditos.destroy', $credito));

        $response->assertRedirect(route('creditos.index'));

        $this->assertModelMissing($credito);
    }
}
