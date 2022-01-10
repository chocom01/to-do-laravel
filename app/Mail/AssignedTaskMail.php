<?php

namespace App\Mail;

use App\Models\Task;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AssignedTaskMail extends Mailable
{
    use Queueable;
    use SerializesModels;

    public array $details;
    public Task $task;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($task)
    {
        $this->task = $task;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->details = [
            'taskUrl' => route('tasks.edit', ['task' => $this->task])
        ];

        return $this->subject('Assigned task notification')
            ->view('emails.assignedTask');
    }
}
