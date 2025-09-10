<?php

declare(strict_types=1);

use App\Models\Project;
use App\Models\User;

uses(Illuminate\Foundation\Testing\RefreshDatabase::class);

test('can create a project', function () {
    $user = User::factory()->create();

    $this->actingAs($user);

    $response = $this->post(route('project.store'), [
        'title' => 'Test Project',
        'description' => 'Test description',
        'technologies' => 'Test technologies',
        'repository_url' => 'https://github.com/test/test',
        'project_url' => 'https://test.com',
        'features' => 'Test features',
    ]);

    $this->assertDatabaseHas('projects', [
        'title' => 'Test Project',
        'description' => 'Test description',
        'technologies' => 'Test technologies',
        'repository_url' => 'https://github.com/test/test',
        'project_url' => 'https://test.com',
        'features' => 'Test features',
    ]);

    $response->assertRedirect(route('project.index'));
});

test('can not create a project without a title', function () {
    $user = User::factory()->create();

    $this->actingAs($user);

    $response = $this->post(route('project.store'), [
        'description' => 'Test description',
        'technologies' => 'Test technologies',
        'repository_url' => 'https://github.com/test/test',
        'project_url' => 'https://test.com',
        'features' => 'Test features',
    ]);

    $response->assertSessionHasErrors('title');
});

test('can not create a project with duplicate title', function () {
    $user = User::factory()->create();

    $this->actingAs($user);

    $project = Project::factory()->create();

    $response = $this->post(route('project.store'), [
        'title' => $project->title,
        'description' => 'Test description',
        'technologies' => 'Test technologies',
        'repository_url' => 'https://github.com/test/test',
        'project_url' => 'https://test.com',
        'features' => 'Test features',
    ]);

    $response->assertSessionHasErrors('title');
});

test('can not create a project if repository url is invalid', function () {
    $user = User::factory()->create();

    $this->actingAs($user);

    $response = $this->post(route('project.store'), [
        'title' => 'Test Project',
        'description' => 'Test description',
        'technologies' => 'Test technologies',
        'repository_url' => 'github.com/test/test',
        'project_url' => 'test.com',
        'features' => 'Test features',
    ]);

    $response->assertSessionHasErrors('repository_url');
});

test('can not create a project if project url is invalid', function () {
    $user = User::factory()->create();

    $this->actingAs($user);

    $response = $this->post(route('project.store'), [
        'title' => 'Test Project',
        'description' => 'Test description',
        'technologies' => 'Test technologies',
        'repository_url' => 'https://github.com/test/test',
        'project_url' => 'test.com',
        'features' => 'Test features',
    ]);

    $response->assertSessionHasErrors('project_url');
});
