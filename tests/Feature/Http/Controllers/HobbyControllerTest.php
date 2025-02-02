<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Hobby;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\HobbyController
 */
final class HobbyControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $hobbies = Hobby::factory()->count(3)->create();

        $response = $this->get(route('hobbies.index'));

        $response->assertOk();
        $response->assertViewIs('hobby.index');
        $response->assertViewHas('hobbies');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('hobbies.create'));

        $response->assertOk();
        $response->assertViewIs('hobby.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\HobbyController::class,
            'store',
            \App\Http\Requests\HobbyStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $idEstudio = $this->faker->word();
        $deportes = $this->faker->word();
        $cual = $this->faker->word();
        $frecuencia = $this->faker->word();
        $pasatiempos = $this->faker->word();
        $otros = $this->faker->word();
        $idUsuario = $this->faker->word();

        $response = $this->post(route('hobbies.store'), [
            'idEstudio' => $idEstudio,
            'deportes' => $deportes,
            'cual' => $cual,
            'frecuencia' => $frecuencia,
            'pasatiempos' => $pasatiempos,
            'otros' => $otros,
            'idUsuario' => $idUsuario,
        ]);

        $hobbies = Hobby::query()
            ->where('idEstudio', $idEstudio)
            ->where('deportes', $deportes)
            ->where('cual', $cual)
            ->where('frecuencia', $frecuencia)
            ->where('pasatiempos', $pasatiempos)
            ->where('otros', $otros)
            ->where('idUsuario', $idUsuario)
            ->get();
        $this->assertCount(1, $hobbies);
        $hobby = $hobbies->first();

        $response->assertRedirect(route('hobbies.index'));
        $response->assertSessionHas('hobby.id', $hobby->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $hobby = Hobby::factory()->create();

        $response = $this->get(route('hobbies.show', $hobby));

        $response->assertOk();
        $response->assertViewIs('hobby.show');
        $response->assertViewHas('hobby');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $hobby = Hobby::factory()->create();

        $response = $this->get(route('hobbies.edit', $hobby));

        $response->assertOk();
        $response->assertViewIs('hobby.edit');
        $response->assertViewHas('hobby');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\HobbyController::class,
            'update',
            \App\Http\Requests\HobbyUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $hobby = Hobby::factory()->create();
        $idEstudio = $this->faker->word();
        $deportes = $this->faker->word();
        $cual = $this->faker->word();
        $frecuencia = $this->faker->word();
        $pasatiempos = $this->faker->word();
        $otros = $this->faker->word();
        $idUsuario = $this->faker->word();

        $response = $this->put(route('hobbies.update', $hobby), [
            'idEstudio' => $idEstudio,
            'deportes' => $deportes,
            'cual' => $cual,
            'frecuencia' => $frecuencia,
            'pasatiempos' => $pasatiempos,
            'otros' => $otros,
            'idUsuario' => $idUsuario,
        ]);

        $hobby->refresh();

        $response->assertRedirect(route('hobbies.index'));
        $response->assertSessionHas('hobby.id', $hobby->id);

        $this->assertEquals($idEstudio, $hobby->idEstudio);
        $this->assertEquals($deportes, $hobby->deportes);
        $this->assertEquals($cual, $hobby->cual);
        $this->assertEquals($frecuencia, $hobby->frecuencia);
        $this->assertEquals($pasatiempos, $hobby->pasatiempos);
        $this->assertEquals($otros, $hobby->otros);
        $this->assertEquals($idUsuario, $hobby->idUsuario);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $hobby = Hobby::factory()->create();

        $response = $this->delete(route('hobbies.destroy', $hobby));

        $response->assertRedirect(route('hobbies.index'));

        $this->assertModelMissing($hobby);
    }
}
