<x-layout>
    <style>
        <?php include '../resources/css/tasks.index.css'; ?>
    </style>

    <div class="mx-72 p-7">
        <x-task.tasks-table :tasks="$tasks"> Tasks </x-task.tasks-table>
        <div class="pagination">
            <p class="mt-4 mb-3"> Items on page </p>
            @foreach ($perPage as $limit)
                <a class="{{ ($limit == request('perPage') ? 'active' : '') }}"
                   href="{{ request()->fullUrlWithQuery(['perPage' => $limit, 'page' => 1]) }}" >
                   {{ $limit }}
                </a>
            @endforeach
        </div>
        <div class="mt-4"> {{ $tasks->links() }} </div>
    </div>
</x-layout>
