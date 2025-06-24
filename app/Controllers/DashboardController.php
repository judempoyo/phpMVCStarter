<?php
namespace App\Controllers;

use App\Services\SessionManager;
use App\Models\User;
use App\Models\PhotoSession;
use App\Models\Customer;
use App\Models\Photo;
use App\Core\ViewRenderer;
use App\Services\SettingsService;

class DashboardController
{
    use ViewRenderer;
    protected $session;

    public function __construct()
    {
        $this->session = new SessionManager();
        $this->session->start();


    }

    public function index()
    {
        if (!$this->session->has('user')) {
            $this->session->set('error', 'Vous devez être connecté pour accéder au site.');
            redirect('/login');
        }

        $user = User::find($this->session->get('user'));

        $this->render('app', 'dashboard');
    }



}