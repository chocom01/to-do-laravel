<table class="table-fixed">
    <tr>
        <x-task.arrow-table class="w-2/3" :orderBy="'name'"> Name </x-task.arrow-table>
        <x-task.arrow-table class="w-1/6" :orderBy="'user_id'"> User </x-task.arrow-table>
        <x-task.arrow-table class="w-1/6" :orderBy="'status_id'"> Status </x-task.arrow-table>
        <x-task.arrow-table class="w-1/6" :orderBy="'priority_id'"> Priority </x-task.arrow-table>
        <th class=""></th>
    </tr>

    @foreach ($tasks as $task)
        <tr>
            <td> {{ $task->name }}</td>
            <td> {{ $task->user->name }}</td>
            <td> {{ $task->status->name }} </td>
            <td> {{ $task->priority->name }}</td>
            <td> <button class="button" onclick="location.href='/tasks/{{ $task->id }}'"> Edit </button> </td>
        </tr>
    @endforeach
</table>