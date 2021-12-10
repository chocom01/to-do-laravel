<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::insert([
            [
                'name' => 'Assigned',
                'slug' => 'assigned'
            ],
            [
                'name' => 'In progress',
                'slug' => 'in_progress'
            ],
            [
                'name' => 'Done',
                'slug' => 'done'
            ]
        ]);
    }
}
