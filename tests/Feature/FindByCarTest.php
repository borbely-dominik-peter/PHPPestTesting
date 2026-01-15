<?php

test('GET /api/cars/car/{ID} exists', function () {
    $response = $this->get('/api/cars/car/1');

})->throwsNoExceptions();

test('GET /api/cars/car/{ID} returns with 200 status code', function () {
    $response = $this->get('/api/cars/car/1');

    $response->assertStatus(200);
});

test('GET /api/cars/car/{ID} calls the relevant controller, checked by data not being null', function () {
    $response = $this->get('/api/cars/car/1');
    expect($response->json())->not()->toBeNull();
});

test('GET /api/cars/car/{ID} returns data in a JSON array format', function () {
    $response = $this->get('/api/cars/car/{ID}');
    $data = $response->json();
    expect($data)->toBeArray();
});

