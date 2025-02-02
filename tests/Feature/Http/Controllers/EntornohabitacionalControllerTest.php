<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Entornohabitacional;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\EntornohabitacionalController
 */
final class EntornohabitacionalControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $entornohabitacionals = Entornohabitacional::factory()->count(3)->create();

        $response = $this->get(route('entornohabitacionals.index'));

        $response->assertOk();
        $response->assertViewIs('entornohabitacional.index');
        $response->assertViewHas('entornohabitacionals');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('entornohabitacionals.create'));

        $response->assertOk();
        $response->assertViewIs('entornohabitacional.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\EntornohabitacionalController::class,
            'store',
            \App\Http\Requests\EntornohabitacionalStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $idEstudio = $this->faker->word();
        $tipoZona = $this->faker->word();
        $tipoVivienda = $this->faker->word();
        $edificacion = $this->faker->word();
        $titular = $this->faker->word();
        $parentesco = $this->faker->word();
        $numRecamaras = $this->faker->word();
        $sala = $this->faker->word();
        $comedor = $this->faker->word();
        $cocina = $this->faker->word();
        $garaje = $this->faker->word();
        $jardin = $this->faker->word();
        $nomBano = $this->faker->word();
        $tipobano = $this->faker->word();
        $viasdeacceso = $this->faker->word();
        $medioTransporte = $this->faker->word();
        $tiempoServicio = $this->faker->word();
        $entreCalles = $this->faker->word();
        $color = $this->faker->word();
        $porton = $this->faker->word();
        $referencias = $this->faker->word();
        $observaciones = $this->faker->text();
        $idUSuario = $this->faker->word();
        $agua = $this->faker->word();
        $luz = $this->faker->word();
        $pavimentacion = $this->faker->word();
        $telefono = $this->faker->word();
        $transporte = $this->faker->word();
        $vigilancia = $this->faker->word();
        $areas = $this->faker->word();
        $drenaje = $this->faker->word();
        $paredes = $this->faker->word();
        $techos = $this->faker->word();
        $pisos = $this->faker->word();
        $telNormal = $this->faker->word();
        $telPlasma = $this->faker->word();
        $estereo = $this->faker->word();
        $dvd = $this->faker->word();
        $blueray = $this->faker->word();
        $estufa = $this->faker->word();
        $horno = $this->faker->word();
        $lavadora = $this->faker->word();
        $centrolavado = $this->faker->word();
        $refrigerador = $this->faker->word();
        $computadora = $this->faker->word();
        $extensionInmueble = $this->faker->word();
        $condicionesInmueble = $this->faker->word();
        $condicionesMobiliario = $this->faker->word();
        $orden = $this->faker->word();
        $limpieza = $this->faker->word();
        $delincuencia = $this->faker->word();
        $vandalismo = $this->faker->word();
        $drogadiccion = $this->faker->word();
        $alcoholismo = $this->faker->word();
        $estudio = $this->faker->word();
        $zotehuela = $this->faker->word();
        $patio = $this->faker->word();
        $internet = $this->faker->word();
        $renta = $this->faker->word();
        $regadera = $this->faker->word();

        $response = $this->post(route('entornohabitacionals.store'), [
            'idEstudio' => $idEstudio,
            'tipoZona' => $tipoZona,
            'tipoVivienda' => $tipoVivienda,
            'edificacion' => $edificacion,
            'titular' => $titular,
            'parentesco' => $parentesco,
            'numRecamaras' => $numRecamaras,
            'sala' => $sala,
            'comedor' => $comedor,
            'cocina' => $cocina,
            'garaje' => $garaje,
            'jardin' => $jardin,
            'nomBano' => $nomBano,
            'tipobano' => $tipobano,
            'viasdeacceso' => $viasdeacceso,
            'medioTransporte' => $medioTransporte,
            'tiempoServicio' => $tiempoServicio,
            'entreCalles' => $entreCalles,
            'color' => $color,
            'porton' => $porton,
            'referencias' => $referencias,
            'observaciones' => $observaciones,
            'idUSuario' => $idUSuario,
            'agua' => $agua,
            'luz' => $luz,
            'pavimentacion' => $pavimentacion,
            'telefono' => $telefono,
            'transporte' => $transporte,
            'vigilancia' => $vigilancia,
            'areas' => $areas,
            'drenaje' => $drenaje,
            'paredes' => $paredes,
            'techos' => $techos,
            'pisos' => $pisos,
            'telNormal' => $telNormal,
            'telPlasma' => $telPlasma,
            'estereo' => $estereo,
            'dvd' => $dvd,
            'blueray' => $blueray,
            'estufa' => $estufa,
            'horno' => $horno,
            'lavadora' => $lavadora,
            'centrolavado' => $centrolavado,
            'refrigerador' => $refrigerador,
            'computadora' => $computadora,
            'extensionInmueble' => $extensionInmueble,
            'condicionesInmueble' => $condicionesInmueble,
            'condicionesMobiliario' => $condicionesMobiliario,
            'orden' => $orden,
            'limpieza' => $limpieza,
            'delincuencia' => $delincuencia,
            'vandalismo' => $vandalismo,
            'drogadiccion' => $drogadiccion,
            'alcoholismo' => $alcoholismo,
            'estudio' => $estudio,
            'zotehuela' => $zotehuela,
            'patio' => $patio,
            'internet' => $internet,
            'renta' => $renta,
            'regadera' => $regadera,
        ]);

        $entornohabitacionals = Entornohabitacional::query()
            ->where('idEstudio', $idEstudio)
            ->where('tipoZona', $tipoZona)
            ->where('tipoVivienda', $tipoVivienda)
            ->where('edificacion', $edificacion)
            ->where('titular', $titular)
            ->where('parentesco', $parentesco)
            ->where('numRecamaras', $numRecamaras)
            ->where('sala', $sala)
            ->where('comedor', $comedor)
            ->where('cocina', $cocina)
            ->where('garaje', $garaje)
            ->where('jardin', $jardin)
            ->where('nomBano', $nomBano)
            ->where('tipobano', $tipobano)
            ->where('viasdeacceso', $viasdeacceso)
            ->where('medioTransporte', $medioTransporte)
            ->where('tiempoServicio', $tiempoServicio)
            ->where('entreCalles', $entreCalles)
            ->where('color', $color)
            ->where('porton', $porton)
            ->where('referencias', $referencias)
            ->where('observaciones', $observaciones)
            ->where('idUSuario', $idUSuario)
            ->where('agua', $agua)
            ->where('luz', $luz)
            ->where('pavimentacion', $pavimentacion)
            ->where('telefono', $telefono)
            ->where('transporte', $transporte)
            ->where('vigilancia', $vigilancia)
            ->where('areas', $areas)
            ->where('drenaje', $drenaje)
            ->where('paredes', $paredes)
            ->where('techos', $techos)
            ->where('pisos', $pisos)
            ->where('telNormal', $telNormal)
            ->where('telPlasma', $telPlasma)
            ->where('estereo', $estereo)
            ->where('dvd', $dvd)
            ->where('blueray', $blueray)
            ->where('estufa', $estufa)
            ->where('horno', $horno)
            ->where('lavadora', $lavadora)
            ->where('centrolavado', $centrolavado)
            ->where('refrigerador', $refrigerador)
            ->where('computadora', $computadora)
            ->where('extensionInmueble', $extensionInmueble)
            ->where('condicionesInmueble', $condicionesInmueble)
            ->where('condicionesMobiliario', $condicionesMobiliario)
            ->where('orden', $orden)
            ->where('limpieza', $limpieza)
            ->where('delincuencia', $delincuencia)
            ->where('vandalismo', $vandalismo)
            ->where('drogadiccion', $drogadiccion)
            ->where('alcoholismo', $alcoholismo)
            ->where('estudio', $estudio)
            ->where('zotehuela', $zotehuela)
            ->where('patio', $patio)
            ->where('internet', $internet)
            ->where('renta', $renta)
            ->where('regadera', $regadera)
            ->get();
        $this->assertCount(1, $entornohabitacionals);
        $entornohabitacional = $entornohabitacionals->first();

        $response->assertRedirect(route('entornohabitacionals.index'));
        $response->assertSessionHas('entornohabitacional.id', $entornohabitacional->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $entornohabitacional = Entornohabitacional::factory()->create();

        $response = $this->get(route('entornohabitacionals.show', $entornohabitacional));

        $response->assertOk();
        $response->assertViewIs('entornohabitacional.show');
        $response->assertViewHas('entornohabitacional');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $entornohabitacional = Entornohabitacional::factory()->create();

        $response = $this->get(route('entornohabitacionals.edit', $entornohabitacional));

        $response->assertOk();
        $response->assertViewIs('entornohabitacional.edit');
        $response->assertViewHas('entornohabitacional');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\EntornohabitacionalController::class,
            'update',
            \App\Http\Requests\EntornohabitacionalUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $entornohabitacional = Entornohabitacional::factory()->create();
        $idEstudio = $this->faker->word();
        $tipoZona = $this->faker->word();
        $tipoVivienda = $this->faker->word();
        $edificacion = $this->faker->word();
        $titular = $this->faker->word();
        $parentesco = $this->faker->word();
        $numRecamaras = $this->faker->word();
        $sala = $this->faker->word();
        $comedor = $this->faker->word();
        $cocina = $this->faker->word();
        $garaje = $this->faker->word();
        $jardin = $this->faker->word();
        $nomBano = $this->faker->word();
        $tipobano = $this->faker->word();
        $viasdeacceso = $this->faker->word();
        $medioTransporte = $this->faker->word();
        $tiempoServicio = $this->faker->word();
        $entreCalles = $this->faker->word();
        $color = $this->faker->word();
        $porton = $this->faker->word();
        $referencias = $this->faker->word();
        $observaciones = $this->faker->text();
        $idUSuario = $this->faker->word();
        $agua = $this->faker->word();
        $luz = $this->faker->word();
        $pavimentacion = $this->faker->word();
        $telefono = $this->faker->word();
        $transporte = $this->faker->word();
        $vigilancia = $this->faker->word();
        $areas = $this->faker->word();
        $drenaje = $this->faker->word();
        $paredes = $this->faker->word();
        $techos = $this->faker->word();
        $pisos = $this->faker->word();
        $telNormal = $this->faker->word();
        $telPlasma = $this->faker->word();
        $estereo = $this->faker->word();
        $dvd = $this->faker->word();
        $blueray = $this->faker->word();
        $estufa = $this->faker->word();
        $horno = $this->faker->word();
        $lavadora = $this->faker->word();
        $centrolavado = $this->faker->word();
        $refrigerador = $this->faker->word();
        $computadora = $this->faker->word();
        $extensionInmueble = $this->faker->word();
        $condicionesInmueble = $this->faker->word();
        $condicionesMobiliario = $this->faker->word();
        $orden = $this->faker->word();
        $limpieza = $this->faker->word();
        $delincuencia = $this->faker->word();
        $vandalismo = $this->faker->word();
        $drogadiccion = $this->faker->word();
        $alcoholismo = $this->faker->word();
        $estudio = $this->faker->word();
        $zotehuela = $this->faker->word();
        $patio = $this->faker->word();
        $internet = $this->faker->word();
        $renta = $this->faker->word();
        $regadera = $this->faker->word();

        $response = $this->put(route('entornohabitacionals.update', $entornohabitacional), [
            'idEstudio' => $idEstudio,
            'tipoZona' => $tipoZona,
            'tipoVivienda' => $tipoVivienda,
            'edificacion' => $edificacion,
            'titular' => $titular,
            'parentesco' => $parentesco,
            'numRecamaras' => $numRecamaras,
            'sala' => $sala,
            'comedor' => $comedor,
            'cocina' => $cocina,
            'garaje' => $garaje,
            'jardin' => $jardin,
            'nomBano' => $nomBano,
            'tipobano' => $tipobano,
            'viasdeacceso' => $viasdeacceso,
            'medioTransporte' => $medioTransporte,
            'tiempoServicio' => $tiempoServicio,
            'entreCalles' => $entreCalles,
            'color' => $color,
            'porton' => $porton,
            'referencias' => $referencias,
            'observaciones' => $observaciones,
            'idUSuario' => $idUSuario,
            'agua' => $agua,
            'luz' => $luz,
            'pavimentacion' => $pavimentacion,
            'telefono' => $telefono,
            'transporte' => $transporte,
            'vigilancia' => $vigilancia,
            'areas' => $areas,
            'drenaje' => $drenaje,
            'paredes' => $paredes,
            'techos' => $techos,
            'pisos' => $pisos,
            'telNormal' => $telNormal,
            'telPlasma' => $telPlasma,
            'estereo' => $estereo,
            'dvd' => $dvd,
            'blueray' => $blueray,
            'estufa' => $estufa,
            'horno' => $horno,
            'lavadora' => $lavadora,
            'centrolavado' => $centrolavado,
            'refrigerador' => $refrigerador,
            'computadora' => $computadora,
            'extensionInmueble' => $extensionInmueble,
            'condicionesInmueble' => $condicionesInmueble,
            'condicionesMobiliario' => $condicionesMobiliario,
            'orden' => $orden,
            'limpieza' => $limpieza,
            'delincuencia' => $delincuencia,
            'vandalismo' => $vandalismo,
            'drogadiccion' => $drogadiccion,
            'alcoholismo' => $alcoholismo,
            'estudio' => $estudio,
            'zotehuela' => $zotehuela,
            'patio' => $patio,
            'internet' => $internet,
            'renta' => $renta,
            'regadera' => $regadera,
        ]);

        $entornohabitacional->refresh();

        $response->assertRedirect(route('entornohabitacionals.index'));
        $response->assertSessionHas('entornohabitacional.id', $entornohabitacional->id);

        $this->assertEquals($idEstudio, $entornohabitacional->idEstudio);
        $this->assertEquals($tipoZona, $entornohabitacional->tipoZona);
        $this->assertEquals($tipoVivienda, $entornohabitacional->tipoVivienda);
        $this->assertEquals($edificacion, $entornohabitacional->edificacion);
        $this->assertEquals($titular, $entornohabitacional->titular);
        $this->assertEquals($parentesco, $entornohabitacional->parentesco);
        $this->assertEquals($numRecamaras, $entornohabitacional->numRecamaras);
        $this->assertEquals($sala, $entornohabitacional->sala);
        $this->assertEquals($comedor, $entornohabitacional->comedor);
        $this->assertEquals($cocina, $entornohabitacional->cocina);
        $this->assertEquals($garaje, $entornohabitacional->garaje);
        $this->assertEquals($jardin, $entornohabitacional->jardin);
        $this->assertEquals($nomBano, $entornohabitacional->nomBano);
        $this->assertEquals($tipobano, $entornohabitacional->tipobano);
        $this->assertEquals($viasdeacceso, $entornohabitacional->viasdeacceso);
        $this->assertEquals($medioTransporte, $entornohabitacional->medioTransporte);
        $this->assertEquals($tiempoServicio, $entornohabitacional->tiempoServicio);
        $this->assertEquals($entreCalles, $entornohabitacional->entreCalles);
        $this->assertEquals($color, $entornohabitacional->color);
        $this->assertEquals($porton, $entornohabitacional->porton);
        $this->assertEquals($referencias, $entornohabitacional->referencias);
        $this->assertEquals($observaciones, $entornohabitacional->observaciones);
        $this->assertEquals($idUSuario, $entornohabitacional->idUSuario);
        $this->assertEquals($agua, $entornohabitacional->agua);
        $this->assertEquals($luz, $entornohabitacional->luz);
        $this->assertEquals($pavimentacion, $entornohabitacional->pavimentacion);
        $this->assertEquals($telefono, $entornohabitacional->telefono);
        $this->assertEquals($transporte, $entornohabitacional->transporte);
        $this->assertEquals($vigilancia, $entornohabitacional->vigilancia);
        $this->assertEquals($areas, $entornohabitacional->areas);
        $this->assertEquals($drenaje, $entornohabitacional->drenaje);
        $this->assertEquals($paredes, $entornohabitacional->paredes);
        $this->assertEquals($techos, $entornohabitacional->techos);
        $this->assertEquals($pisos, $entornohabitacional->pisos);
        $this->assertEquals($telNormal, $entornohabitacional->telNormal);
        $this->assertEquals($telPlasma, $entornohabitacional->telPlasma);
        $this->assertEquals($estereo, $entornohabitacional->estereo);
        $this->assertEquals($dvd, $entornohabitacional->dvd);
        $this->assertEquals($blueray, $entornohabitacional->blueray);
        $this->assertEquals($estufa, $entornohabitacional->estufa);
        $this->assertEquals($horno, $entornohabitacional->horno);
        $this->assertEquals($lavadora, $entornohabitacional->lavadora);
        $this->assertEquals($centrolavado, $entornohabitacional->centrolavado);
        $this->assertEquals($refrigerador, $entornohabitacional->refrigerador);
        $this->assertEquals($computadora, $entornohabitacional->computadora);
        $this->assertEquals($extensionInmueble, $entornohabitacional->extensionInmueble);
        $this->assertEquals($condicionesInmueble, $entornohabitacional->condicionesInmueble);
        $this->assertEquals($condicionesMobiliario, $entornohabitacional->condicionesMobiliario);
        $this->assertEquals($orden, $entornohabitacional->orden);
        $this->assertEquals($limpieza, $entornohabitacional->limpieza);
        $this->assertEquals($delincuencia, $entornohabitacional->delincuencia);
        $this->assertEquals($vandalismo, $entornohabitacional->vandalismo);
        $this->assertEquals($drogadiccion, $entornohabitacional->drogadiccion);
        $this->assertEquals($alcoholismo, $entornohabitacional->alcoholismo);
        $this->assertEquals($estudio, $entornohabitacional->estudio);
        $this->assertEquals($zotehuela, $entornohabitacional->zotehuela);
        $this->assertEquals($patio, $entornohabitacional->patio);
        $this->assertEquals($internet, $entornohabitacional->internet);
        $this->assertEquals($renta, $entornohabitacional->renta);
        $this->assertEquals($regadera, $entornohabitacional->regadera);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $entornohabitacional = Entornohabitacional::factory()->create();

        $response = $this->delete(route('entornohabitacionals.destroy', $entornohabitacional));

        $response->assertRedirect(route('entornohabitacionals.index'));

        $this->assertModelMissing($entornohabitacional);
    }
}
