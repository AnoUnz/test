<?php
namespace App\Models;

use App\Core\Model;

class User extends Model {
    // Find a user by email
    public function findByEmail(string $email) {
        $stmt = $this->db()->prepare("SELECT * FROM users WHERE email = ? LIMIT 1");
        $stmt->execute([$email]);
        return $stmt->fetch();
    }

    // Create a new user
    public function create(string $username, string $email, string $password, string $role = 'user') {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        // created_at will be set explicitly to NOW() to ensure it is stored
        $stmt = $this->db()->prepare("INSERT INTO users (username, email, password, role, created_at) VALUES (?, ?, ?, ?, NOW())");
        return $stmt->execute([$username, $email, $hashedPassword, $role]);
    }

    // Find a user by id
    public function findById(int $id) {
        $stmt = $this->db()->prepare("SELECT * FROM users WHERE id = ? LIMIT 1");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    // Update banner profile
    public function updateBanner(int $id, string $bannerFile) {
        $stmt = $this->db()->prepare("UPDATE users SET banner = ? WHERE id = ?");
        return $stmt->execute([$bannerFile, $id]);
    }

    // Update avatar profile
    public function updateAvatar(int $id, string $avatarFile) {
        $stmt = $this->db()->prepare("UPDATE users SET profile_image = ? WHERE id = ?");
        return $stmt->execute([$avatarFile, $id]);
    }

    // Update info profile
    public function updateInfo(int $id, ?string $username = null, ?string $about = null) {
        $setClauses = [];
        $params = [];

        if ($username !== null && $username !== '') {
            $setClauses[] = 'username = ?';
            $params[] = $username;
        }
        // about_me can be set to empty string to clear
        if ($about !== null) {
            $setClauses[] = 'about_me = ?';
            $params[] = $about;
        }

        if (empty($setClauses)) {
            return true; // nothing to update
        }

        $sql = 'UPDATE users SET ' . implode(', ', $setClauses) . ' WHERE id = ?';
        $params[] = $id;
        $stmt = $this->db()->prepare($sql);
        return $stmt->execute($params);
    }

    // Update status user (online, offline, dnd, invisible)
    public function updateStatus(int $id, string $status) {
        $stmt = $this->db()->prepare("UPDATE users SET status = ? WHERE id = ?");
        return $stmt->execute([$status, $id]);
    }

    // Check if email already exists (optionally exclude a specific user id)
    public function emailExists(string $email, ?int $excludeUserId = null) {
        if ($excludeUserId !== null) {
            $stmt = $this->db()->prepare("SELECT 1 FROM users WHERE email = ? AND id <> ? LIMIT 1");
            $stmt->execute([$email, $excludeUserId]);
        } else {
            $stmt = $this->db()->prepare("SELECT 1 FROM users WHERE email = ? LIMIT 1");
            $stmt->execute([$email]);
        }
        return (bool) $stmt->fetchColumn();
    }

    // Update only username
    public function updateUsername(int $id, string $username) {
        $stmt = $this->db()->prepare("UPDATE users SET username = ? WHERE id = ?");
        return $stmt->execute([$username, $id]);
    }

    // Update only email (assume uniqueness is validated by caller)
    public function updateEmail(int $id, string $email) {
        $stmt = $this->db()->prepare("UPDATE users SET email = ? WHERE id = ?");
        return $stmt->execute([$email, $id]);
    }

    // Update password (hash inside)
    public function updatePassword(int $id, string $newPlainPassword) {
        $hashed = password_hash($newPlainPassword, PASSWORD_BCRYPT);
        $stmt = $this->db()->prepare("UPDATE users SET password = ? WHERE id = ?");
        return $stmt->execute([$hashed, $id]);
    }

    // Permanently delete a user by id
    public function deleteById(int $id) {
        $stmt = $this->db()->prepare("DELETE FROM users WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
