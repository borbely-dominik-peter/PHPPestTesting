<?php

use App\Models\Car;
use Illuminate\Foundation\Testing\RefreshDatabase;

// uses(RefreshDatabase::class);

test('POST /api/cars creates a new car', function () {
    $carData = [
        'Name' => 'Tesla Model S',
        'Cylinders' => 0,
        'Miles_per_Gallon' => 100,
        'Horsepower' => 670,
        'Origin' => 'USA',
        'Year' => '2023-01-01'
    ];

    $response = $this->postJson('/api/cars', $carData);

    $response->assertStatus(201)
             ->assertJsonPath('Name', 'Tesla Model S');

    $this->assertDatabaseHas('cars', ['Name' => 'Tesla Model S']);
});

test('POST /api/cars validation fails if Name is missing', function () {
    $response = $this->postJson('/api/cars', []);

    $response->assertStatus(422)
             ->assertJsonValidationErrors(['Name']);
});
