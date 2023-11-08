<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Chat>
 */
class ChatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $sender = random_int(1,2);
        $receiver = $sender == 1 ? 2 : 1;
        return [
            'sender' => $sender,
            'receiver' => $receiver,
            'content' => fake()->sentences(3, true)
        ];
    }
}
