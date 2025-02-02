<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Infolaboral;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\InfolaboralController
 */
final class InfolaboralControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $infolaborals = Infolaboral::factory()->count(3)->create();

        $response = $this->get(route('infolaborals.index'));

        $response->assertOk();
        $response->assertViewIs('infolaboral.index');
        $response->assertViewHas('infolaborals');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('infolaborals.create'));

        $response->assertOk();
        $response->assertViewIs('infolaboral.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\InfolaboralController::class,
            'store',
            \App\Http\Requests\InfolaboralStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $laboral = $this->faker->word();
        $campol = $this->faker->word();
        $fechal = $this->faker->word();
        $acuerdol = $this->faker->word();
        $civiles = $this->faker->word();
        $campoc = $this->faker->word();
        $fechac = $this->faker->word();
        $acuerdoc = $this->faker->word();
        $familiares = $this->faker->word();
        $campof = $this->faker->word();
        $fechaf = $this->faker->word();
        $acuerdof = $this->faker->word();
        $penales = $this->faker->word();
        $campop = $this->faker->word();
        $fechap = $this->faker->word();
        $acuerdop = $this->faker->word();
        $administrativa = $this->faker->word();
        $campoa = $this->faker->word();
        $fechaa = $this->faker->word();
        $acuerdoa = $this->faker->word();
        $internacional = $this->faker->word();
        $campoi = $this->faker->word();
        $fechai = $this->faker->word();
        $acuerdoi = $this->faker->word();
        $sat = $this->faker->word();
        $camposat = $this->faker->word();
        $fechasat = $this->faker->word();
        $acuerdosat = $this->faker->word();
        $idUsuario = $this->faker->word();
        $idEstudio = $this->faker->word();
        $comentariol = $this->faker->text();
        $comentarioc = $this->faker->text();
        $comentariof = $this->faker->text();
        $comentariop = $this->faker->text();
        $comentarioa = $this->faker->text();
        $comentarioi = $this->faker->text();
        $comentariosat = $this->faker->text();

        $response = $this->post(route('infolaborals.store'), [
            'laboral' => $laboral,
            'campol' => $campol,
            'fechal' => $fechal,
            'acuerdol' => $acuerdol,
            'civiles' => $civiles,
            'campoc' => $campoc,
            'fechac' => $fechac,
            'acuerdoc' => $acuerdoc,
            'familiares' => $familiares,
            'campof' => $campof,
            'fechaf' => $fechaf,
            'acuerdof' => $acuerdof,
            'penales' => $penales,
            'campop' => $campop,
            'fechap' => $fechap,
            'acuerdop' => $acuerdop,
            'administrativa' => $administrativa,
            'campoa' => $campoa,
            'fechaa' => $fechaa,
            'acuerdoa' => $acuerdoa,
            'internacional' => $internacional,
            'campoi' => $campoi,
            'fechai' => $fechai,
            'acuerdoi' => $acuerdoi,
            'sat' => $sat,
            'camposat' => $camposat,
            'fechasat' => $fechasat,
            'acuerdosat' => $acuerdosat,
            'idUsuario' => $idUsuario,
            'idEstudio' => $idEstudio,
            'comentariol' => $comentariol,
            'comentarioc' => $comentarioc,
            'comentariof' => $comentariof,
            'comentariop' => $comentariop,
            'comentarioa' => $comentarioa,
            'comentarioi' => $comentarioi,
            'comentariosat' => $comentariosat,
        ]);

        $infolaborals = Infolaboral::query()
            ->where('laboral', $laboral)
            ->where('campol', $campol)
            ->where('fechal', $fechal)
            ->where('acuerdol', $acuerdol)
            ->where('civiles', $civiles)
            ->where('campoc', $campoc)
            ->where('fechac', $fechac)
            ->where('acuerdoc', $acuerdoc)
            ->where('familiares', $familiares)
            ->where('campof', $campof)
            ->where('fechaf', $fechaf)
            ->where('acuerdof', $acuerdof)
            ->where('penales', $penales)
            ->where('campop', $campop)
            ->where('fechap', $fechap)
            ->where('acuerdop', $acuerdop)
            ->where('administrativa', $administrativa)
            ->where('campoa', $campoa)
            ->where('fechaa', $fechaa)
            ->where('acuerdoa', $acuerdoa)
            ->where('internacional', $internacional)
            ->where('campoi', $campoi)
            ->where('fechai', $fechai)
            ->where('acuerdoi', $acuerdoi)
            ->where('sat', $sat)
            ->where('camposat', $camposat)
            ->where('fechasat', $fechasat)
            ->where('acuerdosat', $acuerdosat)
            ->where('idUsuario', $idUsuario)
            ->where('idEstudio', $idEstudio)
            ->where('comentariol', $comentariol)
            ->where('comentarioc', $comentarioc)
            ->where('comentariof', $comentariof)
            ->where('comentariop', $comentariop)
            ->where('comentarioa', $comentarioa)
            ->where('comentarioi', $comentarioi)
            ->where('comentariosat', $comentariosat)
            ->get();
        $this->assertCount(1, $infolaborals);
        $infolaboral = $infolaborals->first();

        $response->assertRedirect(route('infolaborals.index'));
        $response->assertSessionHas('infolaboral.id', $infolaboral->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $infolaboral = Infolaboral::factory()->create();

        $response = $this->get(route('infolaborals.show', $infolaboral));

        $response->assertOk();
        $response->assertViewIs('infolaboral.show');
        $response->assertViewHas('infolaboral');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $infolaboral = Infolaboral::factory()->create();

        $response = $this->get(route('infolaborals.edit', $infolaboral));

        $response->assertOk();
        $response->assertViewIs('infolaboral.edit');
        $response->assertViewHas('infolaboral');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\InfolaboralController::class,
            'update',
            \App\Http\Requests\InfolaboralUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $infolaboral = Infolaboral::factory()->create();
        $laboral = $this->faker->word();
        $campol = $this->faker->word();
        $fechal = $this->faker->word();
        $acuerdol = $this->faker->word();
        $civiles = $this->faker->word();
        $campoc = $this->faker->word();
        $fechac = $this->faker->word();
        $acuerdoc = $this->faker->word();
        $familiares = $this->faker->word();
        $campof = $this->faker->word();
        $fechaf = $this->faker->word();
        $acuerdof = $this->faker->word();
        $penales = $this->faker->word();
        $campop = $this->faker->word();
        $fechap = $this->faker->word();
        $acuerdop = $this->faker->word();
        $administrativa = $this->faker->word();
        $campoa = $this->faker->word();
        $fechaa = $this->faker->word();
        $acuerdoa = $this->faker->word();
        $internacional = $this->faker->word();
        $campoi = $this->faker->word();
        $fechai = $this->faker->word();
        $acuerdoi = $this->faker->word();
        $sat = $this->faker->word();
        $camposat = $this->faker->word();
        $fechasat = $this->faker->word();
        $acuerdosat = $this->faker->word();
        $idUsuario = $this->faker->word();
        $idEstudio = $this->faker->word();
        $comentariol = $this->faker->text();
        $comentarioc = $this->faker->text();
        $comentariof = $this->faker->text();
        $comentariop = $this->faker->text();
        $comentarioa = $this->faker->text();
        $comentarioi = $this->faker->text();
        $comentariosat = $this->faker->text();

        $response = $this->put(route('infolaborals.update', $infolaboral), [
            'laboral' => $laboral,
            'campol' => $campol,
            'fechal' => $fechal,
            'acuerdol' => $acuerdol,
            'civiles' => $civiles,
            'campoc' => $campoc,
            'fechac' => $fechac,
            'acuerdoc' => $acuerdoc,
            'familiares' => $familiares,
            'campof' => $campof,
            'fechaf' => $fechaf,
            'acuerdof' => $acuerdof,
            'penales' => $penales,
            'campop' => $campop,
            'fechap' => $fechap,
            'acuerdop' => $acuerdop,
            'administrativa' => $administrativa,
            'campoa' => $campoa,
            'fechaa' => $fechaa,
            'acuerdoa' => $acuerdoa,
            'internacional' => $internacional,
            'campoi' => $campoi,
            'fechai' => $fechai,
            'acuerdoi' => $acuerdoi,
            'sat' => $sat,
            'camposat' => $camposat,
            'fechasat' => $fechasat,
            'acuerdosat' => $acuerdosat,
            'idUsuario' => $idUsuario,
            'idEstudio' => $idEstudio,
            'comentariol' => $comentariol,
            'comentarioc' => $comentarioc,
            'comentariof' => $comentariof,
            'comentariop' => $comentariop,
            'comentarioa' => $comentarioa,
            'comentarioi' => $comentarioi,
            'comentariosat' => $comentariosat,
        ]);

        $infolaboral->refresh();

        $response->assertRedirect(route('infolaborals.index'));
        $response->assertSessionHas('infolaboral.id', $infolaboral->id);

        $this->assertEquals($laboral, $infolaboral->laboral);
        $this->assertEquals($campol, $infolaboral->campol);
        $this->assertEquals($fechal, $infolaboral->fechal);
        $this->assertEquals($acuerdol, $infolaboral->acuerdol);
        $this->assertEquals($civiles, $infolaboral->civiles);
        $this->assertEquals($campoc, $infolaboral->campoc);
        $this->assertEquals($fechac, $infolaboral->fechac);
        $this->assertEquals($acuerdoc, $infolaboral->acuerdoc);
        $this->assertEquals($familiares, $infolaboral->familiares);
        $this->assertEquals($campof, $infolaboral->campof);
        $this->assertEquals($fechaf, $infolaboral->fechaf);
        $this->assertEquals($acuerdof, $infolaboral->acuerdof);
        $this->assertEquals($penales, $infolaboral->penales);
        $this->assertEquals($campop, $infolaboral->campop);
        $this->assertEquals($fechap, $infolaboral->fechap);
        $this->assertEquals($acuerdop, $infolaboral->acuerdop);
        $this->assertEquals($administrativa, $infolaboral->administrativa);
        $this->assertEquals($campoa, $infolaboral->campoa);
        $this->assertEquals($fechaa, $infolaboral->fechaa);
        $this->assertEquals($acuerdoa, $infolaboral->acuerdoa);
        $this->assertEquals($internacional, $infolaboral->internacional);
        $this->assertEquals($campoi, $infolaboral->campoi);
        $this->assertEquals($fechai, $infolaboral->fechai);
        $this->assertEquals($acuerdoi, $infolaboral->acuerdoi);
        $this->assertEquals($sat, $infolaboral->sat);
        $this->assertEquals($camposat, $infolaboral->camposat);
        $this->assertEquals($fechasat, $infolaboral->fechasat);
        $this->assertEquals($acuerdosat, $infolaboral->acuerdosat);
        $this->assertEquals($idUsuario, $infolaboral->idUsuario);
        $this->assertEquals($idEstudio, $infolaboral->idEstudio);
        $this->assertEquals($comentariol, $infolaboral->comentariol);
        $this->assertEquals($comentarioc, $infolaboral->comentarioc);
        $this->assertEquals($comentariof, $infolaboral->comentariof);
        $this->assertEquals($comentariop, $infolaboral->comentariop);
        $this->assertEquals($comentarioa, $infolaboral->comentarioa);
        $this->assertEquals($comentarioi, $infolaboral->comentarioi);
        $this->assertEquals($comentariosat, $infolaboral->comentariosat);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $infolaboral = Infolaboral::factory()->create();

        $response = $this->delete(route('infolaborals.destroy', $infolaboral));

        $response->assertRedirect(route('infolaborals.index'));

        $this->assertModelMissing($infolaboral);
    }
}
