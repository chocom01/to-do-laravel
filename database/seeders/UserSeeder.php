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
            'name' => 'Kolya admin',
            'email' => 'mukola0303@gmail.com',
            'password' => bcrypt('chocm31415')
        ])->assignRole('admin');

        User::factory()->create([
            'name' => 'Cj',
            'email' => 'mukola0101@gmail.com',
            'password' => bcrypt('chocm31415')
        ])->assignRole('user');

        User::factory()->create([
            'name' => 'Jack',
            'email' => 'test@gmail.com',
            'password' => bcrypt('chocm31415')
        ])->assignRole('user');
    }
}
