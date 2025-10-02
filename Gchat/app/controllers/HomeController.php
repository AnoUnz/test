<?php
namespace App\Controllers;

use App\Core\Controller;

class HomeController extends Controller {

    

    public function index() {
        // Ambil status
        $status = $_GET['status'] ?? null;

        // Ambil data user dari session
        $user = null;
        if (isset($_SESSION['user_id'])) {
            $user = [
                'id' => $_SESSION['user_id'],
                'username' => $_SESSION['username'] ?? '',
                'profile_image' => $_SESSION['profile_image'] ?? null
            ];
        }

        $this->view('home/index', [
            'title' => 'Landing Page',
            'status' => $status,
            'user' => $user
        ]);
    }

    

    public function discover() {
        $user = null;
        if (isset($_SESSION['user_id'])) {
            $user = [
                'id' => $_SESSION['user_id'],
                'username' => $_SESSION['username'] ?? '',
                'profile_image' => $_SESSION['profile_image'] ?? null
            ];
        }

        $this->view('home/discover', [
            'title' => 'Discover',
            'user' => $user
        ]);
    }
}
