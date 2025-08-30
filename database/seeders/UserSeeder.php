<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::factory()->create([
            'name' => 'admin1',
            'email' => 'admin1@mygym.com',
            'password' => 'admin1',
            'role' => 'admin'
        ]);
        User::factory()->create([
            'name' => 'admin2',
            'email' => 'admin2@mygym.com',
            'password' => 'admin2',
            'role' => 'admin'
        ]);
        User::factory()->create([
            'name' => 'user1',
            'email' => 'user1@mygym.com',
            'password' => 'user1'
        ]);
        User::factory()->create([
            'name' => 'user2',
            'email' => 'user2@mygym.com',
            'password' => 'user2'
        ]);
        User::factory()->count('10')->create();

        User::factory()->create([
            'name' => 'instuctor1',
            'email' => 'instructor1@mygym.com',
            'password' => 'instructor1',
            'role' => 'instructor'

        ]);
        User::factory()->create([
            'name' => 'instuctor2',
            'email' => 'instructor2@mygym.com',
            'password' => 'instructor2',
            'role' => 'instructor'
        ]);
        User::factory()->count('3')->create(['role' => 'instructor']);
    }
}