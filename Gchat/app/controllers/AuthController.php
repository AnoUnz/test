<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\User;

class AuthController extends Controller {
    // login page
    public function login() {
        $this->view('auth/login', ['title' => 'Login']);
    }
    // register page
    public function register() {
        $this->view('auth/register', ['title' => 'Register']);
    }


    // login process
    public function auth() {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
    
        $user = (new User())->findByEmail($email);
    
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'] ?? 'user';
            $_SESSION['profile_image'] = $user['profile_image'] ?? '';

            if ($_SESSION['role'] === 'admin') {
                header("Location: /Gchat/public/index.php?page=dashboard");
            } else {
                header("Location: /Gchat/public/index.php?page=home");
            }
            exit;
        }

        $_SESSION['flash'] = 'Email atau password salah';
        header("Location: /Gchat/public/index.php?page=auth");
        exit;
    }

    // logout process
    public function logout() {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        // Unset all session variables
        $_SESSION = [];
        // Delete the session cookie
        if (ini_get('session.use_cookies')) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params['path'], $params['domain'],
                $params['secure'], $params['httponly']
            );
        }
        // Destroy the session
        session_destroy();
        // Optionally regenerate a fresh session id
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        session_regenerate_id(true);
        // Redirect to home with status flag for popup
        header("Location: /Gchat/public/index.php?page=home&status=logged_out");
        exit;
    }

    // register process
    public function store() {
        $username = $_POST['username'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        if (!empty($username) && !empty($email) && !empty($password)) {
            $userModel = new User();

            // check if email already exists
            if ($userModel->findByEmail($email)) {
                $_SESSION['flash'] = 'Email sudah terdaftar!';
                header("Location: /Gchat/public/index.php?page=register");
                exit;
            }

            // create 
            $userModel->create($username, $email, $password);

            // get user data
            $user = $userModel->findByEmail($email);

            // direct login user
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'] ?? 'user';
            $_SESSION['profile_image'] = $user['profile_image'] ?? '';

            // redirect
            if ($_SESSION['role'] === 'admin') {
                header("Location: /Gchat/public/index.php?page=dashboard");
            } else {
                header("Location: /Gchat/public/index.php?page=home");
            }
            exit;
        }

        $_SESSION['flash'] = 'Semua field harus diisi!';
        header("Location: /Gchat/public/index.php?page=register");
        exit;
    }
}
