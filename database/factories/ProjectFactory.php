<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Enum\ProjectStatusEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'is_published' => true,
            'title' => $this->faker->title(),
            'description' => $this->faker->text(),
            'technologies' => $this->faker->text(),
            'repository_url' => $this->faker->url(),
            'project_url' => $this->faker->url(),
            'features' => $this->faker->text(),
        ];
    }

    /**
     * Indicate that the project is drafted
     */
    public function drafted(): Factory
    {
        return $this->state(fn (array $attributes): array => [
            'is_published' => ProjectStatusEnum::DRAFTED,
        ]);
    }

    /**
     * Indicate that the project is published
     */
    public function published(): Factory
    {
        return $this->state(fn (array $attributes): array => [
            'is_published' => ProjectStatusEnum::PUBLISHED,
        ]);
    }
}
