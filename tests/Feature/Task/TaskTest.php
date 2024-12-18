<?php

namespace Tests\Feature\Task;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_task_screen_can_be_rendered_user_auth(): void
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/task');
        $response->assertStatus(200);
    }
    public function test_task_screen_can_be_rendered_not_user_auth(): void
    {
        $response = $this->get('/task');
        $response->assertStatus(302);
    }
    public function test_create_task_screen_can_be_rendered_user_auth(): void
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/task/create');
        $response->assertStatus(200);
    }
    public function test_create_task_screen_can_be_rendered_not_user_user_auth(): void
    {
        $response = $this->get('/task/create');
        $response->assertStatus(302);
    }
}
