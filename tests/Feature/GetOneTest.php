<?php

use App\Models\Car;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('GET /api/cars/{id} exists', function () {
    $car = Car::factory()->create();
    $response = $this->get("/api/cars/{$car->id}");
    $response->assertStatus(200);
});

test('GET /api/cars/{id} returns with 200 status code', function () {
    $car = Car::factory()->create();
    $response = $this->get("/api/cars/{$car->id}");

    $response->assertStatus(200);
});

test('GET /api/cars/{id} calls the relevant controller, checked by data not being null', function () {
    $car = Car::factory()->create();
    $response = $this->get("/api/cars/{$car->id}");
    expect($response->json())->not()->toBeNull();
});

test('GET /api/cars/{id} returns data in a JSON object format', function () {
    $car = Car::factory()->create();
    $response = $this->get("/api/cars/{$car->id}");
    $data = $response->json();
    expect($data)->toBeArray();
});

test('GET /api/cars/{id} returns the id specified in the url', function() {
    $car = Car::factory()->create();
    $response = $this->get("api/cars/{$car->id}");
    $data = $response->json();
    expect($data["id"])->toBe($car->id);
});

test('GET /api/cars/{id} gives 404 code if id is not found', function() {
    $response = $this->get('api/cars/99999999');
    $response->assertStatus(404);
});
