<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\QueryStringRequest;
use App\Http\Requests\TaskValidationRequest;
use App\Mail\AssignedTaskMail;
use App\Models\Priority;
use App\Models\Status;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class TaskController extends Controller
{
    public function index(QueryStringRequest $request): View
    {
        $validated = $request->validated();

        return view('tasks.index', [
            'tasks' => Task::filter($validated)
                ->paginate($validated['perPage'] ?? 10)
                ->withQueryString(),
            'perPage' => [10, 25, 50]
        ]);
    }
    public function create(): View
    {
        return view('tasks.create', ['taskDependencies' => (object) [
            'user' => User::all(),
            'status' => Status::all(),
            'priority' => Priority::all()
        ]]);
    }

    public function store(TaskValidationRequest $request): RedirectResponse
    {
        $task = new Task($request->validated());
        $task->save();

        Mail::to($task->user->email)->send(new AssignedTaskMail($task));

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
