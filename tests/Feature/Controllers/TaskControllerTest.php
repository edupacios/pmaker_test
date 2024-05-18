<?php

namespace Tests\Feature\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use Tests\TestCase;

class TaskControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Returns the view with no tasks when no tasks are available.
     */
    public function shows_tasks_view(): void
    {
        $this->actingAs($user = User::factory()->create());

        $response = $this->get('/');

        $response->assertStatus(200);

        $response->assertViewHas('Tasks');
    }
}
