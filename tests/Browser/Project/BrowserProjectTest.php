<?php

declare(strict_types=1);

use App\Models\Project;
use App\Models\User;

describe('project pages', function () {
    test('can render home page', function () {
        $response = $this->get('/');
        $response->assertStatus(200);
    });

    test('can render projects admin panel', function () {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get(route('project.index'));
        $response->assertStatus(200);
    });

    test('can not render projects admin panel if user is not authenticated', function () {
        $this->get(route('project.index'))->assertRedirect('/');
    });

    test('can render create project page', function () {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get(route('project.create'));
        $response->assertStatus(200);
    });

    test('guest can not render create project page', function () {
        $response = $this->get(route('project.create'));
        $response->assertRedirect('/');
    });
});

describe('project browser', function () {
    test('can see welcome page', function () {
        $page = visit('/');

        $page->assertSee('Mauricio Sousa');
    });

    test('can create a new project', function () {
        $user = User::factory()->create();
        $this->actingAs($user);

        $page = visit(route('project.index'));

        $page->assertSee('Create a new project')
            ->click('Create a new project')
            ->assertUrlIs(route('project.create'))
            ->fill('title', 'My Project')
            ->fill('description', 'My project description')
            ->click('Create')
            ->assertSee('My Project');
    });

    test('can not create project if title is already taken', function () {
        $project = Project::factory()->create();
        $user = User::factory()->create();
        $this->actingAs($user);

        $page = visit(route('project.create'));
        $page->fill('title', $project->title);
        $page->click('Create');
        $page->assertSee('The title has already been taken.');
    });

    test('can not create project if description is too long', function () {
        $user = User::factory()->create();
        $this->actingAs($user);

        $page = visit(route('project.create'));
        $page->fill('title', 'My Project');
        $page->fill('description', str_repeat('A', 1000));
        $page->click('Create');
        $page->assertSee('The description field must not be greater than 300 characters.');
    });

    test('can not create project if technologies is too long', function () {
        $user = User::factory()->create();
        $this->actingAs($user);

        $page = visit(route('project.create'));
        $page->fill('title', 'My Project');
        $page->fill('technologies', str_repeat('A', 1000));
        $page->click('Create');
        $page->assertSee('The technologies field must not be greater than 255 characters.');
    });

    test('can not create project if is repository url is too long', function () {
        $user = User::factory()->create();
        $this->actingAs($user);

        $page = visit(route('project.create'));
        $page->fill('title', 'My Project');
        $page->fill('repository_url', 'https://github.com/user/laravel-portfolioaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa');
        $page->click('Create');
        $page->assertSee('The repository url field must not be greater than 255 characters.');
    });

    test('can not create project if is website url is too long', function () {
        $user = User::factory()->create();
        $this->actingAs($user);

        $page = visit(route('project.create'));
        $page->fill('title', 'My Project');
        $page->fill('project_url', 'https://github.com/user/laravel-portfolioaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa');
        $page->click('Create');
        $page->assertSee('The project url field must not be greater than 255 characters.');
    });
})->group('browser');
