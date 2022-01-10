<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AssignedTaskMail extends Mailable
{
    use Queueable;
    use SerializesModels;

    public $details;
    public $task;

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
            'taskUrl' => route('edit.task', ['task' => $this->task])
        ];

        return $this->subject('Assigned task notification ')
            ->view('emails.assignedTask');
    }
}
