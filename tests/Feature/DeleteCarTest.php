<?php

use App\Models\Car;
use Illuminate\Foundation\Testing\RefreshDatabase;

// uses(RefreshDatabase::class);

test('DELETE /api/cars/{id} removes a car', function () {
    $car = Car::factory()->create();

    $response = $this->delete("/api/cars/{$car->id}");

    $response->assertStatus(204);
    $this->assertDatabaseMissing('cars', ['id' => $car->id]);
});

test('DELETE /api/cars/{id} returns 404 if car not found', function () {
    $response = $this->delete('/api/cars/999');
    $response->assertStatus(404);
});

test('DELETE /api/cars/{id} successfully deletes from database', function () {
    $car = Car::factory()->create(['Name' => 'Toyota', 'Origin' => 'Camry']);
    
    $this->delete("/api/cars/{$car->id}");
    
    $this->assertDatabaseMissing('cars', ['Name' => 'Toyota', 'Origin' => 'Camry']);
});

test('DELETE /api/cars/{id} cannot delete the same car twice', function () {
    $car = Car::factory()->create();
    
    $this->delete("/api/cars/{$car->id}");
    $response = $this->delete("/api/cars/{$car->id}");
    
    $response->assertStatus(404);
});
