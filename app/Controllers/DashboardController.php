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
    protected $basePath;

    // Prix par type de séance
    protected $sessionPrices = [];

    public function __construct()
    {
        $this->session = new SessionManager();
        $this->session->start();
        $this->basePath = '/Projets/KongB/public';
        $this->sessionPrices = SettingsService::get('session_prices', [
           'Portrait' => 150,
        'Mariage' => 2000,
        'Famille' => 300,
        'Grossesse' => 250,
        'Bébé' => 200,
        'Produit' => 180,
        'Autre' => 100
    ]);
    }

    public function index()
    {
        if (!$this->session->has('user')) {
            $this->session->set('error', 'Vous devez être connecté pour accéder au site.');
            header('Location: ' . $this->basePath . '/login');
            exit;
        }
        
        $user = User::find($this->session->get('user'));
        
        // Statistiques principales
        $today = date('Y-m-d');
        $monthStart = date('Y-m-01');
        $monthEnd = date('Y-m-t');
        
        $data = [
            'user' => $user,
            'totalCustomers' => Customer::count(),
            'totalSessions' => PhotoSession::count(),
            'todaySessions' => PhotoSession::whereDate('date', $today)->count(),
            'newCustomers' => Customer::whereBetween('created_at', [$monthStart, $monthEnd])->count(),
            'photosToProcess' => Photo::whereDoesntHave('session', function($q) {
                $q->where('status', PhotoSession::STATUS_PROCESSED);
            })->count(),
            'upcomingSessions' => PhotoSession::with('customer')
                ->where('date', '>=', $today)
                ->orderBy('date', 'asc')
                ->limit(5)
                ->get(),
            'recentPhotos' => Photo::with('session', 'customer')
                ->orderBy('created_at', 'desc')
                ->limit(6)
                ->get(),
            'monthlyRevenue' => $this->calculateMonthlyRevenue(),
            'sessionTypes' => $this->getSessionTypeStats(),
            'statusStats' => $this->getStatusStats(),
            'sessionPrices' => $this->sessionPrices
        ];

        $this->render('app', 'dashboard', $data);
    }

    protected function calculateMonthlyRevenue()
    {
        $monthStart = date('Y-m-01');
        $monthEnd = date('Y-m-t');
        
        $completedSessions = PhotoSession::where('status', PhotoSession::STATUS_COMPLETED)
            ->whereBetween('date', [$monthStart, $monthEnd])
            ->get();
        
        $revenue = 0;
        
        foreach ($completedSessions as $session) {
            $revenue += $this->sessionPrices[$session->type] ?? 0;
        }
        
        return $revenue;
    }

    protected function getSessionTypeStats()
    {
        return PhotoSession::selectRaw('type, count(*) as count')
            ->groupBy('type')
            ->get()
            ->pluck('count', 'type')
            ->toArray();
    }

    protected function getStatusStats()
    {
        return PhotoSession::selectRaw('status, count(*) as count')
            ->groupBy('status')
            ->get()
            ->pluck('count', 'status')
            ->toArray();
    }
}