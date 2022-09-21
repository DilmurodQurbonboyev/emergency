<?php

namespace Tests\Feature\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MenuCategoryControllerTest extends TestCase
{
    public function testIndex()
    {
        $response = $this->get('/admin/menus-category');
        $response->assertStatus(200);
    }
}
