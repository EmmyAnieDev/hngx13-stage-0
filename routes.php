<?php
$config = include __DIR__ . '/config.php';
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Route handling
switch ($uri) {
    case '/':
        echo json_encode([
            'status' => 'success',
            'message' => 'API is running...',
        ], JSON_PRETTY_PRINT);
        break;

    case '/me':
        echo json_encode([
            'status' => 'success',
            'user' => [
                'email' => $config['email'],
                'name'  => $config['name'],
                'stack' => $config['stack']
            ],
            'timestamp' => getCurrentUTCTime(),
            'fact' => getCatFact($config['url'])
        ], JSON_PRETTY_PRINT);
        break;

    default:
        http_response_code(404);
        echo json_encode([
            'error' => 'Endpoint not found. Use / or /me'
        ], JSON_PRETTY_PRINT);
        break;
}
