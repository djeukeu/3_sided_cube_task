<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostTest extends TestCase
{
    public function test_get_all_post_request(): void
    {
        $response = $this->getJson('/api/posts');

        $response->assertStatus(200);
    }

}
