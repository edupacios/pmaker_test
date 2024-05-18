<?php

namespace Tests\Feature\Controllers;

use Tests\TestCase;
use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaskControllerApiTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test that a task can be updated through API.
     */
    public function test_that_a_record_can_be_updated_through_api(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $task = Task::factory()->create([
            'user_id' => $user->id,
        ]);

        $response = $this->patch("/api/task/{$task->id}", [
            'name' => 'Updated task',
            'user_id' => $user->id,
            'code' => 456,
            'description' => 'Task Description',
            'status' => 'inactive',
        ]);

        $updatedTask = Task::find($task->id);

        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'task' => $updatedTask->toArray(),
            ]);
    }
}
