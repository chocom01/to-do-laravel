<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'Kolya',
            'email' => 'mukola0303@gmail.com',
            'password' => bcrypt('chocm31415')
        ]);

        User::factory()->create();
    }
}
