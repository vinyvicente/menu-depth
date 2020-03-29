<?php

namespace Tests\Feature\Menu;

use App\Menu;
use Tests\TestCase;

class UpdateMenuTest extends TestCase
{
    public function testSimpleMenuUpdate()
    {
        factory(Menu::class)->create();
        $titleToUpdate = $this->faker->sentence(1);

        $response = $this->patchJson('/api/menus/1', ['title' => $titleToUpdate,]);
        $response->assertStatus(200)
            ->assertJson([
                'data' => ['title' => $titleToUpdate]
            ]);
    }

    public function testValidationMenuOnChange()
    {
        $response = $this->patchJson('/api/menus/1');

        $response->assertStatus(422)
            ->assertJson([
                'message' => 'The given data was invalid.',
                'errors' => [
                    'title' => [
                        'The title field is required.'
                    ]
                ]
            ]);
    }
}
