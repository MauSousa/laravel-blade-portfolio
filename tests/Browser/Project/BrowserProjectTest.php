<?php

declare(strict_types=1);

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
});

describe('project browser', function () {
    test('can see welcome page', function () {
        $page = visit('/');

        $page->assertSee('Personal Portfolio');
    });
})->group('browser');
