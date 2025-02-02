<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Deuda;
use App\Models\Deudas;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\DeudasController
 */
final class DeudasControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $deudas = Deudas::factory()->count(3)->create();

        $response = $this->get(route('deudas.index'));

        $response->assertOk();
        $response->assertViewIs('deuda.index');
        $response->assertViewHas('deudas');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('deudas.create'));

        $response->assertOk();
        $response->assertViewIs('deuda.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\DeudasController::class,
            'store',
            \App\Http\Requests\DeudasStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $idEstudio = $this->faker->word();
        $cuentaDeuda = $this->faker->word();
        $conQuien = $this->faker->word();
        $monto = $this->faker->word();
        $abonoMensual = $this->faker->word();
        $apagaren = $this->faker->word();
        $cuentaauto = $this->faker->word();
        $modelo = $this->faker->word();
        $placas = $this->faker->word();
        $valorAuto = $this->faker->word();
        $propiedad = $this->faker->word();
        $ubicacon = $this->faker->word();
        $idUsuario = $this->faker->word();
        $tarjetaCredito = $this->faker->word();
        $bancotarjetaCredito = $this->faker->word();
        $creditoAutorizado = $this->faker->word();
        $tarjetaTienda = $this->faker->word();
        $conquienTienda = $this->faker->word();
        $creditoAutorizadotienda = $this->faker->word();
        $observaciones = $this->faker->text();

        $response = $this->post(route('deudas.store'), [
            'idEstudio' => $idEstudio,
            'cuentaDeuda' => $cuentaDeuda,
            'conQuien' => $conQuien,
            'monto' => $monto,
            'abonoMensual' => $abonoMensual,
            'apagaren' => $apagaren,
            'cuentaauto' => $cuentaauto,
            'modelo' => $modelo,
            'placas' => $placas,
            'valorAuto' => $valorAuto,
            'propiedad' => $propiedad,
            'ubicacon' => $ubicacon,
            'idUsuario' => $idUsuario,
            'tarjetaCredito' => $tarjetaCredito,
            'bancotarjetaCredito' => $bancotarjetaCredito,
            'creditoAutorizado' => $creditoAutorizado,
            'tarjetaTienda' => $tarjetaTienda,
            'conquienTienda' => $conquienTienda,
            'creditoAutorizadotienda' => $creditoAutorizadotienda,
            'observaciones' => $observaciones,
        ]);

        $deudas = Deuda::query()
            ->where('idEstudio', $idEstudio)
            ->where('cuentaDeuda', $cuentaDeuda)
            ->where('conQuien', $conQuien)
            ->where('monto', $monto)
            ->where('abonoMensual', $abonoMensual)
            ->where('apagaren', $apagaren)
            ->where('cuentaauto', $cuentaauto)
            ->where('modelo', $modelo)
            ->where('placas', $placas)
            ->where('valorAuto', $valorAuto)
            ->where('propiedad', $propiedad)
            ->where('ubicacon', $ubicacon)
            ->where('idUsuario', $idUsuario)
            ->where('tarjetaCredito', $tarjetaCredito)
            ->where('bancotarjetaCredito', $bancotarjetaCredito)
            ->where('creditoAutorizado', $creditoAutorizado)
            ->where('tarjetaTienda', $tarjetaTienda)
            ->where('conquienTienda', $conquienTienda)
            ->where('creditoAutorizadotienda', $creditoAutorizadotienda)
            ->where('observaciones', $observaciones)
            ->get();
        $this->assertCount(1, $deudas);
        $deuda = $deudas->first();

        $response->assertRedirect(route('deudas.index'));
        $response->assertSessionHas('deuda.id', $deuda->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $deuda = Deudas::factory()->create();

        $response = $this->get(route('deudas.show', $deuda));

        $response->assertOk();
        $response->assertViewIs('deuda.show');
        $response->assertViewHas('deuda');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $deuda = Deudas::factory()->create();

        $response = $this->get(route('deudas.edit', $deuda));

        $response->assertOk();
        $response->assertViewIs('deuda.edit');
        $response->assertViewHas('deuda');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\DeudasController::class,
            'update',
            \App\Http\Requests\DeudasUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $deuda = Deudas::factory()->create();
        $idEstudio = $this->faker->word();
        $cuentaDeuda = $this->faker->word();
        $conQuien = $this->faker->word();
        $monto = $this->faker->word();
        $abonoMensual = $this->faker->word();
        $apagaren = $this->faker->word();
        $cuentaauto = $this->faker->word();
        $modelo = $this->faker->word();
        $placas = $this->faker->word();
        $valorAuto = $this->faker->word();
        $propiedad = $this->faker->word();
        $ubicacon = $this->faker->word();
        $idUsuario = $this->faker->word();
        $tarjetaCredito = $this->faker->word();
        $bancotarjetaCredito = $this->faker->word();
        $creditoAutorizado = $this->faker->word();
        $tarjetaTienda = $this->faker->word();
        $conquienTienda = $this->faker->word();
        $creditoAutorizadotienda = $this->faker->word();
        $observaciones = $this->faker->text();

        $response = $this->put(route('deudas.update', $deuda), [
            'idEstudio' => $idEstudio,
            'cuentaDeuda' => $cuentaDeuda,
            'conQuien' => $conQuien,
            'monto' => $monto,
            'abonoMensual' => $abonoMensual,
            'apagaren' => $apagaren,
            'cuentaauto' => $cuentaauto,
            'modelo' => $modelo,
            'placas' => $placas,
            'valorAuto' => $valorAuto,
            'propiedad' => $propiedad,
            'ubicacon' => $ubicacon,
            'idUsuario' => $idUsuario,
            'tarjetaCredito' => $tarjetaCredito,
            'bancotarjetaCredito' => $bancotarjetaCredito,
            'creditoAutorizado' => $creditoAutorizado,
            'tarjetaTienda' => $tarjetaTienda,
            'conquienTienda' => $conquienTienda,
            'creditoAutorizadotienda' => $creditoAutorizadotienda,
            'observaciones' => $observaciones,
        ]);

        $deuda->refresh();

        $response->assertRedirect(route('deudas.index'));
        $response->assertSessionHas('deuda.id', $deuda->id);

        $this->assertEquals($idEstudio, $deuda->idEstudio);
        $this->assertEquals($cuentaDeuda, $deuda->cuentaDeuda);
        $this->assertEquals($conQuien, $deuda->conQuien);
        $this->assertEquals($monto, $deuda->monto);
        $this->assertEquals($abonoMensual, $deuda->abonoMensual);
        $this->assertEquals($apagaren, $deuda->apagaren);
        $this->assertEquals($cuentaauto, $deuda->cuentaauto);
        $this->assertEquals($modelo, $deuda->modelo);
        $this->assertEquals($placas, $deuda->placas);
        $this->assertEquals($valorAuto, $deuda->valorAuto);
        $this->assertEquals($propiedad, $deuda->propiedad);
        $this->assertEquals($ubicacon, $deuda->ubicacon);
        $this->assertEquals($idUsuario, $deuda->idUsuario);
        $this->assertEquals($tarjetaCredito, $deuda->tarjetaCredito);
        $this->assertEquals($bancotarjetaCredito, $deuda->bancotarjetaCredito);
        $this->assertEquals($creditoAutorizado, $deuda->creditoAutorizado);
        $this->assertEquals($tarjetaTienda, $deuda->tarjetaTienda);
        $this->assertEquals($conquienTienda, $deuda->conquienTienda);
        $this->assertEquals($creditoAutorizadotienda, $deuda->creditoAutorizadotienda);
        $this->assertEquals($observaciones, $deuda->observaciones);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $deuda = Deudas::factory()->create();
        $deuda = Deuda::factory()->create();

        $response = $this->delete(route('deudas.destroy', $deuda));

        $response->assertRedirect(route('deudas.index'));

        $this->assertModelMissing($deuda);
    }
}
