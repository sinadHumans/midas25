<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Empresa;
use App\Models\Empresas;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\EmpresasController
 */
final class EmpresasControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $empresas = Empresas::factory()->count(3)->create();

        $response = $this->get(route('empresas.index'));

        $response->assertOk();
        $response->assertViewIs('empresa.index');
        $response->assertViewHas('empresas');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('empresas.create'));

        $response->assertOk();
        $response->assertViewIs('empresa.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\EmpresasController::class,
            'store',
            \App\Http\Requests\EmpresasStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $nombre = $this->faker->word();
        $direccion = $this->faker->text();
        $telefono = $this->faker->word();
        $correo = $this->faker->word();
        $contacto = $this->faker->word();
        $paginaWeb = $this->faker->word();
        $idUsuario = $this->faker->text();
        $comentarios = $this->faker->text();
        $archivo = $this->faker->text();

        $response = $this->post(route('empresas.store'), [
            'nombre' => $nombre,
            'direccion' => $direccion,
            'telefono' => $telefono,
            'correo' => $correo,
            'contacto' => $contacto,
            'paginaWeb' => $paginaWeb,
            'idUsuario' => $idUsuario,
            'comentarios' => $comentarios,
            'archivo' => $archivo,
        ]);

        $empresas = Empresa::query()
            ->where('nombre', $nombre)
            ->where('direccion', $direccion)
            ->where('telefono', $telefono)
            ->where('correo', $correo)
            ->where('contacto', $contacto)
            ->where('paginaWeb', $paginaWeb)
            ->where('idUsuario', $idUsuario)
            ->where('comentarios', $comentarios)
            ->where('archivo', $archivo)
            ->get();
        $this->assertCount(1, $empresas);
        $empresa = $empresas->first();

        $response->assertRedirect(route('empresas.index'));
        $response->assertSessionHas('empresa.id', $empresa->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $empresa = Empresas::factory()->create();

        $response = $this->get(route('empresas.show', $empresa));

        $response->assertOk();
        $response->assertViewIs('empresa.show');
        $response->assertViewHas('empresa');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $empresa = Empresas::factory()->create();

        $response = $this->get(route('empresas.edit', $empresa));

        $response->assertOk();
        $response->assertViewIs('empresa.edit');
        $response->assertViewHas('empresa');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\EmpresasController::class,
            'update',
            \App\Http\Requests\EmpresasUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $empresa = Empresas::factory()->create();
        $nombre = $this->faker->word();
        $direccion = $this->faker->text();
        $telefono = $this->faker->word();
        $correo = $this->faker->word();
        $contacto = $this->faker->word();
        $paginaWeb = $this->faker->word();
        $idUsuario = $this->faker->text();
        $comentarios = $this->faker->text();
        $archivo = $this->faker->text();

        $response = $this->put(route('empresas.update', $empresa), [
            'nombre' => $nombre,
            'direccion' => $direccion,
            'telefono' => $telefono,
            'correo' => $correo,
            'contacto' => $contacto,
            'paginaWeb' => $paginaWeb,
            'idUsuario' => $idUsuario,
            'comentarios' => $comentarios,
            'archivo' => $archivo,
        ]);

        $empresa->refresh();

        $response->assertRedirect(route('empresas.index'));
        $response->assertSessionHas('empresa.id', $empresa->id);

        $this->assertEquals($nombre, $empresa->nombre);
        $this->assertEquals($direccion, $empresa->direccion);
        $this->assertEquals($telefono, $empresa->telefono);
        $this->assertEquals($correo, $empresa->correo);
        $this->assertEquals($contacto, $empresa->contacto);
        $this->assertEquals($paginaWeb, $empresa->paginaWeb);
        $this->assertEquals($idUsuario, $empresa->idUsuario);
        $this->assertEquals($comentarios, $empresa->comentarios);
        $this->assertEquals($archivo, $empresa->archivo);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $empresa = Empresas::factory()->create();
        $empresa = Empresa::factory()->create();

        $response = $this->delete(route('empresas.destroy', $empresa));

        $response->assertRedirect(route('empresas.index'));

        $this->assertModelMissing($empresa);
    }
}
