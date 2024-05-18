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
        $response->assertSee('statuses');
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

        $response->assertSee('tasks');
    }

    /**
     * Creates a task.
     */
    public function test_it_creates_a_task(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $task = Task::factory()->make([
            'user_id' => $user->id,
        ]);

        $response = $this->post('/task', $task->toArray());

        $response->assertRedirect(route('task.index'));

        $this->assertDatabaseHas('tasks', [
            'name' => $task->name,
            'code' => $task->code,
            'description' => $task->description,
            'status' => $task->status,
            'user_id' => $user->id,
        ]);
    }
}
