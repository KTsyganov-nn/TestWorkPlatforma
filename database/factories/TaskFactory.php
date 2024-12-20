<?php

namespace Database\Factories;

use App\Models\StatusTask;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $dateStart = fake()->dateTimeBetween(Carbon::now()->subDays(10), Carbon::now()->addDay(30));
        $dateEnd = fake()->dateTimeBetween($dateStart, Carbon::create($dateStart)->addDays(30));
        $status_id = StatusTask::inRandomOrder()->first()->id;
        if ($status_id!=1&&$status_id!=6)
        {
            $user_took_id = User::inRandomOrder()->first()->id;
        }
        else {
            $user_took_id = null;
        }
        return [
            'user_id'=>User::inRandomOrder()->first()->id,
            'title' => fake()->jobTitle,
            'description'=>fake()->paragraph,
            'status_id'=>$status_id,
            'date_end'=>$dateEnd,
            'date_start'=>$dateStart,
            'user_took_id'=>$user_took_id,

        ];
    }

}
