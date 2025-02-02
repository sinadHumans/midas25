<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Serviciomedico;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ServiciomedicoController
 */
final class ServiciomedicoControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $serviciomedicos = Serviciomedico::factory()->count(3)->create();

        $response = $this->get(route('serviciomedicos.index'));

        $response->assertOk();
        $response->assertViewIs('serviciomedico.index');
        $response->assertViewHas('serviciomedicos');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('serviciomedicos.create'));

        $response->assertOk();
        $response->assertViewIs('serviciomedico.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ServiciomedicoController::class,
            'store',
            \App\Http\Requests\ServiciomedicoStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $idUsuario = $this->faker->word();
        $infonavit = $this->faker->word();
        $clinicai = $this->faker->word();
        $incidentei = $this->faker->word();
        $tipoi = $this->faker->word();
        $imss = $this->faker->word();
        $clinicaim = $this->faker->word();
        $incidenteim = $this->faker->word();
        $tipoim = $this->faker->word();
        $issste = $this->faker->word();
        $clinicais = $this->faker->word();
        $incidenteis = $this->faker->word();
        $tipois = $this->faker->word();
        $seguro = $this->faker->word();
        $clinicase = $this->faker->word();
        $incidentese = $this->faker->word();
        $tipose = $this->faker->word();
        $privado = $this->faker->word();
        $aseguradora = $this->faker->word();
        $incidentepri = $this->faker->word();
        $tipopri = $this->faker->word();
        $issemym = $this->faker->word();
        $clinicaisse = $this->faker->word();
        $incidenteisse = $this->faker->word();
        $tipoisse = $this->faker->word();
        $idEstudio = $this->faker->word();
        $notiene = $this->faker->word();

        $response = $this->post(route('serviciomedicos.store'), [
            'idUsuario' => $idUsuario,
            'infonavit' => $infonavit,
            'clinicai' => $clinicai,
            'incidentei' => $incidentei,
            'tipoi' => $tipoi,
            'imss' => $imss,
            'clinicaim' => $clinicaim,
            'incidenteim' => $incidenteim,
            'tipoim' => $tipoim,
            'issste' => $issste,
            'clinicais' => $clinicais,
            'incidenteis' => $incidenteis,
            'tipois' => $tipois,
            'seguro' => $seguro,
            'clinicase' => $clinicase,
            'incidentese' => $incidentese,
            'tipose' => $tipose,
            'privado' => $privado,
            'aseguradora' => $aseguradora,
            'incidentepri' => $incidentepri,
            'tipopri' => $tipopri,
            'issemym' => $issemym,
            'clinicaisse' => $clinicaisse,
            'incidenteisse' => $incidenteisse,
            'tipoisse' => $tipoisse,
            'idEstudio' => $idEstudio,
            'notiene' => $notiene,
        ]);

        $serviciomedicos = Serviciomedico::query()
            ->where('idUsuario', $idUsuario)
            ->where('infonavit', $infonavit)
            ->where('clinicai', $clinicai)
            ->where('incidentei', $incidentei)
            ->where('tipoi', $tipoi)
            ->where('imss', $imss)
            ->where('clinicaim', $clinicaim)
            ->where('incidenteim', $incidenteim)
            ->where('tipoim', $tipoim)
            ->where('issste', $issste)
            ->where('clinicais', $clinicais)
            ->where('incidenteis', $incidenteis)
            ->where('tipois', $tipois)
            ->where('seguro', $seguro)
            ->where('clinicase', $clinicase)
            ->where('incidentese', $incidentese)
            ->where('tipose', $tipose)
            ->where('privado', $privado)
            ->where('aseguradora', $aseguradora)
            ->where('incidentepri', $incidentepri)
            ->where('tipopri', $tipopri)
            ->where('issemym', $issemym)
            ->where('clinicaisse', $clinicaisse)
            ->where('incidenteisse', $incidenteisse)
            ->where('tipoisse', $tipoisse)
            ->where('idEstudio', $idEstudio)
            ->where('notiene', $notiene)
            ->get();
        $this->assertCount(1, $serviciomedicos);
        $serviciomedico = $serviciomedicos->first();

        $response->assertRedirect(route('serviciomedicos.index'));
        $response->assertSessionHas('serviciomedico.id', $serviciomedico->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $serviciomedico = Serviciomedico::factory()->create();

        $response = $this->get(route('serviciomedicos.show', $serviciomedico));

        $response->assertOk();
        $response->assertViewIs('serviciomedico.show');
        $response->assertViewHas('serviciomedico');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $serviciomedico = Serviciomedico::factory()->create();

        $response = $this->get(route('serviciomedicos.edit', $serviciomedico));

        $response->assertOk();
        $response->assertViewIs('serviciomedico.edit');
        $response->assertViewHas('serviciomedico');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ServiciomedicoController::class,
            'update',
            \App\Http\Requests\ServiciomedicoUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $serviciomedico = Serviciomedico::factory()->create();
        $idUsuario = $this->faker->word();
        $infonavit = $this->faker->word();
        $clinicai = $this->faker->word();
        $incidentei = $this->faker->word();
        $tipoi = $this->faker->word();
        $imss = $this->faker->word();
        $clinicaim = $this->faker->word();
        $incidenteim = $this->faker->word();
        $tipoim = $this->faker->word();
        $issste = $this->faker->word();
        $clinicais = $this->faker->word();
        $incidenteis = $this->faker->word();
        $tipois = $this->faker->word();
        $seguro = $this->faker->word();
        $clinicase = $this->faker->word();
        $incidentese = $this->faker->word();
        $tipose = $this->faker->word();
        $privado = $this->faker->word();
        $aseguradora = $this->faker->word();
        $incidentepri = $this->faker->word();
        $tipopri = $this->faker->word();
        $issemym = $this->faker->word();
        $clinicaisse = $this->faker->word();
        $incidenteisse = $this->faker->word();
        $tipoisse = $this->faker->word();
        $idEstudio = $this->faker->word();
        $notiene = $this->faker->word();

        $response = $this->put(route('serviciomedicos.update', $serviciomedico), [
            'idUsuario' => $idUsuario,
            'infonavit' => $infonavit,
            'clinicai' => $clinicai,
            'incidentei' => $incidentei,
            'tipoi' => $tipoi,
            'imss' => $imss,
            'clinicaim' => $clinicaim,
            'incidenteim' => $incidenteim,
            'tipoim' => $tipoim,
            'issste' => $issste,
            'clinicais' => $clinicais,
            'incidenteis' => $incidenteis,
            'tipois' => $tipois,
            'seguro' => $seguro,
            'clinicase' => $clinicase,
            'incidentese' => $incidentese,
            'tipose' => $tipose,
            'privado' => $privado,
            'aseguradora' => $aseguradora,
            'incidentepri' => $incidentepri,
            'tipopri' => $tipopri,
            'issemym' => $issemym,
            'clinicaisse' => $clinicaisse,
            'incidenteisse' => $incidenteisse,
            'tipoisse' => $tipoisse,
            'idEstudio' => $idEstudio,
            'notiene' => $notiene,
        ]);

        $serviciomedico->refresh();

        $response->assertRedirect(route('serviciomedicos.index'));
        $response->assertSessionHas('serviciomedico.id', $serviciomedico->id);

        $this->assertEquals($idUsuario, $serviciomedico->idUsuario);
        $this->assertEquals($infonavit, $serviciomedico->infonavit);
        $this->assertEquals($clinicai, $serviciomedico->clinicai);
        $this->assertEquals($incidentei, $serviciomedico->incidentei);
        $this->assertEquals($tipoi, $serviciomedico->tipoi);
        $this->assertEquals($imss, $serviciomedico->imss);
        $this->assertEquals($clinicaim, $serviciomedico->clinicaim);
        $this->assertEquals($incidenteim, $serviciomedico->incidenteim);
        $this->assertEquals($tipoim, $serviciomedico->tipoim);
        $this->assertEquals($issste, $serviciomedico->issste);
        $this->assertEquals($clinicais, $serviciomedico->clinicais);
        $this->assertEquals($incidenteis, $serviciomedico->incidenteis);
        $this->assertEquals($tipois, $serviciomedico->tipois);
        $this->assertEquals($seguro, $serviciomedico->seguro);
        $this->assertEquals($clinicase, $serviciomedico->clinicase);
        $this->assertEquals($incidentese, $serviciomedico->incidentese);
        $this->assertEquals($tipose, $serviciomedico->tipose);
        $this->assertEquals($privado, $serviciomedico->privado);
        $this->assertEquals($aseguradora, $serviciomedico->aseguradora);
        $this->assertEquals($incidentepri, $serviciomedico->incidentepri);
        $this->assertEquals($tipopri, $serviciomedico->tipopri);
        $this->assertEquals($issemym, $serviciomedico->issemym);
        $this->assertEquals($clinicaisse, $serviciomedico->clinicaisse);
        $this->assertEquals($incidenteisse, $serviciomedico->incidenteisse);
        $this->assertEquals($tipoisse, $serviciomedico->tipoisse);
        $this->assertEquals($idEstudio, $serviciomedico->idEstudio);
        $this->assertEquals($notiene, $serviciomedico->notiene);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $serviciomedico = Serviciomedico::factory()->create();

        $response = $this->delete(route('serviciomedicos.destroy', $serviciomedico));

        $response->assertRedirect(route('serviciomedicos.index'));

        $this->assertModelMissing($serviciomedico);
    }
}
