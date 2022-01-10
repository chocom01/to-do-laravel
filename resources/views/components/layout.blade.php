<!doctype html>
<body style="font-family: Open Sans, sans-serif">
<title>Tasks</title>

<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<link href="{{ asset('/css/nav.css') }}" rel="stylesheet">
<link href="{{ asset('/css/form.css') }}" rel="stylesheet">
<link href="{{ asset('/css/tasks.index.css') }}" rel="stylesheet">

<nav>
    <div class="topnav">
        <a class="{{ (Route::current()->uri() == 'tasks') ? 'active' : '' }}" href="/tasks">Home</a>
        <a class="{{ (Route::current()->uri() == 'tasks/create') ? 'active' : '' }}" href="/tasks/create">Create task</a>
    </div>
</nav>
    {{$slot}}
</body>
