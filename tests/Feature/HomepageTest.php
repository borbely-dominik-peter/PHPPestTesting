<?php

use Illuminate\Support\Facades\DB;

test('homepage loads successfully', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});

test('welcome page contains laravel text', function () {
    $this->get('/')
        ->assertSee('Laravel');
});


test('database connection is available', function () {
    expect(DB::connection()->getDatabaseName())->not->toBeNull();
});
