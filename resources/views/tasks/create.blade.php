<x-layout>
    <div class="center">
        <p class="text-2xl mb-6 flex justify-center"> Create task </p>
        <form method="POST" action="/tasks">
            @csrf
            <x-task.form-properties :taskDependencies="$taskDependencies"> </x-task.form-properties>
            <input type="submit" value="Submit">
        </form>
    </div>
</x-layout>
