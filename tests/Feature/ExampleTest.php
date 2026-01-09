<?php

test('the application returns a successful response', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});

test('GET /api/cars exists', function () {
    $response = $this->get('/api/cars');

    $response->assertStatus(200);
});

/*test('GET /api/cars returns data', function () {
    $response = $this->get('/api/cars');

    $data = $response->dump();
    except()->not->toBeNull($data);
});*/
