<?php

namespace Tests\Feature\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MessageControllerTest extends TestCase
{
    public function testIndex()
    {
        $response = $this->get('admin/messages');
        $response->assertStatus(302);
    }

    public function testCreate()
    {
        $response = $this->get(route('messages.create'));
        $response->assertStatus(302);
    }

//    public function testStore()
//    {
//        $response = $this->post(route('messages.store', [
//            "title_oz" => "title oz",
//            "title_uz" => "title uz",
//            "title_ru" => "title ru",
//            "title_en" => "title en",
//            "key" => 'title key'
//        ]));
//        $response->assertRedirect(route('messages.index'));
//    }

}
