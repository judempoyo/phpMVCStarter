<?php
namespace App\Middleware;

use App\Services\SessionManager;

class AuthMiddleware
{
    protected $session;
    protected $basePath;

    public function __construct(SessionManager $session, string $basePath)
    {
        $this->session = $session;
        $this->basePath = $basePath;
    }

    public function handle(array $publicRoutes = [])
    {
        $currentRoute = $_SERVER['REQUEST_URI'] ?? '/';
        
        // Si la route n'est pas publique et l'utilisateur n'est pas connecté
        if (!in_array($currentRoute, $publicRoutes)) {
            if (!$this->session->has('user')) {
              $this->session->set('error', 'Vous devez etre connecter pour acceder au site.');
                $this->session->set('redirect_to', $currentRoute);
                header('Location: ' . $this->basePath . '/login');
                exit();
            }
        }
    }
}