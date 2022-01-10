<x-layout>
    <div class="center">
        <p class="text-2xl mb-6 flex justify-center"> Create task </p>
        <form method="POST" action="/tasks">
            @csrf

            <label> Name
                <input value="{{ old('name', $task->name ?? null) }}" name="name" type="text" placeholder="Your task name..">
                @error('name')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </label>

            <label> Assign to
                @role('admin')
                    <x-task.selector :records="$users" :column="'user_id'"></x-task.selector>
                @else
                    <select disabled name="user_id">
                        <option value="{{ $task->user_id }}">{{ ucwords($task->user_id) }}</option>
                    </select>
                    @endrole
            </label>

            <label> Status
                <x-task.selector :records="$statuses" :column="'status_id'"></x-task.selector>
            </label>

            <label> Priority
                <x-task.selector :records="$priorities" :column="'priority_id'"></x-task.selector>
            </label>

            <input type="submit" value="Submit">
        </form>
    </div>
</x-layout>
