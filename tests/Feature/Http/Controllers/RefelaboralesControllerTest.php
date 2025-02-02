<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Refelaborale;
use App\Models\Refelaborales;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\RefelaboralesController
 */
final class RefelaboralesControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $refelaborales = Refelaborales::factory()->count(3)->create();

        $response = $this->get(route('refelaborales.index'));

        $response->assertOk();
        $response->assertViewIs('refelaborale.index');
        $response->assertViewHas('refelaborales');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('refelaborales.create'));

        $response->assertOk();
        $response->assertViewIs('refelaborale.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\RefelaboralesController::class,
            'store',
            \App\Http\Requests\RefelaboralesStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $idEstudio = $this->faker->word();
        $empresa = $this->faker->word();
        $giro = $this->faker->word();
        $direccion = $this->faker->word();
        $telefono = $this->faker->word();
        $fechaIngreso = $this->faker->word();
        $fechaEgreso = $this->faker->word();
        $puesto = $this->faker->word();
        $area = $this->faker->word();
        $salario = $this->faker->word();
        $motivoSalida = $this->faker->text();
        $quienProporciono = $this->faker->word();
        $puestoProporciono = $this->faker->word();
        $calificacion = $this->faker->word();
        $demanda = $this->faker->word();
        $volveria = $this->faker->word();
        $porque = $this->faker->text();
        $observaciones = $this->faker->text();
        $idUsuario = $this->faker->word();
        $candidatoes = $this->faker->word();
        $periodosInactivo = $this->faker->word();

        $response = $this->post(route('refelaborales.store'), [
            'idEstudio' => $idEstudio,
            'empresa' => $empresa,
            'giro' => $giro,
            'direccion' => $direccion,
            'telefono' => $telefono,
            'fechaIngreso' => $fechaIngreso,
            'fechaEgreso' => $fechaEgreso,
            'puesto' => $puesto,
            'area' => $area,
            'salario' => $salario,
            'motivoSalida' => $motivoSalida,
            'quienProporciono' => $quienProporciono,
            'puestoProporciono' => $puestoProporciono,
            'calificacion' => $calificacion,
            'demanda' => $demanda,
            'volveria' => $volveria,
            'porque' => $porque,
            'observaciones' => $observaciones,
            'idUsuario' => $idUsuario,
            'candidatoes' => $candidatoes,
            'periodosInactivo' => $periodosInactivo,
        ]);

        $refelaborales = Refelaborale::query()
            ->where('idEstudio', $idEstudio)
            ->where('empresa', $empresa)
            ->where('giro', $giro)
            ->where('direccion', $direccion)
            ->where('telefono', $telefono)
            ->where('fechaIngreso', $fechaIngreso)
            ->where('fechaEgreso', $fechaEgreso)
            ->where('puesto', $puesto)
            ->where('area', $area)
            ->where('salario', $salario)
            ->where('motivoSalida', $motivoSalida)
            ->where('quienProporciono', $quienProporciono)
            ->where('puestoProporciono', $puestoProporciono)
            ->where('calificacion', $calificacion)
            ->where('demanda', $demanda)
            ->where('volveria', $volveria)
            ->where('porque', $porque)
            ->where('observaciones', $observaciones)
            ->where('idUsuario', $idUsuario)
            ->where('candidatoes', $candidatoes)
            ->where('periodosInactivo', $periodosInactivo)
            ->get();
        $this->assertCount(1, $refelaborales);
        $refelaborale = $refelaborales->first();

        $response->assertRedirect(route('refelaborales.index'));
        $response->assertSessionHas('refelaborale.id', $refelaborale->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $refelaborale = Refelaborales::factory()->create();

        $response = $this->get(route('refelaborales.show', $refelaborale));

        $response->assertOk();
        $response->assertViewIs('refelaborale.show');
        $response->assertViewHas('refelaborale');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $refelaborale = Refelaborales::factory()->create();

        $response = $this->get(route('refelaborales.edit', $refelaborale));

        $response->assertOk();
        $response->assertViewIs('refelaborale.edit');
        $response->assertViewHas('refelaborale');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\RefelaboralesController::class,
            'update',
            \App\Http\Requests\RefelaboralesUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $refelaborale = Refelaborales::factory()->create();
        $idEstudio = $this->faker->word();
        $empresa = $this->faker->word();
        $giro = $this->faker->word();
        $direccion = $this->faker->word();
        $telefono = $this->faker->word();
        $fechaIngreso = $this->faker->word();
        $fechaEgreso = $this->faker->word();
        $puesto = $this->faker->word();
        $area = $this->faker->word();
        $salario = $this->faker->word();
        $motivoSalida = $this->faker->text();
        $quienProporciono = $this->faker->word();
        $puestoProporciono = $this->faker->word();
        $calificacion = $this->faker->word();
        $demanda = $this->faker->word();
        $volveria = $this->faker->word();
        $porque = $this->faker->text();
        $observaciones = $this->faker->text();
        $idUsuario = $this->faker->word();
        $candidatoes = $this->faker->word();
        $periodosInactivo = $this->faker->word();

        $response = $this->put(route('refelaborales.update', $refelaborale), [
            'idEstudio' => $idEstudio,
            'empresa' => $empresa,
            'giro' => $giro,
            'direccion' => $direccion,
            'telefono' => $telefono,
            'fechaIngreso' => $fechaIngreso,
            'fechaEgreso' => $fechaEgreso,
            'puesto' => $puesto,
            'area' => $area,
            'salario' => $salario,
            'motivoSalida' => $motivoSalida,
            'quienProporciono' => $quienProporciono,
            'puestoProporciono' => $puestoProporciono,
            'calificacion' => $calificacion,
            'demanda' => $demanda,
            'volveria' => $volveria,
            'porque' => $porque,
            'observaciones' => $observaciones,
            'idUsuario' => $idUsuario,
            'candidatoes' => $candidatoes,
            'periodosInactivo' => $periodosInactivo,
        ]);

        $refelaborale->refresh();

        $response->assertRedirect(route('refelaborales.index'));
        $response->assertSessionHas('refelaborale.id', $refelaborale->id);

        $this->assertEquals($idEstudio, $refelaborale->idEstudio);
        $this->assertEquals($empresa, $refelaborale->empresa);
        $this->assertEquals($giro, $refelaborale->giro);
        $this->assertEquals($direccion, $refelaborale->direccion);
        $this->assertEquals($telefono, $refelaborale->telefono);
        $this->assertEquals($fechaIngreso, $refelaborale->fechaIngreso);
        $this->assertEquals($fechaEgreso, $refelaborale->fechaEgreso);
        $this->assertEquals($puesto, $refelaborale->puesto);
        $this->assertEquals($area, $refelaborale->area);
        $this->assertEquals($salario, $refelaborale->salario);
        $this->assertEquals($motivoSalida, $refelaborale->motivoSalida);
        $this->assertEquals($quienProporciono, $refelaborale->quienProporciono);
        $this->assertEquals($puestoProporciono, $refelaborale->puestoProporciono);
        $this->assertEquals($calificacion, $refelaborale->calificacion);
        $this->assertEquals($demanda, $refelaborale->demanda);
        $this->assertEquals($volveria, $refelaborale->volveria);
        $this->assertEquals($porque, $refelaborale->porque);
        $this->assertEquals($observaciones, $refelaborale->observaciones);
        $this->assertEquals($idUsuario, $refelaborale->idUsuario);
        $this->assertEquals($candidatoes, $refelaborale->candidatoes);
        $this->assertEquals($periodosInactivo, $refelaborale->periodosInactivo);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $refelaborale = Refelaborales::factory()->create();
        $refelaborale = Refelaborale::factory()->create();

        $response = $this->delete(route('refelaborales.destroy', $refelaborale));

        $response->assertRedirect(route('refelaborales.index'));

        $this->assertModelMissing($refelaborale);
    }
}
