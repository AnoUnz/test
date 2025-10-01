<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Server;

class DashboardController extends Controller {
    public function index() {
        // Cek login
        if (empty($_SESSION['user_id'])) {
            header("Location: /Gchat/public/index.php?page=auth");
            exit;
        }

        // Cek role
        if ($_SESSION['role'] !== 'admin') {
            http_response_code(403);
            echo "<h1>Akses ditolak</h1><p>Hanya admin yang dapat mengakses Dashboard.</p>";
            exit;
        }

        $q = $_GET['q'] ?? '';
        $server  = new Server();
        $stats   = $server->getStats();
        $servers = $server->listWithStats($q);

        // Panggil dengan layout dashboard
        $this->view('dashboard/index', [
            'title'   => 'Server Dashboard',
            'stats'   => $stats,
            'servers' => $servers,
            'q'       => $q
        ], 'layouts/dashboard');
    }
}
