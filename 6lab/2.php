<?php
// 1. GET запрос с кастомными HTTP-заголовками
$ch = curl_init('https://jsonplaceholder.typicode.com/posts/1');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Custom-Header: MyValue']);
$response = curl_exec($ch);
curl_close($ch);
echo "GET с кастомным заголовкам:\n" . $response . "\n\n";

// 2. Отправка JSON-данных в теле запроса (POST)
$ch = curl_init('https://jsonplaceholder.typicode.com/posts');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'Accept: application/json'
]);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
    'title' => 'Новый пост',
    'body' => 'Содержание поста',
    'userId' => 1
]));
$response = curl_exec($ch);
curl_close($ch);
echo "POST с JSON-данными:\n" . $response . "\n\n";

// 3. GET запрос с параметрами URL
$queryParams = http_build_query([
    'postId' => 1,
    '_limit' => 3
]);
$url = 'https://jsonplaceholder.typicode.com/comments?' . $queryParams;
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
echo "GET с параметрами URL:\n" . $response . "\n";

// Дополнительные примеры из первой части (для полноты)
// PUT запрос
$ch = curl_init('https://jsonplaceholder.typicode.com/posts/1');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
    'id' => 1,
    'title' => 'Обновленный пост',
    'body' => 'Новое содержание',
    'userId' => 1
]));
$response = curl_exec($ch);
curl_close($ch);
echo "\nPUT запрос:\n" . $response . "\n";

// DELETE запрос
$ch = curl_init('https://jsonplaceholder.typicode.com/posts/1');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
$response = curl_exec($ch);
curl_close($ch);
echo "\nDELETE запрос:\n" . $response . "\n";
?>