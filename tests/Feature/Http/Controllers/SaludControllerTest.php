<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Salud;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\SaludController
 */
final class SaludControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $saluds = Salud::factory()->count(3)->create();

        $response = $this->get(route('saluds.index'));

        $response->assertOk();
        $response->assertViewIs('salud.index');
        $response->assertViewHas('saluds');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('saluds.create'));

        $response->assertOk();
        $response->assertViewIs('salud.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\SaludController::class,
            'store',
            \App\Http\Requests\SaludStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $idEstudio = $this->faker->word();
        $droga = $this->faker->word();
        $cualDroga = $this->faker->word();
        $fuma = $this->faker->word();
        $frecuenciaFuma = $this->faker->word();
        $bebidas = $this->faker->word();
        $frecuenciaBebidas = $this->faker->word();
        $cafe = $this->faker->word();
        $frecuenciaCafe = $this->faker->word();
        $lentes = $this->faker->word();
        $diagnostico = $this->faker->word();
        $intervenciones = $this->faker->word();
        $dequeintervenciones = $this->faker->word();
        $enfermedadesCronicas = $this->faker->word();
        $dequeCronicas = $this->faker->word();
        $hereditarias = $this->faker->word();
        $cualHereditarias = $this->faker->word();
        $quienConstante = $this->faker->word();
        $porqueConstante = $this->faker->word();
        $ultimaVez = $this->faker->word();
        $considera = $this->faker->word();
        $porqueConsidera = $this->faker->word();
        $deporte = $this->faker->word();
        $pasatiempo = $this->faker->word();
        $ultimavezDeque = $this->faker->word();
        $embarazo = $this->faker->word();
        $idUsuario = $this->faker->word();

        $response = $this->post(route('saluds.store'), [
            'idEstudio' => $idEstudio,
            'droga' => $droga,
            'cualDroga' => $cualDroga,
            'fuma' => $fuma,
            'frecuenciaFuma' => $frecuenciaFuma,
            'bebidas' => $bebidas,
            'frecuenciaBebidas' => $frecuenciaBebidas,
            'cafe' => $cafe,
            'frecuenciaCafe' => $frecuenciaCafe,
            'lentes' => $lentes,
            'diagnostico' => $diagnostico,
            'intervenciones' => $intervenciones,
            'dequeintervenciones' => $dequeintervenciones,
            'enfermedadesCronicas' => $enfermedadesCronicas,
            'dequeCronicas' => $dequeCronicas,
            'hereditarias' => $hereditarias,
            'cualHereditarias' => $cualHereditarias,
            'quienConstante' => $quienConstante,
            'porqueConstante' => $porqueConstante,
            'ultimaVez' => $ultimaVez,
            'considera' => $considera,
            'porqueConsidera' => $porqueConsidera,
            'deporte' => $deporte,
            'pasatiempo' => $pasatiempo,
            'ultimavezDeque' => $ultimavezDeque,
            'embarazo' => $embarazo,
            'idUsuario' => $idUsuario,
        ]);

        $saluds = Salud::query()
            ->where('idEstudio', $idEstudio)
            ->where('droga', $droga)
            ->where('cualDroga', $cualDroga)
            ->where('fuma', $fuma)
            ->where('frecuenciaFuma', $frecuenciaFuma)
            ->where('bebidas', $bebidas)
            ->where('frecuenciaBebidas', $frecuenciaBebidas)
            ->where('cafe', $cafe)
            ->where('frecuenciaCafe', $frecuenciaCafe)
            ->where('lentes', $lentes)
            ->where('diagnostico', $diagnostico)
            ->where('intervenciones', $intervenciones)
            ->where('dequeintervenciones', $dequeintervenciones)
            ->where('enfermedadesCronicas', $enfermedadesCronicas)
            ->where('dequeCronicas', $dequeCronicas)
            ->where('hereditarias', $hereditarias)
            ->where('cualHereditarias', $cualHereditarias)
            ->where('quienConstante', $quienConstante)
            ->where('porqueConstante', $porqueConstante)
            ->where('ultimaVez', $ultimaVez)
            ->where('considera', $considera)
            ->where('porqueConsidera', $porqueConsidera)
            ->where('deporte', $deporte)
            ->where('pasatiempo', $pasatiempo)
            ->where('ultimavezDeque', $ultimavezDeque)
            ->where('embarazo', $embarazo)
            ->where('idUsuario', $idUsuario)
            ->get();
        $this->assertCount(1, $saluds);
        $salud = $saluds->first();

        $response->assertRedirect(route('saluds.index'));
        $response->assertSessionHas('salud.id', $salud->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $salud = Salud::factory()->create();

        $response = $this->get(route('saluds.show', $salud));

        $response->assertOk();
        $response->assertViewIs('salud.show');
        $response->assertViewHas('salud');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $salud = Salud::factory()->create();

        $response = $this->get(route('saluds.edit', $salud));

        $response->assertOk();
        $response->assertViewIs('salud.edit');
        $response->assertViewHas('salud');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\SaludController::class,
            'update',
            \App\Http\Requests\SaludUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $salud = Salud::factory()->create();
        $idEstudio = $this->faker->word();
        $droga = $this->faker->word();
        $cualDroga = $this->faker->word();
        $fuma = $this->faker->word();
        $frecuenciaFuma = $this->faker->word();
        $bebidas = $this->faker->word();
        $frecuenciaBebidas = $this->faker->word();
        $cafe = $this->faker->word();
        $frecuenciaCafe = $this->faker->word();
        $lentes = $this->faker->word();
        $diagnostico = $this->faker->word();
        $intervenciones = $this->faker->word();
        $dequeintervenciones = $this->faker->word();
        $enfermedadesCronicas = $this->faker->word();
        $dequeCronicas = $this->faker->word();
        $hereditarias = $this->faker->word();
        $cualHereditarias = $this->faker->word();
        $quienConstante = $this->faker->word();
        $porqueConstante = $this->faker->word();
        $ultimaVez = $this->faker->word();
        $considera = $this->faker->word();
        $porqueConsidera = $this->faker->word();
        $deporte = $this->faker->word();
        $pasatiempo = $this->faker->word();
        $ultimavezDeque = $this->faker->word();
        $embarazo = $this->faker->word();
        $idUsuario = $this->faker->word();

        $response = $this->put(route('saluds.update', $salud), [
            'idEstudio' => $idEstudio,
            'droga' => $droga,
            'cualDroga' => $cualDroga,
            'fuma' => $fuma,
            'frecuenciaFuma' => $frecuenciaFuma,
            'bebidas' => $bebidas,
            'frecuenciaBebidas' => $frecuenciaBebidas,
            'cafe' => $cafe,
            'frecuenciaCafe' => $frecuenciaCafe,
            'lentes' => $lentes,
            'diagnostico' => $diagnostico,
            'intervenciones' => $intervenciones,
            'dequeintervenciones' => $dequeintervenciones,
            'enfermedadesCronicas' => $enfermedadesCronicas,
            'dequeCronicas' => $dequeCronicas,
            'hereditarias' => $hereditarias,
            'cualHereditarias' => $cualHereditarias,
            'quienConstante' => $quienConstante,
            'porqueConstante' => $porqueConstante,
            'ultimaVez' => $ultimaVez,
            'considera' => $considera,
            'porqueConsidera' => $porqueConsidera,
            'deporte' => $deporte,
            'pasatiempo' => $pasatiempo,
            'ultimavezDeque' => $ultimavezDeque,
            'embarazo' => $embarazo,
            'idUsuario' => $idUsuario,
        ]);

        $salud->refresh();

        $response->assertRedirect(route('saluds.index'));
        $response->assertSessionHas('salud.id', $salud->id);

        $this->assertEquals($idEstudio, $salud->idEstudio);
        $this->assertEquals($droga, $salud->droga);
        $this->assertEquals($cualDroga, $salud->cualDroga);
        $this->assertEquals($fuma, $salud->fuma);
        $this->assertEquals($frecuenciaFuma, $salud->frecuenciaFuma);
        $this->assertEquals($bebidas, $salud->bebidas);
        $this->assertEquals($frecuenciaBebidas, $salud->frecuenciaBebidas);
        $this->assertEquals($cafe, $salud->cafe);
        $this->assertEquals($frecuenciaCafe, $salud->frecuenciaCafe);
        $this->assertEquals($lentes, $salud->lentes);
        $this->assertEquals($diagnostico, $salud->diagnostico);
        $this->assertEquals($intervenciones, $salud->intervenciones);
        $this->assertEquals($dequeintervenciones, $salud->dequeintervenciones);
        $this->assertEquals($enfermedadesCronicas, $salud->enfermedadesCronicas);
        $this->assertEquals($dequeCronicas, $salud->dequeCronicas);
        $this->assertEquals($hereditarias, $salud->hereditarias);
        $this->assertEquals($cualHereditarias, $salud->cualHereditarias);
        $this->assertEquals($quienConstante, $salud->quienConstante);
        $this->assertEquals($porqueConstante, $salud->porqueConstante);
        $this->assertEquals($ultimaVez, $salud->ultimaVez);
        $this->assertEquals($considera, $salud->considera);
        $this->assertEquals($porqueConsidera, $salud->porqueConsidera);
        $this->assertEquals($deporte, $salud->deporte);
        $this->assertEquals($pasatiempo, $salud->pasatiempo);
        $this->assertEquals($ultimavezDeque, $salud->ultimavezDeque);
        $this->assertEquals($embarazo, $salud->embarazo);
        $this->assertEquals($idUsuario, $salud->idUsuario);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $salud = Salud::factory()->create();

        $response = $this->delete(route('saluds.destroy', $salud));

        $response->assertRedirect(route('saluds.index'));

        $this->assertModelMissing($salud);
    }
}
