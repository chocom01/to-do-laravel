<!doctype html>
<body style="font-family: Open Sans, sans-serif">
<title>Tasks</title>

<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">

<nav>
    <style>
        <?php include '/home/chocom01/project/to-do-laravel/resources/css/nav.css'; ?>
    </style>

    <div class="topnav">
        <a href="/">Home</a>
        <a href="/tasks">Create task</a>
    </div>
</nav>
    {{$slot}}
</body>
