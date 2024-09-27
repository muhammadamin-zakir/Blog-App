<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->jobTitle(),
            'image' => fake()->image(),
            'description' => fake()->realText(),
            'content' => fake()->realText(),
            'is_active' => true
        ];
    }

    public function forUser($userId)
    {
        return $this->state(fn($attributes) => [
            'user_id' => $userId
        ]);
    }
    public function forCategory($categoryId)
    {
        return $this->state(fn($attributes) => [
            'category_id' => $categoryId
        ]);
    }

    // public function forCategory($category)
    // {
    //     return $this->afterCreating(function ($blog) use ($category) {
    //         $blog->category_id = $category->id;
    //         // $blog->comments()->attach();
    //     });
    // }
}
