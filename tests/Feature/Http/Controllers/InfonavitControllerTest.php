<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Infonavit;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\InfonavitController
 */
final class InfonavitControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $infonavits = Infonavit::factory()->count(3)->create();

        $response = $this->get(route('infonavits.index'));

        $response->assertOk();
        $response->assertViewIs('infonavit.index');
        $response->assertViewHas('infonavits');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('infonavits.create'));

        $response->assertOk();
        $response->assertViewIs('infonavit.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\InfonavitController::class,
            'store',
            \App\Http\Requests\InfonavitStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $estatus = $this->faker->word();
        $puntos = $this->faker->word();
        $subcuenta = $this->faker->word();
        $maximo = $this->faker->word();
        $hipoteca = $this->faker->word();
        $idEstudio = $this->faker->word();
        $idUsuario = $this->faker->word();

        $response = $this->post(route('infonavits.store'), [
            'estatus' => $estatus,
            'puntos' => $puntos,
            'subcuenta' => $subcuenta,
            'maximo' => $maximo,
            'hipoteca' => $hipoteca,
            'idEstudio' => $idEstudio,
            'idUsuario' => $idUsuario,
        ]);

        $infonavits = Infonavit::query()
            ->where('estatus', $estatus)
            ->where('puntos', $puntos)
            ->where('subcuenta', $subcuenta)
            ->where('maximo', $maximo)
            ->where('hipoteca', $hipoteca)
            ->where('idEstudio', $idEstudio)
            ->where('idUsuario', $idUsuario)
            ->get();
        $this->assertCount(1, $infonavits);
        $infonavit = $infonavits->first();

        $response->assertRedirect(route('infonavits.index'));
        $response->assertSessionHas('infonavit.id', $infonavit->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $infonavit = Infonavit::factory()->create();

        $response = $this->get(route('infonavits.show', $infonavit));

        $response->assertOk();
        $response->assertViewIs('infonavit.show');
        $response->assertViewHas('infonavit');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $infonavit = Infonavit::factory()->create();

        $response = $this->get(route('infonavits.edit', $infonavit));

        $response->assertOk();
        $response->assertViewIs('infonavit.edit');
        $response->assertViewHas('infonavit');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\InfonavitController::class,
            'update',
            \App\Http\Requests\InfonavitUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $infonavit = Infonavit::factory()->create();
        $estatus = $this->faker->word();
        $puntos = $this->faker->word();
        $subcuenta = $this->faker->word();
        $maximo = $this->faker->word();
        $hipoteca = $this->faker->word();
        $idEstudio = $this->faker->word();
        $idUsuario = $this->faker->word();

        $response = $this->put(route('infonavits.update', $infonavit), [
            'estatus' => $estatus,
            'puntos' => $puntos,
            'subcuenta' => $subcuenta,
            'maximo' => $maximo,
            'hipoteca' => $hipoteca,
            'idEstudio' => $idEstudio,
            'idUsuario' => $idUsuario,
        ]);

        $infonavit->refresh();

        $response->assertRedirect(route('infonavits.index'));
        $response->assertSessionHas('infonavit.id', $infonavit->id);

        $this->assertEquals($estatus, $infonavit->estatus);
        $this->assertEquals($puntos, $infonavit->puntos);
        $this->assertEquals($subcuenta, $infonavit->subcuenta);
        $this->assertEquals($maximo, $infonavit->maximo);
        $this->assertEquals($hipoteca, $infonavit->hipoteca);
        $this->assertEquals($idEstudio, $infonavit->idEstudio);
        $this->assertEquals($idUsuario, $infonavit->idUsuario);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $infonavit = Infonavit::factory()->create();

        $response = $this->delete(route('infonavits.destroy', $infonavit));

        $response->assertRedirect(route('infonavits.index'));

        $this->assertModelMissing($infonavit);
    }
}
