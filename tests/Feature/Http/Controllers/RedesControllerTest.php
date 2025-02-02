<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Rede;
use App\Models\Redes;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\RedesController
 */
final class RedesControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $redes = Redes::factory()->count(3)->create();

        $response = $this->get(route('redes.index'));

        $response->assertOk();
        $response->assertViewIs('rede.index');
        $response->assertViewHas('redes');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('redes.create'));

        $response->assertOk();
        $response->assertViewIs('rede.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\RedesController::class,
            'store',
            \App\Http\Requests\RedesStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $idEstudio = $this->faker->word();
        $facebook = $this->faker->word();
        $twitter = $this->faker->word();
        $instagram = $this->faker->word();
        $linkedin = $this->faker->word();
        $idUsuario = $this->faker->word();

        $response = $this->post(route('redes.store'), [
            'idEstudio' => $idEstudio,
            'facebook' => $facebook,
            'twitter' => $twitter,
            'instagram' => $instagram,
            'linkedin' => $linkedin,
            'idUsuario' => $idUsuario,
        ]);

        $redes = Rede::query()
            ->where('idEstudio', $idEstudio)
            ->where('facebook', $facebook)
            ->where('twitter', $twitter)
            ->where('instagram', $instagram)
            ->where('linkedin', $linkedin)
            ->where('idUsuario', $idUsuario)
            ->get();
        $this->assertCount(1, $redes);
        $rede = $redes->first();

        $response->assertRedirect(route('redes.index'));
        $response->assertSessionHas('rede.id', $rede->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $rede = Redes::factory()->create();

        $response = $this->get(route('redes.show', $rede));

        $response->assertOk();
        $response->assertViewIs('rede.show');
        $response->assertViewHas('rede');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $rede = Redes::factory()->create();

        $response = $this->get(route('redes.edit', $rede));

        $response->assertOk();
        $response->assertViewIs('rede.edit');
        $response->assertViewHas('rede');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\RedesController::class,
            'update',
            \App\Http\Requests\RedesUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $rede = Redes::factory()->create();
        $idEstudio = $this->faker->word();
        $facebook = $this->faker->word();
        $twitter = $this->faker->word();
        $instagram = $this->faker->word();
        $linkedin = $this->faker->word();
        $idUsuario = $this->faker->word();

        $response = $this->put(route('redes.update', $rede), [
            'idEstudio' => $idEstudio,
            'facebook' => $facebook,
            'twitter' => $twitter,
            'instagram' => $instagram,
            'linkedin' => $linkedin,
            'idUsuario' => $idUsuario,
        ]);

        $rede->refresh();

        $response->assertRedirect(route('redes.index'));
        $response->assertSessionHas('rede.id', $rede->id);

        $this->assertEquals($idEstudio, $rede->idEstudio);
        $this->assertEquals($facebook, $rede->facebook);
        $this->assertEquals($twitter, $rede->twitter);
        $this->assertEquals($instagram, $rede->instagram);
        $this->assertEquals($linkedin, $rede->linkedin);
        $this->assertEquals($idUsuario, $rede->idUsuario);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $rede = Redes::factory()->create();
        $rede = Rede::factory()->create();

        $response = $this->delete(route('redes.destroy', $rede));

        $response->assertRedirect(route('redes.index'));

        $this->assertModelMissing($rede);
    }
}
