<x-layout>
    <link href="{{ asset('/css/form.css') }}" rel="stylesheet">

    <div class="center">
        <p class="text-2xl mb-6 flex justify-center"> Edit tasks </p>
        <form method="POST" action="/tasks/{{ $task->id }}">
            @csrf
            @method('PATCH')

            <label> Name
                <input value="{{ old('name', $task->name ?? null) }}" name="name" type="text" placeholder="Your task name..">
                @error('name')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </label>

            <label> Assign to
                @role('admin')
                    <x-task.selector :object="$task" :table="'user'" :column="'user_id'"></x-task.selector>
                @else
                    <select disabled name="user_id">
                        <option value="{{ Auth::id() }}">{{ ucwords(Auth::user()->name) }}</option>
                    </select>
                @endrole
            </label>

            <label> Status
                <x-task.selector :object="$task" :table="'status'" :column="'status_id'"></x-task.selector>
            </label>

            <label> Priority
                <x-task.selector :object="$task" :table="'priority'" :column="'priority_id'"></x-task.selector>
            </label>

            <input type="submit" value="Update">
        </form>

        @role('admin')
            <form method="POST" action="/tasks/{{ $task->id }}">
                @csrf
                @method('DELETE')
                <input type="submit" value="Delete">
            </form>
        @endrole
    </div>
</x-layout>
