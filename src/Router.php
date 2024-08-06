<?php

declare(strict_types=1);

class Router
{
    protected object|null $updates;

    public function __construct()
    {
        $this->updates = json_decode(file_get_contents('php://input'));
    }

    public function isApiCall()
    {
        $uri  = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $path = explode('/', $uri);

        return array_search('api', $path);
    }

    public function getResourceId(): false|int
    {
        $uri        = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $path       = explode('/', $uri);
        $resourceId = $path[count($path) - 1];

        return is_numeric($resourceId) ? (int) $resourceId : false;
    }

    public function isTelegramUpdate(): bool
    {
        if (isset($this->updates->update_id)) {
            return true;
        }

        return false;
    }

    public function sendResponse($data): void
    {
        header("Content-Type: application/json; charset=UTF-8");

        echo json_encode($data);
    }

    public function getUpdates()
    {
        return $this->updates;
    }

    public static function get($path, $callback): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) === $path) {
            $callback();
            exit();
        }
    }

    public static function post($path, $callback): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_SERVER['REQUEST_URI'] === $path) {
            $callback();
            exit();
        }
    }
    public static function errorResponse(int $code, $message='Error bad request'): void
    {
        http_response_code($code);
        if($code == 404){
            require 'view/pages/404.php';
        }
        echo json_encode(['ok'=>false, 'code'=>$code, 'message'=>$message]);
        exit();
    }
}
