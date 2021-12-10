<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Task::factory()->count(14)->create([
            'user_id' => 2,
            'status_id' => 2,
            'priority_id' => 2
        ]);

        Task::factory()->count(14)->create([
            'user_id' => 1,
            'status_id' => 1,
            'priority_id' => 1
        ]);

        Task::factory()->count(14)->create([
            'user_id' => 2,
            'status_id' => 3,
            'priority_id' => 3
        ]);

        Task::factory()->count(14)->create([
            'user_id' => 1,
            'status_id' => 1,
            'priority_id' => 2
        ]);
    }
}
