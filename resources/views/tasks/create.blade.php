<x-layout>
    <style>
        <?php include '/home/chocom01/project/to-do-laravel/resources/css/form.css'; ?>
    </style>

    <div class="center">
        <p class="text-2xl mb-6 flex justify-center"> Create task </p>

        <form method="POST" action="/tasks">
            @csrf
            <x-task.form_properties :create="$dropdownData"> </x-task.form_properties>
            <input type="submit" value="Submit">
        </form>
    </div>
</x-layout>
