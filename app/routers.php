<?php
/**
 * Routers registration
 */

// TEST ROUTE
$app->get('/hello/{name}', function ($request, $response, $args) {
    $response->write("Hello, " . $args['name']);
    return $response;
});