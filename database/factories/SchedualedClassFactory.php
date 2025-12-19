<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\SchedualedClass;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SchedualedClass>
 */
class SchedualedClassFactory extends Factory
{
    protected $model = SchedualedClass::class;
    
    private $usedDateTimes = [];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
       
        do {
            $dateTime = now()
                ->addHours(rand(24, 120))
                ->setTime(
                    fake()->randomElement([6, 7, 8, 9, 10, 11, 18, 19, 20]),
                    fake()->randomElement([0, 15, 30, 45])
                );
        } while (in_array($dateTime->format('Y-m-d H:i:s'), $this->usedDateTimes));
        
        $this->usedDateTimes[] = $dateTime->format('Y-m-d H:i:s');

        return [
            'instructor_id' => rand(15, 19),
            'class_type_id' => rand(1, 4),
            'date_time' => $dateTime,
        ];
    }
}