<?php
// File names must end with Test

test('GET /api/cars exists', function () {
    $response = $this->get('/api/cars');

})->throwsNoExceptions();

test('GET /api/cars returns with 200 status code', function () {
    $response = $this->get('/api/cars');

    $response->assertStatus(200);
});

test('GET /api/cars calls the relevant controller, checked by data not being null', function () {
    $response = $this->get('/api/cars');
    expect($response->json())->not()->toBeNull();
});

test('GET /api/cars returns data in a JSON array format', function () {
    $response = $this->get('/api/cars');
    $data = $response->json();
    expect($data)->toBeArray();
});


