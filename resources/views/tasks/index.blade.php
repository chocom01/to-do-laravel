<x-layout>
    <style>
        <?php include '/home/chocom01/project/to-do-laravel/resources/css/tasks.index.css'; ?>
    </style>

    <div class="mx-72 p-7">
        <p class="text-3xl mt-3 mb-6 flex justify-center">Tasks</p>

        <x-task.index-table :tasks="$tasks"> </x-task.index-table>

        <div class="pagination">
            <p class="mt-4 mb-3">Items on page:</p>

            @foreach ($perPage as $limit)
                <a class="{{ ($limit == request('perPage') ? 'active' : '') }}"
                   href="{{ request()->fullUrlWithQuery(['perPage' => $limit, 'page' => 1]) }}" >
                   {{ $limit }}
                </a>
            @endforeach
        </div>

        <div class="mt-8 mb-10 right"> {{ $tasks->links() }} </div>
    </div>
</x-layout>
