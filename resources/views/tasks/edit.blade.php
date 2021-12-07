<x-layout>
    <style>
        <?php include '../resources/css/form.css'; ?>
    </style>
    <div class="center">
        <p class="text-2xl mb-6 flex justify-center"> Edit tasks </p>
        <form method="POST" action="/tasks/{{ $task->id }}">
            @csrf
            @method('PATCH')
            <x-task.form-properties :task="$task" > </x-task.form-properties>
            <input type="submit" value="Update">
        </form>
        <form method="POST" action="/tasks/{{ $task->id }}">
            @csrf
            @method('DELETE')
            <input type="submit" value="Delete">
        </form>
    </div>
</x-layout>
