<?php

require_once dirname(__DIR__) . '/../vendor/autoload.php';

// Configuration de base
define('BASE_PATH', realpath(__DIR__ . '/..'));
define('PUBLIC_PATH', BASE_PATH . '/public/');
define('PUBLIC_URL', 'http://jump.localhost/Projets/KongB/public/');

use Illuminate\Pagination\Paginator;
use Illuminate\Database\Capsule\Manager as Capsule;

// Initialiser la pagination
Paginator::currentPathResolver(function () {
  return isset($_SERVER['REQUEST_URI']) ? strtok($_SERVER['REQUEST_URI'], '?') : '/';
});

Paginator::currentPageResolver(function ($pageName = 'page') {
  return isset($_GET[$pageName]) ? $_GET[$pageName] : 1;
});

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../..');
$dotenv->load();

// Initialisation de la session
$sessionManager = new \App\Services\SessionManager();
$sessionManager->start();

// Configuration de la base de données
$dbHost = $_ENV['DB_HOST'];
$dbName = $_ENV['DB_DATABASE'];
$dbUser = $_ENV['DB_USERNAME'];
$dbPassword = $_ENV['DB_PASSWORD'];

$capsule = new Capsule;
$capsule->addConnection([
  'driver' => 'mysql',
  'host' => $dbHost,
  'database' => $dbName,
  'username' => $dbUser,
  'password' => $dbPassword,
  'charset' => 'utf8',
  'collation' => 'utf8_unicode_ci',
  'prefix' => '',
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();

// Fonction helper pour les vues
function view($path, $data = [])
{
  extract($data);
  require dirname(__DIR__) . "/Views/$path.php";
}