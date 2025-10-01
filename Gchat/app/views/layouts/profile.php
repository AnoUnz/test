<?php
$app = require __DIR__ . '/../../../config/app.php';
?>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= isset($title) ? $title . ' | ' . $app['app_name'] : $app['app_name'] ?></title>
<link rel="stylesheet" href="<?= $app['base_url'] ?>../public/css/style.css">
<link rel="stylesheet" href="../public/css/style.css">
<script src="../public/js/scrollremember.js"></script>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
  <div class="flex min-h-screen ">
    <!-- Sidebar -->
  <aside class="w-64 bg-white border-r border-gray-200 min-h-full overflow-y-auto sticky top-0">
      <div class="p-6 h-full">
    <div class="flex items-center justify-between mb-6">
          <h2 class="text-lg font-semibold text-gray-900">Profile Settings</h2>
          <a href="index.php?page=home" 
             class="p-2 bg-gray-200 rounded-full text-gray-600 hover:bg-gray-300 hover:text-gray-900 transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                d="M10 19l-7-7m0 0l7-7m-7 7h18">
              </path>
            </svg>
          </a>
        </div>
        <nav class="space-y-6">
          <!-- ACCOUNT -->
          <div>
            <h3 class="text-xs font-semibold text-gray-700 uppercase mb-2">Account</h3>
            <div class="space-y-1">
              <a href="index.php?page=profile&tab=my_accounts" class="group flex items-center p-3 rounded-lg hover:bg-gray-50 transition-colors <?php echo ($_GET['tab'] ?? '') === 'my_accounts' ? 'bg-violet-50 text-violet-700 border border-violet-200' : 'text-gray-600'; ?>">My Account</a>
              <a href="index.php?page=profile&tab=profile" class="group flex items-center p-3 rounded-lg hover:bg-gray-50 transition-colors <?php echo ($_GET['tab'] ?? '') === 'profile' ? 'bg-violet-50 text-violet-700 border border-violet-200' : 'text-gray-600'; ?>">Profile</a>
              <a href="index.php?page=profile&tab=password" class="group flex items-center p-3 rounded-lg hover:bg-gray-50 transition-colors <?php echo ($_GET['tab'] ?? '') === 'password' ? 'bg-violet-50 text-violet-700 border border-violet-200' : 'text-gray-600'; ?>">Password & Security</a>
              <a href="index.php?page=profile&tab=privacy" class="group flex items-center p-3 rounded-lg hover:bg-gray-50 transition-colors <?php echo ($_GET['tab'] ?? '') === 'privacy' ? 'bg-violet-50 text-violet-700 border border-violet-200' : 'text-gray-600'; ?>">Privacy & Safety</a>
            </div>
          </div>

          <!-- PREFERENCES -->
          <div>
            <h3 class="text-xs font-semibold text-gray-700 uppercase mb-2">Preferences</h3>
            <div class="space-y-1">
              <a href="index.php?page=profile&tab=appearance" class="group flex items-center p-3 rounded-lg hover:bg-gray-50 transition-colors <?php echo ($_GET['tab'] ?? '') === 'appearance' ? 'bg-violet-50 text-violet-700 border border-violet-200' : 'text-gray-600'; ?>">Appearance</a>
              <a href="index.php?page=profile&tab=language" class="group flex items-center p-3 rounded-lg hover:bg-gray-50 transition-colors <?php echo ($_GET['tab'] ?? '') === 'language' ? 'bg-violet-50 text-violet-700 border border-violet-200' : 'text-gray-600'; ?>">Language & Region</a>
              <a href="index.php?page=profile&tab=accessibility" class="group flex items-center p-3 rounded-lg hover:bg-gray-50 transition-colors <?php echo ($_GET['tab'] ?? '') === 'accessibility' ? 'bg-violet-50 text-violet-700 border border-violet-200' : 'text-gray-600'; ?>">Accessibility</a>
            </div>
          </div>

          <!-- SUPPORT -->
          <div>
            <h3 class="text-xs font-semibold text-gray-700 uppercase mb-2">Support</h3>
            <div class="space-y-1">
              <a href="index.php?page=profile&tab=help" class="group flex items-center p-3 rounded-lg hover:bg-gray-50 transition-colors <?php echo ($_GET['tab'] ?? '') === 'help' ? 'bg-violet-50 text-violet-700 border border-violet-200' : 'text-gray-600'; ?>">Help Center</a>
              <a href="index.php?page=profile&tab=support" class="group flex items-center p-3 rounded-lg hover:bg-gray-50 transition-colors <?php echo ($_GET['tab'] ?? '') === 'support' ? 'bg-violet-50 text-violet-700 border border-violet-200' : 'text-gray-600'; ?>">Contact Support</a>
              <a href="index.php?page=profile&tab=report" class="group flex items-center p-3 rounded-lg hover:bg-gray-50 transition-colors <?php echo ($_GET['tab'] ?? '') === 'report' ? 'bg-violet-50 text-violet-700 border border-violet-200' : 'text-gray-600'; ?>">Report a Problem</a>
            </div>
          </div>

          <!-- ABOUT -->
          <div>
            <h3 class="text-xs font-semibold text-gray-700 uppercase mb-2">About</h3>
            <div class="space-y-1">
              <a href="index.php?page=profile&tab=info" class="group flex items-center p-3 rounded-lg hover:bg-gray-50 transition-colors <?php echo ($_GET['tab'] ?? '') === 'info' ? 'bg-violet-50 text-violet-700 border border-violet-200' : 'text-gray-600'; ?>">App Info</a>
              <a href="index.php?page=profile&tab=about" class="group flex items-center p-3 rounded-lg hover:bg-gray-50 transition-colors <?php echo ($_GET['tab'] ?? '') === 'about' ? 'bg-violet-50 text-violet-700 border border-violet-200' : 'text-gray-600'; ?>">About Us</a>
            </div>
          </div>
        </nav>
      </div>
    </aside>

    <!-- Main Content -->
  <main class="flex-1 p-6">
      <?= $content ?>
    </main>
  </div>
</body>
</html>