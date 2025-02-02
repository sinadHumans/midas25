<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Situacion;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\SituacionController
 */
final class SituacionControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $situacions = Situacion::factory()->count(3)->create();

        $response = $this->get(route('situacions.index'));

        $response->assertOk();
        $response->assertViewIs('situacion.index');
        $response->assertViewHas('situacions');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('situacions.create'));

        $response->assertOk();
        $response->assertViewIs('situacion.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\SituacionController::class,
            'store',
            \App\Http\Requests\SituacionStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $idEstudio = $this->faker->word();
        $nombre = $this->faker->word();
        $parentesco = $this->faker->word();
        $salario = $this->faker->word();
        $ingreso = $this->faker->word();
        $concepto = $this->faker->word();
        $egresos = $this->faker->word();
        $observaciones = $this->faker->text();
        $superavit = $this->faker->word();
        $idUsuario = $this->faker->word();

        $response = $this->post(route('situacions.store'), [
            'idEstudio' => $idEstudio,
            'nombre' => $nombre,
            'parentesco' => $parentesco,
            'salario' => $salario,
            'ingreso' => $ingreso,
            'concepto' => $concepto,
            'egresos' => $egresos,
            'observaciones' => $observaciones,
            'superavit' => $superavit,
            'idUsuario' => $idUsuario,
        ]);

        $situacions = Situacion::query()
            ->where('idEstudio', $idEstudio)
            ->where('nombre', $nombre)
            ->where('parentesco', $parentesco)
            ->where('salario', $salario)
            ->where('ingreso', $ingreso)
            ->where('concepto', $concepto)
            ->where('egresos', $egresos)
            ->where('observaciones', $observaciones)
            ->where('superavit', $superavit)
            ->where('idUsuario', $idUsuario)
            ->get();
        $this->assertCount(1, $situacions);
        $situacion = $situacions->first();

        $response->assertRedirect(route('situacions.index'));
        $response->assertSessionHas('situacion.id', $situacion->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $situacion = Situacion::factory()->create();

        $response = $this->get(route('situacions.show', $situacion));

        $response->assertOk();
        $response->assertViewIs('situacion.show');
        $response->assertViewHas('situacion');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $situacion = Situacion::factory()->create();

        $response = $this->get(route('situacions.edit', $situacion));

        $response->assertOk();
        $response->assertViewIs('situacion.edit');
        $response->assertViewHas('situacion');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\SituacionController::class,
            'update',
            \App\Http\Requests\SituacionUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $situacion = Situacion::factory()->create();
        $idEstudio = $this->faker->word();
        $nombre = $this->faker->word();
        $parentesco = $this->faker->word();
        $salario = $this->faker->word();
        $ingreso = $this->faker->word();
        $concepto = $this->faker->word();
        $egresos = $this->faker->word();
        $observaciones = $this->faker->text();
        $superavit = $this->faker->word();
        $idUsuario = $this->faker->word();

        $response = $this->put(route('situacions.update', $situacion), [
            'idEstudio' => $idEstudio,
            'nombre' => $nombre,
            'parentesco' => $parentesco,
            'salario' => $salario,
            'ingreso' => $ingreso,
            'concepto' => $concepto,
            'egresos' => $egresos,
            'observaciones' => $observaciones,
            'superavit' => $superavit,
            'idUsuario' => $idUsuario,
        ]);

        $situacion->refresh();

        $response->assertRedirect(route('situacions.index'));
        $response->assertSessionHas('situacion.id', $situacion->id);

        $this->assertEquals($idEstudio, $situacion->idEstudio);
        $this->assertEquals($nombre, $situacion->nombre);
        $this->assertEquals($parentesco, $situacion->parentesco);
        $this->assertEquals($salario, $situacion->salario);
        $this->assertEquals($ingreso, $situacion->ingreso);
        $this->assertEquals($concepto, $situacion->concepto);
        $this->assertEquals($egresos, $situacion->egresos);
        $this->assertEquals($observaciones, $situacion->observaciones);
        $this->assertEquals($superavit, $situacion->superavit);
        $this->assertEquals($idUsuario, $situacion->idUsuario);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $situacion = Situacion::factory()->create();

        $response = $this->delete(route('situacions.destroy', $situacion));

        $response->assertRedirect(route('situacions.index'));

        $this->assertModelMissing($situacion);
    }
}
