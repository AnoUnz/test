<!-- Header -->
<div class="mb-8 animate-slide-in">
    <h1 class="text-4xl font-bold dashboard-header mb-2">Server Dashboard</h1>
    <p class="dashboard-subtitle">Manage and monitor your server infrastructure</p>
</div>

<!-- Stats Grid -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="stat-card rounded-2xl p-6 animate-slide-in" style="animation-delay: 0.1s">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 rounded-xl bg-gray-800 flex items-center justify-center text-white">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"/>
                </svg>
            </div>
        </div>
        <div class="text-sm font-medium text-gray-600 mb-1">Total Servers</div>
        <div class="text-3xl font-bold text-gray-900"><?= $stats['total_servers'] ?? 0 ?></div>
    </div>

    <div class="stat-card rounded-2xl p-6 animate-slide-in" style="animation-delay: 0.2s">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 rounded-xl bg-gray-800 flex items-center justify-center text-white">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                </svg>
            </div>
        </div>
        <div class="text-sm font-medium text-gray-600 mb-1">Total Members</div>
        <div class="text-3xl font-bold text-gray-900"><?= $stats['total_members'] ?? 0 ?></div>
    </div>

    <div class="stat-card rounded-2xl p-6 animate-slide-in" style="animation-delay: 0.3s">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 rounded-xl bg-gray-800 flex items-center justify-center text-white">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
        </div>
        <div class="text-sm font-medium text-gray-600 mb-1">Online Servers</div>
        <div class="text-3xl font-bold text-gray-900"><?= $stats['online_servers'] ?? 0 ?></div>
    </div>

    <div class="stat-card rounded-2xl p-6 animate-slide-in" style="animation-delay: 0.4s">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 rounded-xl bg-gray-800 flex items-center justify-center text-white">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                </svg>
            </div>
        </div>
        <div class="text-sm font-medium text-gray-600 mb-1">Avg Uptime</div>
        <div class="text-3xl font-bold text-gray-900"><?= $stats['avg_uptime'] ?? '0' ?>%</div>
    </div>
</div>

<!-- Search and Add Button -->
<div class="flex items-center gap-4 mb-8 animate-slide-in" style="animation-delay: 0.5s">
    <div class="flex-1 relative">
        <svg class="absolute left-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
        </svg>
        <input type="text" placeholder="Search servers..." value="<?= htmlspecialchars($q ?? '') ?>"
               class="search-input w-full pl-12 pr-4 py-4 bg-white border-none rounded-2xl text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500">
    </div>
    <button class="gradient-btn px-6 py-4 rounded-2xl text-white font-semibold flex items-center gap-2">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
        </svg>
        Add Server
    </button>
</div>

<!-- Server Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
    <?php if (!empty($servers)): ?>
        <?php foreach ($servers as $index => $server): ?>
            <div class="server-card rounded-2xl p-6 animate-slide-in" style="animation-delay: <?= 0.6 + ($index * 0.1) ?>s">
                <div class="flex items-start justify-between mb-4">
                    <div class="flex items-center gap-3">
                        <div class="w-14 h-14 rounded-xl bg-gray-800 flex items-center justify-center text-white text-xl font-bold">
                            <?= strtoupper(substr($server['name'], 0, 1)) ?>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-900 text-lg"><?= htmlspecialchars($server['name']) ?></h3>
                            <p class="text-sm text-gray-500"><?= htmlspecialchars($server['description'] ?? 'No description') ?></p>
                        </div>
                    </div>
                    <span class="<?= $server['status'] === 'online' ? 'badge-online' : 'badge-offline' ?> px-3 py-1 rounded-full text-xs font-semibold text-white">
                        <?= ucfirst($server['status']) ?>
                    </span>
                </div>
                
                <p class="text-sm text-gray-600 mb-4 line-clamp-2"><?= htmlspecialchars($server['description'] ?? 'No description available') ?></p>
                
                <div class="grid grid-cols-3 gap-3">
                    <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-xl p-3">
                        <div class="text-xs text-gray-500 mb-1">Owner</div>
                        <div class="font-semibold text-gray-900 text-sm"><?= htmlspecialchars($server['owner'] ?? 'Unknown') ?></div>
                    </div>
                    <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-xl p-3">
                        <div class="text-xs text-gray-500 mb-1">Members</div>
                        <div class="font-semibold text-gray-900 text-sm"><?= $server['member_count'] ?? 0 ?></div>
                    </div>
                    <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-xl p-3">
                        <div class="text-xs text-gray-500 mb-1">Uptime</div>
                        <div class="font-semibold text-gray-900 text-sm"><?= $server['uptime'] ?? '0' ?>%</div>
                    </div>
                </div>

                <button class="w-full mt-4 py-3 rounded-xl border-2 border-gray-200 text-gray-700 font-medium hover:bg-gray-50 transition flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                    View Details
                </button>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="col-span-full text-center py-12">
            <div class="text-gray-500 text-lg">No servers found</div>
            <p class="text-gray-400 mt-2">Start by adding your first server</p>
        </div>
    <?php endif; ?>
</div>