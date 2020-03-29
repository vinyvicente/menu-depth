<?php

namespace Tests\Feature\Menu;

use App\Menu;
use Tests\TestCase;

class RemoveMenuTest extends TestCase
{
    public function testDeleteMenu()
    {
        factory(Menu::class)->create();

        $response = $this->deleteJson('/api/menus/1');
        $response->assertNoContent();
    }

    public function testDeleteMenuNotCreated()
    {
        $response = $this->deleteJson('/api/menus/1');

        $response->assertStatus(404);
    }
}
