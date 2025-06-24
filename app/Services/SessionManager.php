<?php
namespace App\Services;

class SessionManager
{
    public function start()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public function get($key, $default = null)
    {
        return $_SESSION[$key] ?? $default;
    }

    public function has($key)
    {
        return isset($_SESSION[$key]);
    }

    public function remove($key)
{
    if (is_array($key)) {
        $_SESSION = array_diff_key($_SESSION, array_flip($key));
    } else {
        unset($_SESSION[$key]);
    }
}
    public function destroy()
    {
        session_destroy();
    }
}