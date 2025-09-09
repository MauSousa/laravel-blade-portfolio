<?php

declare(strict_types=1);

describe('project browser', function () {
    test('can see welcome page', function () {
        $page = visit('/');

        $page->assertSee('Personal Portfolio');
    });
})->group('browser');
