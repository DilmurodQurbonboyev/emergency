<?php

namespace Tests\Feature\Controllers;

use Tests\TestCase;

class MenuCategoryControllerTest extends TestCase
{
    public function testIndex()
    {
        $response = $this->get('/admin/menus-category');
        $response->assertStatus(302);
    }

    public function testCreate()
    {
        $response = $this->get('/admin/menus-category/create');
        $response->assertStatus(302);
    }
}
