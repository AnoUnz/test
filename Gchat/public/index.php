<?php
declare(strict_types=1);
session_start();

spl_autoload_register(function ($class) {
    $prefix = 'App\\';   // harus pakai huruf besar A
    $base_dir = __DIR__ . '/../app/';
    $len = strlen($prefix);

    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});


$cfgApp = require __DIR__ . '/../config/app.php';
$cfgDb  = require __DIR__ . '/../config/database.php';

use App\Controllers\HomeController;
use App\Controllers\AuthController;
use App\Controllers\DashboardController;
use App\Controllers\ProfileController;

$page   = $_GET['page'] ?? 'home';
$action = $_GET['action'] ?? null;

switch ($page) {
    case 'home':
        (new HomeController())->index();
        break;

    case 'auth':
        $auth = new AuthController();
        if ($action === 'auth') {
            $auth->auth();
        } else {
            $auth->login();
        }
        break;
    
    case 'register':
        $auth = new AuthController();
        if ($action === 'store') {
            $auth->store();
        } else {
            $auth->register();
        }
        break;


    case 'logout':
        (new AuthController())->logout();
        break;

    case 'dashboard':
        (new DashboardController())->index();
        break;

            case 'discover':
        (new HomeController())->discover();
        break;

    case 'profile':
        $profile = new ProfileController();
        if ($action && method_exists($profile, $action)) {
            $profile->$action();
        } else {
            $profile->index();
        }
        break;
    
        default:
        http_response_code(404);
        echo "404";
        
}
