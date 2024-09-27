<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'content' => fake()->realTextBetween($minNbChars = 50, $maxNbChars = 120, $indexSize = 2),
        ];
    }

    public function forUser($userId)
    {
        return $this->state(fn($attributes) => [
            'user_id' => $userId
        ]);
    }
    public function forBlog($blogId)
    {
        return $this->state(fn($attributes) => [
            'blog_id' => $blogId
        ]);
    }
}
