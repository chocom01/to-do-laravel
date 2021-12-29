<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\QueryStringRequest;
use App\Http\Requests\TaskValidationRequest;
use App\Mail\UserActiveTasksMail;
use App\Models\Priority;
use App\Models\Status;
use App\Models\Task;
use App\Models\User;
use App\Services\TaskService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class TaskController extends Controller
{
    public function index(TaskService $service, QueryStringRequest $request): View
    {
        $data = $service->index($request);

        return view('tasks.index', $data);
    }

    public function create(): View
    {
        return view('tasks.create', ['taskDependencies' => (object) [
            'user' => new User(),
            'status' => new Status(),
            'priority' => new Priority()
        ]]);
    }

    public function store(TaskService $service, TaskValidationRequest $request): RedirectResponse
    {
        $service->store($request);

        return redirect()->home();
    }

    public function edit(Task $task): View
    {
        return view('tasks.edit', ['task' => $task]);
    }

    public function update(Task $task, TaskValidationRequest $request): RedirectResponse
    {
        $task->update($request->validated());

        return back();
    }

    public function destroy(Task $task): RedirectResponse
    {
        $task->delete();

        return redirect()->home();
    }
}
