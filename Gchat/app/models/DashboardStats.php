<?php
namespace App\Models;

use PDO;

class DashboardStats
{
    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getTotalServers()
    {
        $stmt = $this->db->query("SELECT COUNT(*) FROM servers");
        return (int) $stmt->fetchColumn();
    }

    public function getTotalUsers()
    {
        $stmt = $this->db->query("SELECT COUNT(*) FROM users");
        return (int) $stmt->fetchColumn();
    }

    public function getTotalMessages()
    {
        $stmt = $this->db->query("SELECT COUNT(*) FROM messages");
        return (int) $stmt->fetchColumn();
    }

    public function getOnlineUsers()
    {
        // Asumsikan status online disimpan di tabel users, kolom 'status' = 'online'
        $stmt = $this->db->query("SELECT COUNT(*) FROM users WHERE status = 'online'");
        return (int) $stmt->fetchColumn();
    }

    public function getMessagesPerDay($days)
    {
        $stmt = $this->db->prepare("
            SELECT DATE(created_at) as date, COUNT(*) as total
            FROM messages
            WHERE created_at >= DATE_SUB(CURDATE(), INTERVAL :days DAY)
            GROUP BY DATE(created_at)
            ORDER BY date ASC
        ");
        $stmt->execute(['days' => $days-1]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUsersGrowthPerMonth($months)
    {
        $stmt = $this->db->prepare("
            SELECT DATE_FORMAT(created_at, '%Y-%m') as month, COUNT(*) as total
            FROM users
            WHERE created_at >= DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL :months MONTH), '%Y-%m-01')
            GROUP BY month
            ORDER BY month ASC
        ");
        $stmt->execute(['months' => $months-1]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
