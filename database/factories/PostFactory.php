<?php

namespace Database\Factories;

use App\Enums\Post\CategoryEnum;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Lottery;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
        $userId = Lottery::odds(75, 100)
            ->winner(
                fn() => User::first()->id
            )
            ->loser(fn () => null)
            ->choose();

        $category = CategoryEnum::cases()[rand(0, 3)];

        return [
            'user_id' => $userId,
            'category' => $category,
            'title' => fake()->realText(16),
            'content' => fake()->realText(200)
        ];
    }
}
