<?php

namespace Tests\Feature\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use App\Models\Task;
use Tests\TestCase;

class TaskControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Returns create task view.
     */
    public function test_it_shows_create_task_view(): void
    {
        $this->actingAs($user = User::factory()->create());

        $response = $this->get('/task/create');

        $response->assertStatus(200);

        $response->assertSeeText('Create new Task');
    }

    /**
     * Returns tasks view with tasks belonging to user.
     */
    public function test_it_shows_tasks_view_with_users_tasks(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $tasks = Task::factory()->count(2)->create([
            'user_id' => $user->id,
        ]);

        $response = $this->get('/');
        $response->assertStatus(200);

        $response->assertJsonCount(2, 'tasks');
    }
}
