
<label> Name
    <input value="{{ old('name', $task->name ?? null) }}" name="name" type="text" placeholder="Your task name..">

    @error('name')
        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
    @enderror
</label>

<x-task.selectors :task="$task ?? null" :dropdownData="$create ?? null" :column="'user_id'" :table="'user'">
    Assign to
</x-task.selectors>
<x-task.selectors :task="$task ?? null" :dropdownData="$create ?? null" :column="'status_id'" :table="'status'">
    Status
</x-task.selectors>
<x-task.selectors :task="$task ?? null" :dropdownData="$create ?? null" :column="'priority_id'" :table="'priority'">
    Priority
</x-task.selectors>