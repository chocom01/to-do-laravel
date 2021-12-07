<?php

namespace App\Http\Controllers;

use App\Models\Priority;
use App\Models\Status;
use App\Models\Task;
use App\Models\User;
use Illuminate\Validation\Rule;

class TaskController extends Controller
{
    public function create()
    {
        return view('tasks.create', ['taskDependencies' => (object) [
            'user' => User::all(),
            'status' => Status::all(),
            'priority' => Priority::all()
        ]]);
    }

    public function store()
    {
        Task::create($this->validateTask());

        return redirect('/tasks');
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
