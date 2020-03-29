<?php

namespace Tests\Feature\Menu;

use Tests\TestCase;

class CreateMenuTest extends TestCase
{
    public function testSimpleMenuCreate()
    {
        $title = $this->faker->sentence;

        $response = $this->postJson('/api/menus', ['title' => $title,]);

        $response->assertStatus(201)
            ->assertJson([
                'data' => ['title' => $title]
            ]);
    }

    public function testValidationMenu()
    {
        $response = $this->postJson('/api/menus');

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
