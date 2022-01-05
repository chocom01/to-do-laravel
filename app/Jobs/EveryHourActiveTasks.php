<?php

namespace App\Jobs;

use App\Mail\UserActiveTasksMail;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class EveryHourActiveTasks implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        User::has('tasks')->chunk(100, function ($users) {
            foreach ($users as $user) {
                $userActiveTasksCount = $user->tasks()->active()->count();

                Mail::to($user->email)->send(new UserActiveTasksMail($userActiveTasksCount));
            }
        });
    }
}
