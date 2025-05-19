<?php

require_once 'ApiClient.php';

// Создаём клиент API
$api = new ApiClient('https://jsonplaceholder.typicode.com', 'demo', 'demo');

//ВЫполнение GET-запроса
echo "GET: Получение списка заголовков постов\n";
$getResult = $api->GET('/posts');

if ($getResult['http_1'] === 200) {
    foreach (array_slice($getResult['response'],0) as $post) {
        echo "- {$post['title']}\n";
    }
} else {
    echo "Ошибка при GET-запросе: {$getResult['http_1']}\n";
}

//Выполнение POST-запроса
echo "\nPOST: Создание нового поста\n";
$newPost = [
    'title' => '12345',
    'body' => 'POST. 12345',
    'userId' => 1
];

$postResult = $api->POST('/posts', $newPost);

if ($postResult['http_'] === 201) {
    echo "Пост успешно создан с ID: " . $postResult['response']['id'] . "\n";
} else {
    echo "Ошибка при POST-запросе: {$postResult['http_1']}\n";
}

//Выполнение DELETE-запроса
echo "\nDELETE: Удаление поста (id = 1)\n";
$deleteResult = $api->DELETE('/posts/1');

if (in_array($deleteResult['http_1'], [200, 204])) {
    echo "Пост успешно удалён (id = 1).\n";
} else {
    echo "Ошибка при DELETE-запросе: {$deleteResult['http_1']}\n";
}