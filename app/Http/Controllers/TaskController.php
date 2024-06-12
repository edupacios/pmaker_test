<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Services\Task\ITaskService;
use Illuminate\Http\Request;
use App\Enums\Status;
use App\Models\Task;
use Inertia\Inertia;

class TaskController extends Controller
{
    private ITaskService $taskService;

    public function __construct(ITaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = $this->taskService->getTasks();

        return Inertia::render('Task/Index', [
            'tasks' => $tasks,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $statuses = Status::cases();

        return Inertia::render('Task/Create', [
            'statuses' => $statuses,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        $task = new Task();
        $task->name = $request->name;
        $task->code = $request->code;
        $task->description = $request->description;
        $task->status = $request->status;
        $task->user_id = \Auth::user()->id;
        $task->save();

        return redirect()->route('task.index');
    }
}
