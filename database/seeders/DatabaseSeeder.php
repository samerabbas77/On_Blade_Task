<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Task;
use Illuminate\Database\Seeder;
use Database\Factories\TaskFactory;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        

        \App\Models\User::factory()->create([
            'name' => 'samer',
            'email' => 'samer@gmail.com',
            'password' => Hash::make('12345678')
        ]);
        \App\Models\User::factory()->create([
            'name' => 'reem',
            'email' => 'reem@gmail.com',
            'password' => Hash::make('12345678')
        ]);
        Task::factory()->count(10)->create();
    }
}
