<?php
namespace App\Models;

use App\Core\Model;

class Server extends Model {
    public function getStats(): array {
        $db = $this->db();
        $totalServers  = (int)$db->query("SELECT COUNT(*) FROM servers")->fetchColumn();
        $totalMembers  = (int)$db->query("SELECT COUNT(*) FROM server_members")->fetchColumn();
        $onlineServers = (int)$db->query("SELECT COUNT(*) FROM servers WHERE status='online'")->fetchColumn();
        $avgUptime     = $db->query("SELECT AVG(uptime_30d) FROM servers")->fetchColumn();
        return [
            'totalServers'  => $totalServers,
            'totalMembers'  => $totalMembers,
            'onlineServers' => $onlineServers,
            'avgUptime'     => $avgUptime ? round((float)$avgUptime, 1) : 0
        ];
    }

    public function listWithStats(string $q = ''): array {
        $db = $this->db();
        $sql = "SELECT s.*,
                       u.username AS owner_name,
                       (SELECT COUNT(*) FROM server_members sm WHERE sm.server_id = s.id) AS members
                FROM servers s
                LEFT JOIN users u ON u.id = s.owner_id
                WHERE (:q = '' OR s.name LIKE :like OR s.title LIKE :like)
                ORDER BY s.created_at DESC";
        $stmt = $db->prepare($sql);
        $like = "%$q%";
        $stmt->bindValue(':q', $q);
        $stmt->bindValue(':like', $like);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
