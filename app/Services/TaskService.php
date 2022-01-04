<?php

namespace App\Services;

use App\Events\TaskCreated;
use App\Http\Requests\QueryStringRequest;
use App\Http\Requests\TaskValidationRequest;
use App\Mail\AssignedTaskMail;
use App\Models\Task;
use Illuminate\Support\Facades\Mail;

class TaskService
{
    public function index($filteringParams): array
    {
        return [
            'tasks' => Task::filter($filteringParams)
                ->paginate($filteringParams['perPage'] ?? 10)
                ->withQueryString(),
            'perPage' => [10, 25, 50]
        ];
    }

    public function store($taskParams)
    {
        $task = Task::create($taskParams);

        event(new TaskCreated($task));
    }

    public function update(Task $task, $taskParams): bool
    {
        return $task->update($taskParams);
    }

    public function destroy(Task $task): ?bool
    {
        return $task->delete();
    }
}
