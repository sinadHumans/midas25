<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Conclusione;
use App\Models\Conclusiones;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ConclusionesController
 */
final class ConclusionesControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $conclusiones = Conclusiones::factory()->count(3)->create();

        $response = $this->get(route('conclusiones.index'));

        $response->assertOk();
        $response->assertViewIs('conclusione.index');
        $response->assertViewHas('conclusiones');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('conclusiones.create'));

        $response->assertOk();
        $response->assertViewIs('conclusione.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ConclusionesController::class,
            'store',
            \App\Http\Requests\ConclusionesStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $acercaCandidato = $this->faker->word();
        $acercaFamilia = $this->faker->word();
        $conclucionesEntrevistador = $this->faker->word();
        $participacion = $this->faker->word();
        $entorno = $this->faker->word();
        $referencias = $this->faker->word();
        $comentariosGenerales = $this->faker->word();
        $analisisVerificacion = $this->faker->word();
        $atendio = $this->faker->word();
        $presento = $this->faker->word();
        $documentacionCompartida = $this->faker->word();
        $referenciasPersonales = $this->faker->word();
        $estatusfinal = $this->faker->word();
        $idUsuario = $this->faker->word();

        $response = $this->post(route('conclusiones.store'), [
            'acercaCandidato' => $acercaCandidato,
            'acercaFamilia' => $acercaFamilia,
            'conclucionesEntrevistador' => $conclucionesEntrevistador,
            'participacion' => $participacion,
            'entorno' => $entorno,
            'referencias' => $referencias,
            'comentariosGenerales' => $comentariosGenerales,
            'analisisVerificacion' => $analisisVerificacion,
            'atendio' => $atendio,
            'presento' => $presento,
            'documentacionCompartida' => $documentacionCompartida,
            'referenciasPersonales' => $referenciasPersonales,
            'estatusfinal' => $estatusfinal,
            'idUsuario' => $idUsuario,
        ]);

        $conclusiones = Conclusione::query()
            ->where('acercaCandidato', $acercaCandidato)
            ->where('acercaFamilia', $acercaFamilia)
            ->where('conclucionesEntrevistador', $conclucionesEntrevistador)
            ->where('participacion', $participacion)
            ->where('entorno', $entorno)
            ->where('referencias', $referencias)
            ->where('comentariosGenerales', $comentariosGenerales)
            ->where('analisisVerificacion', $analisisVerificacion)
            ->where('atendio', $atendio)
            ->where('presento', $presento)
            ->where('documentacionCompartida', $documentacionCompartida)
            ->where('referenciasPersonales', $referenciasPersonales)
            ->where('estatusfinal', $estatusfinal)
            ->where('idUsuario', $idUsuario)
            ->get();
        $this->assertCount(1, $conclusiones);
        $conclusione = $conclusiones->first();

        $response->assertRedirect(route('conclusiones.index'));
        $response->assertSessionHas('conclusione.id', $conclusione->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $conclusione = Conclusiones::factory()->create();

        $response = $this->get(route('conclusiones.show', $conclusione));

        $response->assertOk();
        $response->assertViewIs('conclusione.show');
        $response->assertViewHas('conclusione');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $conclusione = Conclusiones::factory()->create();

        $response = $this->get(route('conclusiones.edit', $conclusione));

        $response->assertOk();
        $response->assertViewIs('conclusione.edit');
        $response->assertViewHas('conclusione');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ConclusionesController::class,
            'update',
            \App\Http\Requests\ConclusionesUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $conclusione = Conclusiones::factory()->create();
        $acercaCandidato = $this->faker->word();
        $acercaFamilia = $this->faker->word();
        $conclucionesEntrevistador = $this->faker->word();
        $participacion = $this->faker->word();
        $entorno = $this->faker->word();
        $referencias = $this->faker->word();
        $comentariosGenerales = $this->faker->word();
        $analisisVerificacion = $this->faker->word();
        $atendio = $this->faker->word();
        $presento = $this->faker->word();
        $documentacionCompartida = $this->faker->word();
        $referenciasPersonales = $this->faker->word();
        $estatusfinal = $this->faker->word();
        $idUsuario = $this->faker->word();

        $response = $this->put(route('conclusiones.update', $conclusione), [
            'acercaCandidato' => $acercaCandidato,
            'acercaFamilia' => $acercaFamilia,
            'conclucionesEntrevistador' => $conclucionesEntrevistador,
            'participacion' => $participacion,
            'entorno' => $entorno,
            'referencias' => $referencias,
            'comentariosGenerales' => $comentariosGenerales,
            'analisisVerificacion' => $analisisVerificacion,
            'atendio' => $atendio,
            'presento' => $presento,
            'documentacionCompartida' => $documentacionCompartida,
            'referenciasPersonales' => $referenciasPersonales,
            'estatusfinal' => $estatusfinal,
            'idUsuario' => $idUsuario,
        ]);

        $conclusione->refresh();

        $response->assertRedirect(route('conclusiones.index'));
        $response->assertSessionHas('conclusione.id', $conclusione->id);

        $this->assertEquals($acercaCandidato, $conclusione->acercaCandidato);
        $this->assertEquals($acercaFamilia, $conclusione->acercaFamilia);
        $this->assertEquals($conclucionesEntrevistador, $conclusione->conclucionesEntrevistador);
        $this->assertEquals($participacion, $conclusione->participacion);
        $this->assertEquals($entorno, $conclusione->entorno);
        $this->assertEquals($referencias, $conclusione->referencias);
        $this->assertEquals($comentariosGenerales, $conclusione->comentariosGenerales);
        $this->assertEquals($analisisVerificacion, $conclusione->analisisVerificacion);
        $this->assertEquals($atendio, $conclusione->atendio);
        $this->assertEquals($presento, $conclusione->presento);
        $this->assertEquals($documentacionCompartida, $conclusione->documentacionCompartida);
        $this->assertEquals($referenciasPersonales, $conclusione->referenciasPersonales);
        $this->assertEquals($estatusfinal, $conclusione->estatusfinal);
        $this->assertEquals($idUsuario, $conclusione->idUsuario);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $conclusione = Conclusiones::factory()->create();
        $conclusione = Conclusione::factory()->create();

        $response = $this->delete(route('conclusiones.destroy', $conclusione));

        $response->assertRedirect(route('conclusiones.index'));

        $this->assertModelMissing($conclusione);
    }
}
