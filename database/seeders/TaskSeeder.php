<?php

namespace Database\Seeders;

use App\Models\Priority;
use App\Models\Status;
use App\Models\Task;
use App\Models\User;
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
        for ($counter = 1; $counter <= 7; $counter++) {
            Task::factory()->count(7)->create($this->randomDependencies());
        }
    }

    private function randomDependencies(): array
    {
        return [
            'user_id' => User::query()->inRandomOrder()->first()->getKey(),
            'status_id' => Status::query()->inRandomOrder()->first()->getKey(),
            'priority_id' => Priority::query()->inRandomOrder()->first()->getKey()
        ];
    }
}
