<?php
namespace App\Middleware;

use App\Services\SessionManager;

class RoleMiddleware
{
    protected $session;
    protected $basePath ;

    
    public function __construct(SessionManager $session)
    {
        $this->session = $session;
        $this->basePath = '/Projets/KongB/public';

    }

    public function handle($requiredRole)
    {
        if (!$this->session->has('user')) {
            header('Location: '.$this->basePath.'/login');
            exit();
        }

        $userRole = $this->session->get('user')['role'] ?? null;
        
        if ($userRole !== $requiredRole) {
            header('Location: '.$this->basePath.'/unauthorized');
            exit();
        }
    }
}