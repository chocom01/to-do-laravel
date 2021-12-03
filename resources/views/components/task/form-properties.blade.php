<label> Name
    <input value="{{ old('name', $task->name ?? null) }}" name="name" type="text" placeholder="Your task name..">
    @error('name')
        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
    @enderror
</label>

<label> Assign to
    <x-task.selectors :task="$task ?? $taskDependencies" :table="'user'"></x-task.selectors>
</label>

<label> Status
    <x-task.selectors :task="$task ?? $taskDependencies" :table="'status'"></x-task.selectors>
</label>

<label> Priority
    <x-task.selectors :task="$task ?? $taskDependencies" :table="'priority'"></x-task.selectors>
</label>
