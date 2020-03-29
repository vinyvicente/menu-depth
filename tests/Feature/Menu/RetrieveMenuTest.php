<?php

namespace Tests\Feature\Menu;

use App\Menu;
use Tests\TestCase;

class RetrieveMenuTest extends TestCase
{
    public function testGetMenu()
    {
        $title = $this->faker->sentence(2);
        $menu = factory(Menu::class)->create(['title' => $title]);

        $response = $this->getJson('/api/menus/' . $menu->id);

        $response->assertStatus(200)
            ->assertExactJson([
                'data' => [
                    'id' => $menu->id,
                    'title' => $menu->title,
                    'created_at' => $menu->created_at,
                    'updated_at' => $menu->updated_at,
                ],
            ]);
    }
}
