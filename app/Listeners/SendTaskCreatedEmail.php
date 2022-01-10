<?php

namespace App\Listeners;

use App\Events\TaskCreated;
use App\Mail\AssignedTaskMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendTaskCreatedEmail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param TaskCreated $event
     * @return void
     */
    public function handle(TaskCreated $event)
    {
        Mail::to($event->task->user->email)->send(new AssignedTaskMail($event->task));
    }
}
