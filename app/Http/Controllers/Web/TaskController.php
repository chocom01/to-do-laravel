<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\IndexTaskRequest;
use App\Http\Requests\TaskValidationRequest;
use App\Models\Priority;
use App\Models\Status;
use App\Models\Task;
use App\Models\User;
use App\Services\TaskService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TaskController extends Controller
{
    public function index(TaskService $service, IndexTaskRequest $request): View
    {
        $data = $service->index($request->validated());

        return view('tasks.index', $data);
    }

    public function create(): View
    {
        return view('tasks.create', [
            'users' => User::all(),
            'statuses' => Status::all(),
            'priorities' => Priority::all()
        ]);
    }

    public function store(TaskService $service, TaskValidationRequest $request): RedirectResponse
    {
        $service->store($request->validated());

        return redirect()->route('tasks.index');
    }

    public function edit(Task $task): View
    {
        return view('tasks.edit', [
            'task' => $task,
            'users' => User::all(),
            'statuses' => Status::all(),
            'priorities' => Priority::all()
        ]);
    }

    public function update(TaskService $service, Task $task, TaskValidationRequest $request): RedirectResponse
    {
        $service->update($task, $request->validated());

        return back();
    }

    public function destroy(TaskService $service, Task $task): RedirectResponse
    {
        $service->destroy($task);

        return redirect()->route('tasks.index');
    }
}
