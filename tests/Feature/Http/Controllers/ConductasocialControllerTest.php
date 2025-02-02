<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Conductasocial;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ConductasocialController
 */
final class ConductasocialControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $conductasocials = Conductasocial::factory()->count(3)->create();

        $response = $this->get(route('conductasocials.index'));

        $response->assertOk();
        $response->assertViewIs('conductasocial.index');
        $response->assertViewHas('conductasocials');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('conductasocials.create'));

        $response->assertOk();
        $response->assertViewIs('conductasocial.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ConductasocialController::class,
            'store',
            \App\Http\Requests\ConductasocialStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $idEstudio = $this->faker->word();
        $quienEstuvo = $this->faker->word();
        $conductaEntrevistado = $this->faker->word();
        $relacionVecinos = $this->faker->word();
        $pertenecegrupo = $this->faker->word();
        $problemasLegales = $this->faker->word();
        $familiarRecluido = $this->faker->word();
        $familiaresAdentro = $this->faker->word();
        $idUsuario = $this->faker->word();

        $response = $this->post(route('conductasocials.store'), [
            'idEstudio' => $idEstudio,
            'quienEstuvo' => $quienEstuvo,
            'conductaEntrevistado' => $conductaEntrevistado,
            'relacionVecinos' => $relacionVecinos,
            'pertenecegrupo' => $pertenecegrupo,
            'problemasLegales' => $problemasLegales,
            'familiarRecluido' => $familiarRecluido,
            'familiaresAdentro' => $familiaresAdentro,
            'idUsuario' => $idUsuario,
        ]);

        $conductasocials = Conductasocial::query()
            ->where('idEstudio', $idEstudio)
            ->where('quienEstuvo', $quienEstuvo)
            ->where('conductaEntrevistado', $conductaEntrevistado)
            ->where('relacionVecinos', $relacionVecinos)
            ->where('pertenecegrupo', $pertenecegrupo)
            ->where('problemasLegales', $problemasLegales)
            ->where('familiarRecluido', $familiarRecluido)
            ->where('familiaresAdentro', $familiaresAdentro)
            ->where('idUsuario', $idUsuario)
            ->get();
        $this->assertCount(1, $conductasocials);
        $conductasocial = $conductasocials->first();

        $response->assertRedirect(route('conductasocials.index'));
        $response->assertSessionHas('conductasocial.id', $conductasocial->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $conductasocial = Conductasocial::factory()->create();

        $response = $this->get(route('conductasocials.show', $conductasocial));

        $response->assertOk();
        $response->assertViewIs('conductasocial.show');
        $response->assertViewHas('conductasocial');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $conductasocial = Conductasocial::factory()->create();

        $response = $this->get(route('conductasocials.edit', $conductasocial));

        $response->assertOk();
        $response->assertViewIs('conductasocial.edit');
        $response->assertViewHas('conductasocial');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ConductasocialController::class,
            'update',
            \App\Http\Requests\ConductasocialUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $conductasocial = Conductasocial::factory()->create();
        $idEstudio = $this->faker->word();
        $quienEstuvo = $this->faker->word();
        $conductaEntrevistado = $this->faker->word();
        $relacionVecinos = $this->faker->word();
        $pertenecegrupo = $this->faker->word();
        $problemasLegales = $this->faker->word();
        $familiarRecluido = $this->faker->word();
        $familiaresAdentro = $this->faker->word();
        $idUsuario = $this->faker->word();

        $response = $this->put(route('conductasocials.update', $conductasocial), [
            'idEstudio' => $idEstudio,
            'quienEstuvo' => $quienEstuvo,
            'conductaEntrevistado' => $conductaEntrevistado,
            'relacionVecinos' => $relacionVecinos,
            'pertenecegrupo' => $pertenecegrupo,
            'problemasLegales' => $problemasLegales,
            'familiarRecluido' => $familiarRecluido,
            'familiaresAdentro' => $familiaresAdentro,
            'idUsuario' => $idUsuario,
        ]);

        $conductasocial->refresh();

        $response->assertRedirect(route('conductasocials.index'));
        $response->assertSessionHas('conductasocial.id', $conductasocial->id);

        $this->assertEquals($idEstudio, $conductasocial->idEstudio);
        $this->assertEquals($quienEstuvo, $conductasocial->quienEstuvo);
        $this->assertEquals($conductaEntrevistado, $conductasocial->conductaEntrevistado);
        $this->assertEquals($relacionVecinos, $conductasocial->relacionVecinos);
        $this->assertEquals($pertenecegrupo, $conductasocial->pertenecegrupo);
        $this->assertEquals($problemasLegales, $conductasocial->problemasLegales);
        $this->assertEquals($familiarRecluido, $conductasocial->familiarRecluido);
        $this->assertEquals($familiaresAdentro, $conductasocial->familiaresAdentro);
        $this->assertEquals($idUsuario, $conductasocial->idUsuario);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $conductasocial = Conductasocial::factory()->create();

        $response = $this->delete(route('conductasocials.destroy', $conductasocial));

        $response->assertRedirect(route('conductasocials.index'));

        $this->assertModelMissing($conductasocial);
    }
}
