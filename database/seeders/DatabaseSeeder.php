<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\Subject;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\Guardian;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Guardian::factory(30)->create();
        
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Subject::factory(5)->hasTeachers(1)->create();
        Classroom::factory(3)->hasStudents(10)->create();
    }
}