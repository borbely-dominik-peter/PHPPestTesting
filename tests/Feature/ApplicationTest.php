<?php

test('homepage does not accept post requests', function () {
    $this->post('/')->assertStatus(405);
});

test('welcome view renders without errors', function () {
    $response = $this->get('/');

    $response->assertOk();
    expect($response->getContent())->toBeString();
});

test('non existent page returns 404', function () {
    $this->get('/this-page-does-not-exist')
        ->assertStatus(404);
});

test('application name is accessible from config', function () {
    expect(config('app.name'))->not->toBeNull();
});

test('homepage returns html content type', function () {
    $this->get('/')
        ->assertHeader('Content-Type', fn ($value) =>
            str_contains($value, 'text/html')
        );
});

