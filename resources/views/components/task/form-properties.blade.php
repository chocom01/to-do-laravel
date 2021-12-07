<label> Name
    <input value="{{ old('name', $task->name ?? null) }}" name="name" type="text" placeholder="Your task name..">
    @error('name')
        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
    @enderror
</label>

<label> Assign to
    <x-task.selector :task="$task ?? $taskDependencies" :table="'user'" :column="'user_id'"></x-task.selector>
</label>

<label> Status
    <x-task.selector :task="$task ?? $taskDependencies" :table="'status'" :column="'status_id'"></x-task.selector>
</label>

<label> Priority
    <x-task.selector :task="$task ?? $taskDependencies" :table="'priority'" :column="'priority_id'"></x-task.selector>
</label>
