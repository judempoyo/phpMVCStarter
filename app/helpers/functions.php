<?php

function url($path = '')
{
    return PUBLIC_URL . ltrim($path, '/');
}

function asset($path)
{
    return url('assets/' . ltrim($path, '/'));
}

function redirect($path)
{
    header('Location: ' . url($path));
    exit;
}

function view($path, $data = [])
{
    extract($data);
    require dirname(__DIR__) . "/Views/$path.php";
}

if (!function_exists('env')) {

    function env(string $key, $default = null)
    {
        $value = $_ENV[$key] ?? null;

        if ($value === null) {
            $value = getenv($key);
        }

        if ($value === 'true')
            return true;
        if ($value === 'false')
            return false;

        if ($value === 'null')
            return null;

        return $value !== null ? $value : $default;
    }
}