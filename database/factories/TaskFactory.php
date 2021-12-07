<?php

namespace Database\Factories;

use App\Models\Priority;
use App\Models\Status;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Task::class;

    public function definition()
    {
        return [
            'name' => $this->faker->sentence(),
            'user_id' => User::factory(),
            'status_id' => Status::factory(),
            'priority_id' => Priority::factory()
        ];
    }
}
