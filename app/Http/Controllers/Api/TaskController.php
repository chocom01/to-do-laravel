<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\IndexTaskRequest;
use App\Http\Requests\TaskValidationRequest;
use App\Http\Resources\TaskResource;
use App\Mail\AssignedTaskMail;
use App\Models\Task;
use App\Services\TaskService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;

class TaskController extends Controller
{
    public function index(TaskService $service, IndexTaskRequest $request): JsonResponse
    {
        $data = $service->index($request->validated());

        return (TaskResource::collection($data['tasks']))->response($data['perPage']);
    }

    public function store(TaskService $service, TaskValidationRequest $request): Response
    {
        $service->store($request->validated());

        return response('Task successfully created', 201);
    }

    public function show(Task $task): TaskResource
    {
        return new TaskResource($task);
    }

    public function update(TaskService $service, Task $task, TaskValidationRequest $request): Response
    {
        $service->update($task, $request->validated());

        return response($task, 200);
    }

    public function destroy(TaskService $service, Task $task): Response
    {
        $service->destroy($task);

        return response('Task was deleted', 204);
    }
}
