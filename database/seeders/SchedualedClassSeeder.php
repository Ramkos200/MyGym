<?php

namespace Database\Seeders;

use App\Models\SchedualedClass;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SchedualedClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        SchedualedClass::factory()->count(10)->create();
    }
}