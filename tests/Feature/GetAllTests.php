<?php

test('GET /api/cars exists', function () {
    $response = $this->get('/api/cars');

    $response->assertStatus(200);
});
