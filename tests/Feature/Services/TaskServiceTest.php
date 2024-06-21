<?php

namespace Tests\Feature\Services;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Services\Task\ITaskService;
use App\Services\Task\TaskService;
use Mockery\MockInterface;
use App\Models\Task;
use App\Models\User;
use Tests\TestCase;
use Mockery;

class TaskServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_get_tasks_method_is_called_once(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $this->instance(
            TaskService::class,
            Mockery::mock(TaskService::class, function (MockInterface $mock) {
                $mock->shouldReceive('getTasks')->once();
            })
        );

        $this->get('/');
    }

    public function test_the_store_method_is_called_once(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $this->instance(
            TaskService::class,
            Mockery::mock(TaskService::class, function (MockInterface $mock) {
                $mock->shouldReceive('store')->once();
            })
        );

        $this->post('/task', [
            'name' => 'Task 1',
            'code' => 'T1',
            'description' => 'Description 1',
            'status' => 'pending',
        ]);
    }
}
