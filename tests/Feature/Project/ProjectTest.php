<?php

declare(strict_types=1);

use App\Enum\ProjectStatusEnum;
use App\Models\Project;

uses(Illuminate\Foundation\Testing\RefreshDatabase::class);

test('to array', function () {
    $project = Project::factory()->create()->refresh();

    expect(array_keys($project->toArray()))
        ->toBe(
            [
                'id',
                'is_published',
                'title',
                'description',
                'technologies',
                'repository_url',
                'project_url',
                'features',
                'created_at',
                'updated_at',
            ]
        );
});

test('project is drafted', function () {
    $project = Project::factory()->drafted()->create()->refresh();

    expect($project->is_published)->toBe(ProjectStatusEnum::DRAFTED);
});

test('project is published', function () {
    $project = Project::factory()->published()->create()->refresh();

    expect($project->is_published)->toBe(ProjectStatusEnum::PUBLISHED);
});
