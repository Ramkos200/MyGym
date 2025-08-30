<?php

namespace Database\Seeders;

use App\Models\ClassType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        ClassType::create([
            'name' => 'yoga',
            'description' => fake()->text(),
            'minutes' => 50
        ]);
        ClassType::create([
            'name' => 'Pilate',
            'description' => fake()->text(),
            'minutes' => 45
        ]);
        ClassType::create([
            'name' => 'dancing',
            'description' => fake()->text(),
            'minutes' => 60
        ]);
        ClassType::create([
            'name' => 'meditation',
            'description' => fake()->text(),
            'minutes' => 60
        ]);
    }
}