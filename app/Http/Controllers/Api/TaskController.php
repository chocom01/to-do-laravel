<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\QueryStringRequest;
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
    public function index(TaskService $service, QueryStringRequest $request): JsonResponse
    {
        $data = $service->index($request);

        return (TaskResource::collection($data['tasks']))->response($data['perPage']);
    }

    public function store(TaskService $service, TaskValidationRequest $request): Response
    {
        $service->store($request);

        return response('Task successfully created', 201);
    }

    public function show(Task $task): TaskResource
    {
        return new TaskResource($task);
    }

    public function update(Task $task, TaskValidationRequest $request): Response
    {
        $task->update($request->validated());

        return response($task, 200);
    }

    public function destroy(Task $task): Response
    {
        $task->delete();

        return response('Task was deleted', 204);
    }
}
