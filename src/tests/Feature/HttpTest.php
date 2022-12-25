<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HttpTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_top()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_questions_select_exam()
    {
        $response = $this->get('/questions/select_exam');

        $response->assertStatus(200);
    }
}
