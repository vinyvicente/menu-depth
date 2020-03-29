<?php

namespace Tests\Feature\Menu\Item;

use App\Menu;
use Tests\TestCase;

class CreateItemTest extends TestCase
{
    public function testCreateItemsFromMenu()
    {
        factory(Menu::class)->create();

        $response = $this->postJson('/api/menus/1/items', [
            ['title' => 'Item 1',],
            ['title' => 'Item 2',],
        ]);

        $response->assertStatus(201);
    }

    public function testCreateItemsFromMenuWithItemWrong()
    {
        factory(Menu::class)->create();

        $response = $this->postJson('/api/menus/1/items', [
            ['title2' => 'Item 1',],
            ['title' => 'Item 2',],
        ]);

        $response->assertStatus(422)
            ->assertJson([
                'message' => 'The given data was invalid.',
                'errors' => [
                    '0.title' => [
                        'The 0.title field is required.'
                    ]
                ]
            ]);
    }
}
