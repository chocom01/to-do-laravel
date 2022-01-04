<!DOCTYPE html>
    <html>
        <body>
            <h1>{{ $task->name }}</h1>
            <h4> Status: {{ $task->status->name }}</h4>
            <h4> Priority: {{ $task->priority->name }}</h4>
            {{ $details['taskUrl'] }}
        </body>
    </html>
