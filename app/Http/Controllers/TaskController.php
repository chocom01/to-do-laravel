<?php

namespace App\Http\Controllers;

use App\Models\Priority;
use App\Models\Status;
use App\Models\Task;
use App\Models\User;
use Illuminate\Validation\Rule;

class TaskController extends Controller
{
    public function index()
    {
        return view('tasks.index', [
            'tasks' => Task::filter()->paginate(request('perPage') ?? 10)->withQueryString(),
            'perPage' => [10, 25, 50]
        ]);
    }

    public function create()
    {
        return view('tasks.create', ['dropdownData' => [
            'user' => User::all(),
            'status' => Status::all(),
            'priority' => Priority::all()
        ]]);
    }

    public function store()
    {
        Task::create($this->validateTask());

        return redirect('/');
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', ['task' => $task]);
    }

    public function update(Task $task)
    {
        $attributes = $this->validateTask();
        $task->update($attributes);

        return back();
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect('/');
    }

    protected function validateTask(): array
    {
        return request()->validate([
            'name' => 'required|max:255',
            'user_id' => ['required', Rule::exists('users', 'id')],
            'status_id' => ['required', Rule::exists('statuses', 'id')],
            'priority_id' => ['required', Rule::exists('priorities', 'id')]
        ]);
    }
}
