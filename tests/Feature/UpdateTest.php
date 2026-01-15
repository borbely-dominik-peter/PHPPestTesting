<?php

use App\Models\Car;
use Illuminate\Foundation\Testing\RefreshDatabase;

// uses(RefreshDatabase::class);

test('PUT/PATCH /api/cars/{ID} exists', function () {
    $carData = [
        'Name' => 'Tesla Model S',
    ];
    $response = $this->putJson("/api/cars/1", $carData);

})->throwsNoExceptions();

test('PUT/PATCH /api/cars/{ID} returns with 200 status code', function () {
    $carData = [
        'Name' => 'Tesla Model S',
    ];
    $response = $this->putJson("/api/cars/1", $carData);

    $response->assertStatus(200);
});

test('PUT/PATCH /api/cars/{ID} calls the relevant controller, tested by returned data not being null', function () {
    $carData = [
        'Name' => 'Tesla Model S',
    ];
    $response = $this->putJson("/api/cars/1", $carData);
    expect($response->json())->not()->toBeNull();
});

test('PUT/PATCH /api/cars/{ID} returns data in a JSON array format', function () {
    $carData = [
        'Name' => 'Tesla Model S',
    ];
    $response = $this->putJson("/api/cars/1", $carData);
    $data = $response->json();
    expect($data)->toBeArray();
});


