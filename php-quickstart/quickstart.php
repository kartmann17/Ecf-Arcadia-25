<?php


use MongoDB\Client;

$uri = getenv('MONGODB_URI') ?: throw new RuntimeException(
    'mongodb+srv://lionelblanchet:nrD6GzL4ljrv8g1S@cluster0.j1ymr.mongodb.net/?retryWrites=true&w=majority&appName=Cluster0'
);
$client = new MongoDB\Client($uri);
$collection = $client->sample_mflix->horaires;

$filter = ['title' => 'The Shawshank Redemption'];
$result = $collection->findOne($filter);

if ($result) {
    echo json_encode($result, JSON_PRETTY_PRINT);
} else {
    echo 'Document not found';
}
