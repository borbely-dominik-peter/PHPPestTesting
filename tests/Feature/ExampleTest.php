<?php

test('the application returns a successful response', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});

test('GET /api/cars exists', function () {
    $response = $this->get('/api/cars');

    $response->assertStatus(200);
});

test('GET /api/cars returns data', function () {
    $response = $this->get('/api/cars');
    $data = $response->dump()->json();
    //$DataString = implode("-",$data);
    print_r($data);
    expect($data)->toBeArray();
});

test('GET /api/cars returns 404 with no data', function () {

});
