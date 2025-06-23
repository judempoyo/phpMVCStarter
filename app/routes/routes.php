<?php

use FastRoute\RouteCollector;
use App\Controllers\AuthController;
use App\Controllers\UserController;
use App\Controllers\CustomerController;
use App\Controllers\SettingsController;
use App\Controllers\DashboardController;
use App\Controllers\PhotoSessionController;

$basePath = '/Projets/KongB/public';

// Définir les routes publiques
$publicRoutes = [
  $basePath . '/',
  $basePath . '/login',
  $basePath . '/register',
  $basePath . '/forgot-password',
  $basePath . '/reset-password',
  $basePath . '/reset-password/{token}'
];

// Appliquer le middleware
$authMiddleware = new \App\Middleware\AuthMiddleware($sessionManager, $basePath);
$authMiddleware->handle($publicRoutes);

// Configuration des routes
$dispatcher = FastRoute\simpleDispatcher(function (RouteCollector $r) use ($basePath) {
  $r->addRoute('GET', $basePath . '/customer', [CustomerController::class, 'index']);
  $r->addRoute('GET', $basePath . '/customer/create', [CustomerController::class, 'create']);
  $r->addRoute('POST', $basePath . '/customer/store', [CustomerController::class, 'store']);
  $r->addRoute('POST', $basePath . '/customer/addForSession', [CustomerController::class, 'addForSession']);
  $r->addRoute('GET', $basePath . '/customer/export', [CustomerController::class, 'export']);
  $r->addRoute('GET', $basePath . '/customer/edit/{id:\d+}', [CustomerController::class, 'edit']);
  $r->addRoute('POST', $basePath . '/customer/update/{id:\d+}', [CustomerController::class, 'update']);
  $r->addRoute('POST', $basePath . '/customer/delete/{id:\d+}', [CustomerController::class, 'delete']);

  $r->addRoute('GET', $basePath . '/', [AuthController::class, 'showLoginForm']);
  $r->addRoute('GET', $basePath . '/login', [AuthController::class, 'showLoginForm']);
  $r->addRoute('POST', $basePath . '/login', [AuthController::class, 'login']);
  $r->addRoute('GET', $basePath . '/register', [AuthController::class, 'showRegisterForm']);
  $r->addRoute('POST', $basePath . '/register', [AuthController::class, 'register']);
  $r->addRoute('GET', $basePath . '/profile', [UserController::class, 'showProfile']);
  $r->addRoute('POST', $basePath . '/profile/update-info', [UserController::class, 'updateProfileInfo']);
  $r->addRoute('POST', $basePath . '/profile/update-password', [UserController::class, 'updateProfilePassword']);
  $r->addRoute('POST', $basePath . '/profile/delete', [UserController::class, 'deleteProfile']);
  $r->addRoute('GET', $basePath . '/logout', [AuthController::class, 'logout']);
  $r->addRoute('GET', $basePath . '/forgot-password', [AuthController::class, 'showForgotPasswordForm']);
  $r->addRoute('POST', $basePath . '/forgot-password', [AuthController::class, 'sendResetLinkEmail']);
  $r->addRoute('GET', $basePath . '/reset-password/{token}', [AuthController::class, 'showResetForm']);
  $r->addRoute('POST', $basePath . '/reset-password', [AuthController::class, 'resetPassword']);

  $r->addRoute('GET', $basePath . '/dashboard', [DashboardController::class, 'index']);
  
  $r->addRoute('GET', $basePath . '/photo-session', [PhotoSessionController::class, 'index']);
  $r->addRoute('GET', $basePath . '/photo-session/create', [PhotoSessionController::class, 'create']);
  $r->addRoute('POST', $basePath . '/photo-session/store', [PhotoSessionController::class, 'store']);
  $r->addRoute('GET', $basePath . '/photo-session/{id:\d+}', [PhotoSessionController::class, 'show']);
  $r->addRoute('GET', $basePath . '/photo-session/edit/{id:\d+}', [PhotoSessionController::class, 'edit']);
  $r->addRoute('POST', $basePath . '/photo-session/update/{id:\d+}', [PhotoSessionController::class, 'update']);
  $r->addRoute('POST', $basePath . '/photo-session/delete/{id:\d+}', [PhotoSessionController::class, 'delete']);
  $r->addRoute('GET', $basePath . '/photo-session/{id:\d+}/download-links', [PhotoSessionController::class, 'generateDownloadLinks']);
  $r->addRoute('POST', $basePath . '/photo-session/{id:\d+}/photos', [PhotoSessionController::class, 'storePhotos']);
  $r->addRoute('POST', $basePath . '/photo-session/{id:\d+}/photos/delete/{photoId:\d+}', [PhotoSessionController::class, 'deletePhoto']);
  $r->addRoute('POST', $basePath . '/photo-session/{id:\d+}/status', [PhotoSessionController::class, 'updateStatus']);

  $r->addRoute('GET', $basePath . '/settings', [SettingsController::class, 'index']);
  $r->addRoute('POST', $basePath . '/settings', [SettingsController::class, 'update']);
});