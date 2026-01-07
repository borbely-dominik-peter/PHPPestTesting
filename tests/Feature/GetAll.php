<?php

test('example', function () {
    $response = $this->get('/cars');

    $response->assertStatus(200);
});
