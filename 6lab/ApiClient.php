<?php
class ApiClient
{
    private string $apiUrl;
    private array $defaultHeaders = [];

    public function __construct(string $endUrl, string $login, string $pass)
    {
        $this->apiUrl = rtrim($endUrl, '/');
        $this->defaultHeaders[] = "Accept: application/json";
    }

    // Метод отправки HTTP-запросов.
    private function request(string $urlPath, string $httpMethod, array $body = []): array
    {
        $url = "{$this->apiUrl}/" . ltrim($urlPath, '/'); 
        $ch = curl_init($url); 

        // Базовые настройки cURL
        $config = [
            CURLOPT_RETURNTRANSFER => true, 
            CURLOPT_CUSTOMREQUEST => $httpMethod, 
            CURLOPT_SSL_VERIFYPEER => false, 
            CURLOPT_HTTPHEADER => $this->defaultHeaders,
        ];

        if ($body !== null) {
            $jsonBody = json_encode($body); 
            $config[CURLOPT_POSTFIELDS] = $jsonBody; 
        }

        curl_setopt_array($ch, $config);

        // Выполняем запрос
        $output = curl_exec($ch);

        $httpStatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        $failReason = curl_error($ch);
        curl_close($ch); 

        // Результаты
        return [
            'http_1' => $httpStatus,
            'response' => json_decode($output, true), 
            'error_message' => $failReason ?: null,
        ];
    }

    // Отправка GET-запроса
    public function get(string $path): array
    {
        return $this->request($path, 'GET');
    }

    // Отправка POST-запроса с телом
    public function post(string $path, array $payload): array
    {
        return $this->request($path, 'POST', $payload);
    }

    // Отправка PUT-запроса с телом
    public function put(string $path, array $payload): array
    {
        return $this->request($path, 'PUT', $payload);
    }

    // Отправка DELETE-запроса
    public function delete(string $path): array
    {
        return $this->request($path, 'DELETE');
    }
}