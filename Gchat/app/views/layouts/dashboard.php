<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? $title . ' | ' . $app['app_name'] : $app['app_name'] ?></title>
    <link rel="stylesheet" href="<?= $app['base_url'] ?>../css/style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <div class="sidebar w-64 fixed h-full">
            <div class="p-6">
                <div class="flex flex-col items-start mb-8">
                    <!-- Logo  -->
                    <a href="#" aria-label="Gchat home" class="flex items-center">
                        <span class="text-2xl font-extrabold bg-gradient-to-r from-violet-600 to-cyan-500 bg-clip-text text-transparent">Gchat</span>
                    </a>
                    <p class="text-xs text-gray-500 mt-1">Admin Panel</p>
                </div>
                <nav class="space-y-1">
                    <a href="index.php?page=dashboard&action=index"
                       class="nav-item flex items-center gap-3 px-4 py-3 text-sm font-medium <?= $currentAction == 'index' ? 'active text-black' : 'text-gray-700' ?>">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                        </svg>
                        Dashboard
                    </a>
        
                    <a href="index.php?page=dashboard&action=servers"
                       class="nav-item flex items-center gap-3 px-4 py-3 text-sm font-medium <?= $currentAction == 'servers' ? 'active text-black' : 'text-gray-700' ?>">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"/>
                        </svg>
                        Servers
                    </a>
        
                    <a href="index.php?page=dashboard&action=users"
                       class="nav-item flex items-center gap-3 px-4 py-3 text-sm font-medium <?= $currentAction == 'users' ? 'active text-black' : 'text-gray-700' ?>">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                        Users
                    </a>
        
                    <a href="index.php?page=dashboard&action=settings"
                       class="nav-item flex items-center gap-3 px-4 py-3 text-sm font-medium <?= $currentAction == 'settings' ? 'active text-black' : 'text-gray-700' ?>">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        Settings
                    </a>
                </nav>
            </div>
            
            <div class="absolute bottom-0 w-full p-6">
                <a href="index.php?page=profile" class="flex items-center gap-3 p-3 rounded-xl bg-gray-100 hover:bg-gray-200 transition cursor-pointer">
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
                </a>
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


