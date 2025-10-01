<?php
$app = require __DIR__ . '/../../../config/app.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? $title . ' | ' . $app['app_name'] : $app['app_name'] ?></title>
    <link rel="stylesheet" href="<?= $app['base_url'] ?>/public/css/style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
        
        * {
            font-family: 'Inter', sans-serif;
        }
        
        body {
            background: #f8fafc;
            min-height: 100vh;
        }
        
        .glass {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(139, 92, 246, 0.1);
        }
        
        .stat-card {
            background: white;
            border: 1px solid rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            border-color: rgba(0, 0, 0, 0.2);
        }
        
        .server-card {
            background: white;
            transition: all 0.3s ease;
            border: 1px solid rgba(0, 0, 0, 0.1);
        }
        
        .server-card:hover {
            transform: translateY(-8px);
            border-color: rgba(0, 0, 0, 0.2);
        }
        
        .gradient-btn {
            background: #1f2937;
            color: white;
            transition: all 0.3s ease;
        }
        
        .gradient-btn:hover {
            transform: scale(1.05);
            background: #374151;
        }
        
        .badge-online {
            background: #10b981;
            color: white;
        }
        
        .badge-offline {
            background: #ef4444;
            color: white;
        }
        
        .sidebar {
            background: white;
            border-right: 1px solid rgba(139, 92, 246, 0.1);
        }
        
        .nav-item {
            transition: all 0.2s ease;
            border-radius: 12px;
            margin: 4px 0;
        }
        
        .nav-item:hover {
            background: linear-gradient(135deg, rgb(139 92 246), rgb(6 182 212));
            color: white;
            transform: translateX(5px);
        }
        
        .nav-item.active {
            background: linear-gradient(135deg, rgb(139 92 246), rgb(6 182 212));
            color: white;
        }
        
        .search-input {
            transition: all 0.3s ease;
        }
        
        .search-input:focus {
            transform: scale(1.02);
            border-color: #374151;
        }
        
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .animate-slide-in {
            animation: slideIn 0.5s ease forwards;
        }
        
        .icon-gradient {
            background: linear-gradient(135deg, rgb(139 92 246), rgb(6 182 212));
        }
        
        .dashboard-header {
            background: linear-gradient(135deg, rgb(139 92 246), rgb(6 182 212));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
        
        .dashboard-subtitle {
            color: #64748b;
        }
    </style>
</head>
<body>
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <div class="sidebar w-64 fixed h-full">
            <div class="p-6">
                <div class="flex items-center gap-3 mb-8">
                    <div class="w-10 h-10 rounded-xl icon-gradient flex items-center justify-center text-white text-xl font-bold">
                        S
                    </div>
                    <div>
                        <h2 class="font-bold text-lg text-gray-800">ServerHub</h2>
                        <p class="text-xs text-gray-500">Admin Panel</p>
                    </div>
                </div>
                
                <nav class="space-y-1">
                    <a href="/Gchat/public/index.php?page=dashboard" class="nav-item active flex items-center gap-3 px-4 py-3 text-sm font-medium">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                        </svg>
                        Dashboard
                    </a>
                    <a href="/Gchat/public/index.php?page=servers" class="nav-item flex items-center gap-3 px-4 py-3 text-sm font-medium text-gray-700">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"/>
                        </svg>
                        Servers
                    </a>
                    <a href="/Gchat/public/index.php?page=users" class="nav-item flex items-center gap-3 px-4 py-3 text-sm font-medium text-gray-700">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                        Users
                    </a>
                    <a href="/Gchat/public/index.php?page=settings" class="nav-item flex items-center gap-3 px-4 py-3 text-sm font-medium text-gray-700">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        Settings
                    </a>
                </nav>
            </div>
            
            <div class="absolute bottom-0 w-full p-6">
                <div class="flex items-center gap-3 p-3 rounded-xl bg-gradient-to-br from-purple-50 to-pink-50">
                    <?php
                      $avatarFile = $_SESSION['profile_image'] ?? null;
                      $avatarUrl  = $avatarFile ? "uploads/profile_image/" . htmlspecialchars($avatarFile)
                                                : "assets/img/default.png";
                    ?>
                    <img src="<?= $avatarUrl ?>"
                         onerror="this.onerror=null; this.src='assets/img/default.png';"
                         alt="avatar"
                         class="w-10 h-10 rounded-full border" />
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-semibold text-gray-800 truncate"><?= htmlspecialchars($_SESSION['username'] ?? 'User') ?></p>
                        <p class="text-xs text-gray-500">Administrator</p>
                    </div>
                </div>
                <a href="/Gchat/public/index.php?page=logout" class="w-full mt-3 flex items-center justify-center gap-2 px-4 py-2 text-sm font-medium text-red-600 hover:bg-red-50 rounded-lg transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                    Logout
                </a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="ml-64 flex-1 p-8">
            <div class="max-w-7xl mx-auto">
                <?= $content ?>
            </div>
        </div>
    </div>
</body>
</html>


