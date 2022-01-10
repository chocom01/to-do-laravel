<x-layout>
    <div class="mx-72 p-7">
        <p class="text-3xl mt-3 mb-6 flex justify-center"> Tasks </p>
        <table class="table-fixed">
            <tr>
                <x-task.th-arrow class="w-3/6" :orderBy="'name'"> Name </x-task.th-arrow>
                @role('admin')
                    <x-task.th-arrow class="w-1/6" :orderBy="'user_id'"> User </x-task.th-arrow>
                @else
                    <th class="w-1/6"> User </th>
                @endrole
                <x-task.th-arrow class="w-1/6" :orderBy="'status_id'"> Status </x-task.th-arrow>
                <x-task.th-arrow class="w-2/6" :orderBy="'priority_id'"> Priority </x-task.th-arrow>
                <th>Edit</th>
            </tr>
            @foreach ($tasks as $task)
                <tr>
                    <td> {{ $task->name }} </td>
                    <td> {{ $task->user->name }} </td>
                    <td> {{ $task->status->name }} </td>
                    <td> {{ $task->priority->name }} </td>
                    <td> <a class="button" href="/tasks/{{ $task->id }}/edit"> Edit </a> </td>
                </tr>
            @endforeach
        </table>

        <div class="flex items-center sm:justify-between">
            <div class="pagination">
                <p class="mt-5 mb-3 text-center"> Items on page </p>
                @foreach ($perPage as $limit)
                    <a class="{{ ($limit == (request('perPage') ?? 10) ? 'active' : '') }}"
                       href="{{ request()->fullUrlWithQuery(['perPage' => $limit, 'page' => 1]) }}" >
                        {{ $limit }}
                    </a>
                @endforeach
            </div>
            <div class="mt-7"> {{ $tasks->links() }} </div>
        </div>
    </div>
</x-layout>
