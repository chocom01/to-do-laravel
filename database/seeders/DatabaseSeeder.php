<?php

namespace Database\Seeders;

use App\Models\Priority;
use App\Models\Status;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
             'name' => 'Kolya'
            ]);

        User::factory()->create();

        $assigned = Status::factory()->create([
             'name' => 'Assigned',
             'slug' => 'assigned'
            ]);

        $inProgress = Status::factory()->create([
            'name' => 'In progress',
            'slug' => 'in_progress'
        ]);

        $done = Status::factory()->create([
            'name' => 'Done',
            'slug' => 'done'
        ]);

        $low = Priority::factory()->create([
             'name' => 'Low',
             'slug' => 'low'
            ]);

        $middle = Priority::factory()->create([
             'name' => 'Middle',
             'slug' => 'middle'
        ]);

        $high = Priority::factory()->create([
             'name' => 'High',
             'slug' => 'high'
        ]);

        Task::factory(14)->create([
            'user_id' => 2,
            'status_id' => $inProgress,
            'priority_id' => $middle
        ]);

        Task::factory(14)->create([
            'user_id' => 1,
            'status_id' => $assigned,
            'priority_id' => $low
        ]);

        Task::factory(14)->create([
            'user_id' => 2,
            'status_id' => $done,
            'priority_id' => $high
        ]);

        Task::factory(14)->create([
            'user_id' => 1,
            'status_id' => $assigned,
            'priority_id' => $middle
        ]);
    }
}
