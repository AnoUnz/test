<!-- Header -->
<div class="mb-8">
  <h1 class="text-4xl font-bold mb-2">Dashboard Overview</h1>
</div>

<!-- Statistik Umum -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
  <!-- Total Servers -->
  <div class="stat-card rounded-2xl p-6 bg-white border border-gray-200" style="animation-delay:0.1s">
    <div class="w-12 h-12 rounded-xl bg-purple-500 flex items-center justify-center text-white mb-4">
      <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M3 7h18M3 12h18M3 17h18" />
      </svg>
    </div>
    <div class="flex flex-col">
      <span class="text-sm font-medium text-gray-600">Total Servers</span>
      <span class="text-3xl font-bold text-gray-900"><?= $stats['total_servers'] ?? 0 ?></span>
    </div>
  </div>

  <!-- Total Users -->
  <div class="stat-card rounded-2xl p-6 bg-white border border-gray-200" style="animation-delay:0.2s">
    <div class="w-12 h-12 rounded-xl bg-purple-500 flex items-center justify-center text-white mb-4">
      <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M17 20h5v-2a4 4 0 00-5-4h-1m-6 6H2v-2a4 4 0 014-4h1m0-6a4 4 0 118 0 4 4 0 01-8 0z" />
      </svg>
    </div>
    <div class="flex flex-col">
      <span class="text-sm font-medium text-gray-600">Total Users</span>
      <span class="text-3xl font-bold text-gray-900"><?= $stats['total_users'] ?? 0 ?></span>
    </div>
  </div>

  <!-- Online Users -->
  <div class="stat-card rounded-2xl p-6 bg-white border border-gray-200 " style="animation-delay:0.3s">
    <div class="w-12 h-12 rounded-xl bg-purple-500 flex items-center justify-center text-white mb-4">
      <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M5 13l4 4L19 7" />
      </svg>
    </div>
    <div class="flex flex-col">
      <span class="text-sm font-medium text-gray-600">Online Users</span>
      <span class="text-3xl font-bold text-gray-900"><?= $stats['online_users'] ?? 0 ?></span>
    </div>
  </div>

  <!-- Total Messages -->
  <div class="stat-card rounded-2xl p-6 bg-white border border-gray-200" style="animation-delay:0.4s">
    <div class="w-12 h-12 rounded-xl bg-purple-500 flex items-center justify-center text-white mb-4">
      <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M7 8h10M7 12h8m-8 4h6M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
      </svg>
    </div>
    <div class="flex flex-col">
      <span class="text-sm font-medium text-gray-600">Total Messages</span>
      <span class="text-3xl font-bold text-gray-900"><?= $stats['total_messages'] ?? 0 ?></span>
    </div>
  </div>
</div>

<!-- Grafik -->
<div class="grid grid-cols-1 gap-6">
  <!-- Messages per Day -->
  <div class="rounded-2xl p-6 bg-white border border-gray-200" style="animation-delay:0.6s">
    <h2 class="text-lg font-bold text-gray-900 mb-4">Messages per Day</h2>
    <div class="w-full h-64"> <!-- tinggi tetap 16rem -->
      <canvas id="messagesChart"></canvas>
    </div>
  </div>

  <!-- Users Growth -->
  <div class="rounded-2xl p-6 bg-white border border-gray-200" style="animation-delay:0.7s">
    <h2 class="text-lg font-bold text-gray-900 mb-4">New Users per Month</h2>
    <div class="w-full h-64">
      <canvas id="usersChart"></canvas>
    </div>
  </div>
</div>

<!-- ChartJS Script -->
<script>
const messagesCtx = document.getElementById('messagesChart').getContext('2d');
new Chart(messagesCtx, {
  type: 'bar',
  data: {
    labels: <?= json_encode($chart['days'] ?? []) ?>,
    datasets: [{
      label: 'Messages',
      data: <?= json_encode($chart['messages'] ?? []) ?>,
      backgroundColor: 'rgba(167, 139, 250, 0.6)',
      borderColor: '#a78bfa',
      borderWidth: 1
    }]
  },
  options: {
    responsive: true,
    maintainAspectRatio: false, // biarkan false
    plugins: { legend: { display: false } },
    scales: {
      x: { ticks: { maxRotation: 0, autoSkip: true, maxTicksLimit: 12 } },
      y: { beginAtZero: true }
    }
  }
});

const usersCtx = document.getElementById('usersChart').getContext('2d');
new Chart(usersCtx, {
  type: 'bar',
  data: {
    labels: <?= json_encode($chart['months'] ?? []) ?>,
    datasets: [{
      label: 'New Users',
      data: <?= json_encode($chart['users'] ?? []) ?>,
      backgroundColor: 'rgba(112, 68, 245, 0.6)',
      borderColor: '#7044f5',
      borderWidth: 1
    }]
  },
  options: {
    responsive: true,
    maintainAspectRatio: false,
    plugins: { legend: { display: true } },
    scales: { y: { beginAtZero: true } }
  }
});

</script>