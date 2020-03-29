<?php

namespace Tests\Feature\Menu;

use App\Menu;
use Tests\TestCase;

class ListMenuTest extends TestCase
{
    public function testListMenu()
    {
        $quantity = $this->faker->randomNumber(2);
        for ($i = 0; $i < $quantity; $i++) {
            factory(Menu::class)->create();
        }

        $response = $this->getJson('/api/menus');

        $response->assertStatus(200)
            ->assertJson([
                'data' => [],
                'meta' => [
                    'total' => $quantity
                ]
            ]);
    }
}
