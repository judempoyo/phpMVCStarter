<?php
namespace App\Middleware;

use App\Services\SessionManager;

class AuthMiddleware
{
    protected $session;

    public function __construct(SessionManager $session)
    {
        $this->session = $session;
    }

    public function handle()
    {
        if (!$this->session->has('user')) {
            $this->session->set('error', 'Vous devez être connecté pour accéder au site.');
            $this->session->set('redirect_to', $_SERVER['REQUEST_URI'] ?? '/');
            redirect('/login');
        }
    }
}