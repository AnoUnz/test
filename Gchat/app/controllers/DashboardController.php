<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\DashboardStats;
use PDO;

class DashboardController extends Controller {
    private $model;
    private $app;

    public function __construct() {
        // Load config app & database
        $this->app = require __DIR__ . '/../../config/app.php';
        $dbConfig = require __DIR__ . '/../../config/database.php';

        // Koneksi PDO
        $dsn = "mysql:host={$dbConfig['host']};dbname={$dbConfig['name']};charset={$dbConfig['charset']}";
        $pdo = new PDO($dsn, $dbConfig['user'], $dbConfig['pass']);

        $this->model = new DashboardStats($pdo);
    }

    private function getCommonData($title) {
        $currentAction = $_GET['action'] ?? 'index';
        $avatarFile = $_SESSION['profile_image'] ?? null;
        $avatarUrl  = $avatarFile ? "uploads/profile_image/" . htmlspecialchars($avatarFile)
                                  : "assets/img/default.png";
        $username = $_SESSION['username'] ?? 'User';

        return [
            'title' => $title,
            'app' => $this->app,
            'currentAction' => $currentAction,
            'avatarUrl' => $avatarUrl,
            'username' => $username
        ];
    }

    public function index() {
        if (empty($_SESSION['user_id'])) {
            header("Location: /Gchat/public/index.php?page=auth");
            exit;
        }

        if ($_SESSION['role'] !== 'admin') {
            http_response_code(403);
            echo "<h1>Akses ditolak</h1><p>Hanya admin yang dapat mengakses Dashboard.</p>";
            exit;
        }

        $data = [
            'totalServers' => $this->model->getTotalServers(),
            'totalUsers' => $this->model->getTotalUsers(),
            'totalMessages' => $this->model->getTotalMessages(),
            'onlineUsers' => $this->model->getOnlineUsers(),
            'messagesPerDay' => $this->model->getMessagesPerDay(7),
            'usersGrowthPerMonth' => $this->model->getUsersGrowthPerMonth(6),
        ];

        $stats = [
            'total_servers' => $data['totalServers'],
            'total_users' => $data['totalUsers'],
            'total_messages' => $data['totalMessages'],
            'online_users' => $data['onlineUsers'],
        ];

        $chart = [
            'days' => array_column($data['messagesPerDay'], 'date'),
            'messages' => array_column($data['messagesPerDay'], 'total'),
            'months' => array_column($data['usersGrowthPerMonth'], 'month'),
            'users' => array_column($data['usersGrowthPerMonth'], 'total'),
        ];

        $common = $this->getCommonData('Server Dashboard');

        $this->view('dashboard/index', array_merge($common, [
            'stats' => $stats,
            'chart' => $chart
        ]), 'layouts/dashboard');
    }

    public function servers() {
        $servers = [
            ['id' => 1, 'name' => 'Server 1', 'status' => 'Online'],
            ['id' => 2, 'name' => 'Server 2', 'status' => 'Offline'],
        ];

        $common = $this->getCommonData('Server List');

        $this->view('dashboard/servers', array_merge($common, [
            'servers' => $servers
        ]), 'layouts/dashboard');
    }

    public function users() {
        $common = $this->getCommonData('User Management');

        $this->view('dashboard/users', $common, 'layouts/dashboard');
    }

    public function settings() {
        $common = $this->getCommonData('Dashboard Settings');

        $this->view('dashboard/settings', $common, 'layouts/dashboard');
    }
}
