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