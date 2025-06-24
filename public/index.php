<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/../app/config/bootstrap.php';
require_once __DIR__ . '/../app/helpers/functions.php';
require_once __DIR__ . '/../app/routes/routes.php';


use FastRoute\Dispatcher;

$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

switch ($routeInfo[0]) {
    case Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        
        $publicRoutes = [
            '/',
            '/login',
            '/register',
            '/forgot-password',
            '/reset-password',
            '/reset-password/{token}'
        ];
        
        $currentRoute = $uri;
        if (!in_array($currentRoute, $publicRoutes)) {
            $authMiddleware = new \App\Middleware\AuthMiddleware($sessionManager);
            $authMiddleware->handle();
        }
        
        $controller = new $handler[0]();
        $method = $handler[1];
        $controller->$method($vars);
        break;
        
    case Dispatcher::NOT_FOUND:
        http_response_code(404);
        view('errors/404');
        break;
        
    case Dispatcher::METHOD_NOT_ALLOWED:
        http_response_code(405);
        view('errors/405');
        break;
}