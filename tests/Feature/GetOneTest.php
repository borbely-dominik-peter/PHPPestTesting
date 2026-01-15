<?php

use App\Models\Car;
use Illuminate\Foundation\Testing\RefreshDatabase;

test('GET /api/cars/{id} exists', function () {
    $response = $this->get("/api/cars/1");
    $response->assertStatus(200);
});

test('GET /api/cars/{id} returns with 200 status code', function () {
    $response = $this->get("/api/cars/1");

    $response->assertStatus(200);
});

test('GET /api/cars/{id} calls the relevant controller, checked by data not being null', function () {
    $response = $this->get("/api/cars/1");
    expect($response->json())->not()->toBeNull();
});

test('GET /api/cars/{id} returns data in a JSON object format', function () {
    $response = $this->get("/api/cars/1");
    $data = $response->json();
    expect($data)->toBeArray();
});

test('GET /api/cars/{id} returns the id specified in the url', function() {
    $response = $this->get("api/cars/1");
    $data = $response->json();
    expect($data["id"])->toBe(1);
});

test('GET /api/cars/{id} gives 404 code if id is not found', function() {
    $response = $this->get('api/cars/99999999');
    $response->assertStatus(404);
});
