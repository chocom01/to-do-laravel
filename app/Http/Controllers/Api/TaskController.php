<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\QueryStringRequest;
use App\Http\Requests\TaskValidationRequest;
use App\Http\Resources\TaskResource;
use App\Mail\AssignedTaskMail;
use App\Models\Task;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;

class TaskController extends Controller
{
    public function index(QueryStringRequest $request): Response | Application | ResponseFactory
    {
        $validated = $request->validated();

        $tasks = Task::filter($validated)
            ->paginate($validated['perPage'] ?? 10)
            ->withQueryString();

        return response(TaskResource::collection($tasks), 200);
    }

    public function store(TaskValidationRequest $request): object
    {
        $task = new Task($request->validated());
        $task->save();

        Mail::to($task->user->email)->send(new AssignedTaskMail($task));

        return response('Task successfully created', 201);
    }

    public function show(Task $task): TaskResource
    {
        return new TaskResource($task);
    }

    public function update(Task $task, TaskValidationRequest $request): Response | Application | ResponseFactory
    {
        $task->update($request->validated());
        return response($task, 200);
    }

    public function destroy(Task $task): Response | Application | ResponseFactory
    {
        $task->delete();
        return response('Task was deleted', 204);
    }
}
