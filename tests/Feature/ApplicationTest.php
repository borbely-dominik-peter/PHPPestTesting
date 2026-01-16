<?php

test('homepage does not accept post requests', function () {
    $this->post('/')->assertStatus(405);
});
