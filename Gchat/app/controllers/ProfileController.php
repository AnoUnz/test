<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\User;


class ProfileController extends Controller {
    public function index() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?page=auth");
            exit;
        }
    
        $userModel = new User();
        $user = $userModel->findById($_SESSION['user_id']);
    
        // ambil tab
        $tab = $_GET['tab'] ?? 'profile'; 
        $view = 'profile/accounts/index'; // default halaman Profile
            
        // tab accounts
        if ($tab === 'my_accounts') {
            $view = 'profile/accounts/my_accounts';
        } elseif ($tab === 'profile') {
            $view = 'profile/accounts/index';
        } elseif ($tab === 'password') {
            $view = 'profile/accounts/password';
        } elseif ($tab === 'privacy') {
            $view = 'profile/accounts/privacy';

        // tab preferences
        } elseif ($tab === 'appearance') {
            $view = 'profile/profile_preferences/appearance';
        } elseif ($tab === 'language') {
            $view = 'profile/profile_preferences/language';
        } elseif ($tab === 'accessibility') {
            $view = 'profile/profile_preferences/accessibility';

        // tab support
        } elseif ($tab === 'help') {
            $view = 'profile/suport/help';
        } elseif ($tab === 'support') {
            $view = 'profile/suport/support';
        } elseif ($tab === 'report') {
            $view = 'profile/suport/report';

        // tab about
        } elseif ($tab === 'about') {
            $view = 'profile/about/about';
        } elseif ($tab === 'info') {
            $view = 'profile/about/info';

        //fall back
        } else {
            $view = 'profile/my_accounts'; 
        }
    
        $this->view($view, [
            'user'  => $user,
            'title' => 'Profile - ' . ucfirst(str_replace('_', ' ', $tab))
        ], 'layouts/profile');
    }
    
    //banner profile
    public function updateBanner() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?page=auth");
            exit;
        }

        if (isset($_FILES['banner']) && $_FILES['banner']['error'] === UPLOAD_ERR_OK) {
            $fileTmp  = $_FILES['banner']['tmp_name'];
            $fileName = uniqid() . "-" . basename($_FILES['banner']['name']);
            $targetDir = __DIR__ . "/../../public/uploads/banner/";
            $targetFile = $targetDir . $fileName;

            if (!is_dir($targetDir)) {
                mkdir($targetDir, 0777, true);
            }

            if (move_uploaded_file($fileTmp, $targetFile)) {
                $userModel = new User();
                $userModel->updateBanner($_SESSION['user_id'], $fileName);
            }
        }

        header("Location: index.php?page=profile");
        exit;
    }

    //avatar profile
    public function updateAvatar() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?page=auth");
            exit;
        }

        if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
            $fileTmp  = $_FILES['avatar']['tmp_name'];
            $fileName = uniqid() . '_' . basename($_FILES['avatar']['name']);
            $targetDir  = __DIR__ . '/../../public/uploads/profile_image/';
            $targetFile = $targetDir . $fileName;

            if (!is_dir($targetDir)) {
                mkdir($targetDir, 0777, true);
            }

            if (move_uploaded_file($fileTmp, $targetFile)) {
                $userModel = new User();
                $userModel->updateAvatar($_SESSION['user_id'], $fileName);
                $_SESSION['profile_image'] = $fileName;
            }
        }

        header("Location: index.php?page=profile");
        exit;
    }

    //info profile
    public function updateInfo() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?page=auth");
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = array_key_exists('username', $_POST) ? trim((string)$_POST['username']) : null;
            if ($username === '') { $username = null; }

            $about = array_key_exists('about_me', $_POST) ? trim((string)$_POST['about_me']) : null;

            $userModel = new User();
            $userModel->updateInfo($_SESSION['user_id'], $username, $about);

            if ($username !== null) {
                $_SESSION['username'] = $username;
            }
            if ($about !== null) {
                $_SESSION['about_me'] = $about;
            }
        }

        header("Location: index.php?page=profile");
        exit;
    }

    //status profile
    public function updateStatus() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?page=auth");
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $status = $_POST['status'] ?? 'offline';
            $allowed = ['online','offline','dnd','invisible'];

            if (in_array($status, $allowed)) {
                $userModel = new User();
                $userModel->updateStatus($_SESSION['user_id'], $status);
            }
        }

        header("Location: index.php?page=profile");
        exit;
    }

    //username profile
    public function updateUsername() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?page=auth");
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header("Location: index.php?page=profile&tab=my_accounts");
            exit;
        }

        $username = trim((string)($_POST['username'] ?? ''));
        if ($username === '') {
            $_SESSION['flash'] = 'Username cannot be empty';
            header("Location: index.php?page=profile&tab=my_accounts");
            exit;
        }

        $userModel = new User();
        $userModel->updateUsername($_SESSION['user_id'], $username);
        $_SESSION['username'] = $username;

        $_SESSION['flash'] = 'username_updated';
        header("Location: index.php?page=profile&tab=my_accounts&status=username_updated");
        exit;
    }

    //email profile
    public function updateEmail() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?page=auth");
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header("Location: index.php?page=profile&tab=my_accounts");
            exit;
        }

        $email = trim((string)($_POST['email'] ?? ''));
        if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['flash'] = 'Invalid email address';
            header("Location: index.php?page=profile&tab=my_accounts");
            exit;
        }

        $userModel = new User();
        if ($userModel->emailExists($email, (int)$_SESSION['user_id'])) {
            $_SESSION['flash'] = 'Email already in use';
            header("Location: index.php?page=profile&tab=my_accounts");
            exit;
        }

        $userModel->updateEmail((int)$_SESSION['user_id'], $email);
        $_SESSION['flash'] = 'email_updated';
        header("Location: index.php?page=profile&tab=my_accounts&status=email_updated");
        exit;
    }

    //password profile
    public function changePassword() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?page=auth");
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header("Location: index.php?page=profile&tab=password");
            exit;
        }

        $current = (string)($_POST['current_password'] ?? '');
        $new     = (string)($_POST['new_password'] ?? '');
        $confirm = (string)($_POST['confirm_password'] ?? '');

        if ($new === '' || $confirm === '' || $new !== $confirm) {
            $_SESSION['flash'] = 'Password confirmation does not match';
            header("Location: index.php?page=profile&tab=password");
            exit;
        }

        $userModel = new User();
        $user = $userModel->findById((int)$_SESSION['user_id']);
        if (!$user || !password_verify($current, $user['password'])) {
            $_SESSION['flash'] = 'Current password is incorrect';
            header("Location: index.php?page=profile&tab=password");
            exit;
        }

        $userModel->updatePassword((int)$_SESSION['user_id'], $new);
        $_SESSION['flash'] = 'password_updated';
        header("Location: index.php?page=profile&tab=password&status=password_updated");
        exit;
    }

    //delete account
    public function deleteAccount() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?page=auth");
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header("Location: index.php?page=profile&tab=my_accounts");
            exit;
        }

        $userModel = new User();
        $user = $userModel->findById((int)$_SESSION['user_id']);
        if (!$user) {
            $_SESSION['flash'] = 'User not found';
            header("Location: index.php?page=profile&tab=my_accounts");
            exit;
        }

        $phrase = (string)($_POST['phrase'] ?? '');
        $expected = 'delete "' . $user['username'] . '"';
        if (trim(strtolower($phrase)) !== strtolower($expected)) {
            $_SESSION['flash'] = 'Confirmation phrase does not match. Type: ' . $expected;
            header("Location: index.php?page=profile&tab=my_accounts");
            exit;
        }

        $password = (string)($_POST['password'] ?? '');
        if (!password_verify($password, $user['password'])) {
            $_SESSION['flash'] = 'Password is incorrect';
            header("Location: index.php?page=profile&tab=my_accounts");
            exit;
        }

        //delete and logout
        $userModel->deleteById((int)$_SESSION['user_id']);
        session_destroy();
        header("Location: index.php?page=home&status=account_deleted");
        exit;
    }
}