<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SchedualedClass>
 */
class SchedualedClassFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'instructor_id' => rand(15, 19),
            'class_type_id' => rand(1, 4),
            'date_time' => now()
                ->addHours(rand(24, 120))
                ->setTime(
                    fake()->randomElement([6, 7, 8, 9, 10, 11, 18, 19, 20]),
                    0
                ),
        ];
        // // Generate random future date (24-120 hours from now)
        // $randomHours = rand(24, 120);
        // $futureDate = now()->addHours($randomHours);

        // // Determine time slot
        // $isMorning = (bool) rand(0, 1);

        // if ($isMorning) {
        //     // Morning: 6AM to 11AM (6, 7, 8, 9, 10, 11)
        //     $hour = rand(6, 12);
        // } else {
        //     // Evening: 6PM to 9PM (18, 19, 20)
        //     $hour = rand(18, 21);
        // }

        // // Set the exact time
        // $dateTime = $futureDate->setTime($hour, 0);

        // // Ensure uniqueness by checking if this date_time already exists
        // while (\App\Models\SchedualedClass::where('date_time', $dateTime)->exists()) {
        //     // If it exists, generate a new one by adding 1 hour
        //     $dateTime = $dateTime->addDay();
        // }

        // return [
        //     'instructor_id' => rand(15, 19),
        //     'class_type_id' => rand(1, 4),
        //     'date_time' => $dateTime,
        // ];
    }
}