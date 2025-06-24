<?php

use FastRoute\RouteCollector;
use App\Controllers\AuthController;
use App\Controllers\UserController;
use App\Controllers\DashboardController;


$dispatcher = FastRoute\simpleDispatcher(function (RouteCollector $r) {
    $r->addRoute('GET', '/', [AuthController::class, 'showLoginForm']);
    $r->addRoute('GET', '/login', [AuthController::class, 'showLoginForm']);
    $r->addRoute('POST', '/login', [AuthController::class, 'login']);
    $r->addRoute('GET', '/register', [AuthController::class, 'showRegisterForm']);
    $r->addRoute('POST', '/register', [AuthController::class, 'register']);
    $r->addRoute('GET', '/forgot-password', [AuthController::class, 'showForgotPasswordForm']);
    $r->addRoute('POST', '/forgot-password', [AuthController::class, 'sendResetLinkEmail']);
    $r->addRoute('GET', '/reset-password/{token}', [AuthController::class, 'showResetForm']);
    $r->addRoute('POST', '/reset-password', [AuthController::class, 'resetPassword']);

    $r->addRoute('GET', '/profile', [UserController::class, 'showProfile']);
    $r->addRoute('POST', '/profile/update-info', [UserController::class, 'updateProfileInfo']);
    $r->addRoute('POST', '/profile/update-password', [UserController::class, 'updateProfilePassword']);
    $r->addRoute('POST', '/profile/delete', [UserController::class, 'deleteProfile']);
    $r->addRoute('GET', '/logout', [AuthController::class, 'logout']);
    $r->addRoute('GET', '/dashboard', [DashboardController::class, 'index']);
});