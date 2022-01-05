<?php

namespace App\Services;

use App\Http\Requests\QueryStringRequest;
use App\Http\Requests\TaskValidationRequest;
use App\Mail\AssignedTaskMail;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class TaskService
{
    public function index(QueryStringRequest $request)
    {
        $validatedRequest = $request->validated();

        $tasks = Auth::user()->hasRole('admin')
            ? new Task()
            : Auth::user()->tasks();

        return [
            'tasks' => $tasks->with(['user', 'status', 'priority'])
                ->filter($validatedRequest)
                ->paginate($validatedRequest['perPage'] ?? 10)
                ->withQueryString(),
            'perPage' => [10, 25, 50]
        ];
    }

    public function store(TaskValidationRequest $request)
    {
        $task = new Task($request->validated());
        $task->save();

        Mail::to($task->user->email)->queue(new AssignedTaskMail($task));
    }
}
