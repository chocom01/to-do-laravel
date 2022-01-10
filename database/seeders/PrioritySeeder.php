<?php

namespace Database\Seeders;

use App\Models\Priority;
use Illuminate\Database\Seeder;

class PrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Priority::insert([
            [
                'name' => 'Low',
                'slug' => 'low'
            ],
            [
                'name' => 'Middle',
                'slug' => 'middle'
            ],
            [
                'name' => 'High',
                'slug' => 'high'
            ]
        ]);
    }
}
