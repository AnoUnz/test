

<div class="flex flex-col min-h-screen">
  <!-- Banner -->
  <div class="relative mb-8">
      <?php 
        $bannerFile = $user['banner'] ?? null;
        $bannerUrl  = $bannerFile ? "uploads/banner/" . htmlspecialchars($bannerFile) : "assets/img/banner-default.jpg";
      ?>
      <div class="h-80 w-full rounded-2xl relative overflow-hidden">
        <img src="<?= $bannerUrl ?>" class="w-full h-full object-cover" alt="banner">
        <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-black/10 to-transparent"></div>

        <!-- Change Banner Button -->
        <form action="index.php?page=profile&action=updateBanner" method="POST" enctype="multipart/form-data" class="absolute top-6 right-6">
          <label for="banner-upload" class="cursor-pointer group bg-black/60 hover:bg-black/80 backdrop-blur-sm text-white text-sm px-6 py-3 rounded-xl flex items-center gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            <span class="font-medium">Change Banner</span>
          </label>
          <input type="file" name="banner" id="banner-upload" class="hidden" onchange="this.form.submit()">
        </form>
      </div>

      <!-- Profile Picture -->
      <?php
        $avatarFile = $user['profile_image'] ?? null;
        $avatarUrl  = $avatarFile ? "uploads/profile_image/" . htmlspecialchars($avatarFile) : "assets/img/default.png";
      ?>
      <div class="absolute -bottom-16 left-8">
        <div class="relative group">
          <div class="w-32 h-32 rounded-full border-4 border-white overflow-hidden bg-gradient-to-br from-violet-100 to-purple-100 p-1">
            <img src="<?= $avatarUrl ?>" 
                 alt="Profile Picture" 
                 class="w-full h-full rounded-full object-cover"
                 onerror="this.onerror=null;this.src='assets/img/default.png';">
          </div>

          <form action="index.php?page=profile&action=updateAvatar" method="POST" enctype="multipart/form-data" class="absolute bottom-2 right-2">
            <label for="avatar-upload" class="cursor-pointer bg-violet-600 hover:bg-violet-700 text-white w-10 h-10 rounded-full flex items-center justify-center">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
              </svg>
            </label>
            <input type="file" name="avatar" id="avatar-upload" class="hidden" onchange="this.form.submit()">
          </form>
        </div>
      </div>
    </div>

    <!-- Profile Info -->
    <div class="bg-gradient-to-br from-white to-slate-50 rounded-2xl border border-slate-200/60 p-8 mt-20 backdrop-blur-sm">
      <div class="flex items-start justify-between gap-6">
        <div class="flex-1">
          <h1 class="text-4xl font-bold text-slate-900 mb-2 tracking-tight"><?= htmlspecialchars($user['username']) ?></h1>
          <p class="text-xl text-slate-600 mb-4 font-medium"><?= htmlspecialchars($user['email']) ?></p>
          
          <div class="flex items-center gap-4 mb-6">
            <?php 
              $isAdmin = isset($user['role']) && strtolower($user['role']) === 'admin';
              $status  = $user['status'] ?? 'offline';
              
              if ($isAdmin) {
                $roleClass = 'bg-gradient-to-r from-violet-500 to-purple-600 text-white shadow-lg shadow-violet-500/25';
              } else {
                $roleClass = 'bg-slate-100 text-slate-700 border border-slate-200';
              }
            ?>
            <span class="inline-flex items-center rounded-full px-4 py-2 text-sm font-semibold <?= $roleClass ?> tracking-wide">
              <?= htmlspecialchars($user['role']) ?>
            </span>
            
            <?php $joined = !empty($user['created_at']) ? date('F j, Y', strtotime($user['created_at'])) : null; ?>
            <?php if ($joined): ?>
              <span class="text-slate-500 font-medium">
                Joined on <span class="text-slate-700 font-semibold"><?= htmlspecialchars($joined) ?></span>
              </span>
            <?php endif; ?>
          </div>


  <!-- Status Selector -->
  <?php if (isset($user['status'])): ?>
            <?php 
              $currentStatus = $user['status'] ?? 'offline';
              $statusStyles = [
                'online'    => ['bg' => 'bg-green-50', 'border' => 'border-green-200', 'text' => 'text-green-700', 'dot' => 'bg-green-500'],
                'offline'   => ['bg' => 'bg-gray-50', 'border' => 'border-gray-200', 'text' => 'text-gray-700', 'dot' => 'bg-gray-400'],
                'dnd'       => ['bg' => 'bg-red-50', 'border' => 'border-red-200', 'text' => 'text-red-700', 'dot' => 'bg-red-500'],
                'invisible' => ['bg' => 'bg-slate-50', 'border' => 'border-slate-200', 'text' => 'text-slate-700', 'dot' => 'bg-slate-500'],
              ];
              $style = $statusStyles[$currentStatus];
            ?>
            <div class="relative inline-block group">
              <button type="button" class="flex items-center gap-3 px-6 py-3 <?= $style['bg'] ?> <?= $style['border'] ?> <?= $style['text'] ?> border-2 rounded-xl font-semibold min-w-48">
                <span class="w-3 h-3 rounded-full <?= $style['dot'] ?>"></span>
                <span class="capitalize"><?= $currentStatus === 'dnd' ? 'Do Not Disturb' : $currentStatus ?></span>
                <svg class="w-4 h-4 ml-auto opacity-60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
              </button>

              <!-- Status Dropdown -->
              <div class="absolute top-full left-0 mt-2 w-64 bg-white rounded-2xl border border-slate-200 opacity-0 invisible group-hover:opacity-100 group-hover:visible group-focus-within:opacity-100 group-focus-within:visible z-50 p-2">
                <form action="index.php?page=profile&action=updateStatus" method="POST" class="space-y-1">
                  <button name="status" value="online" class="w-full flex items-center gap-3 px-4 py-3 rounded-xl text-green-700 hover:bg-green-50 focus:bg-green-50 <?= $currentStatus === 'online' ? 'bg-green-50 border border-green-200' : '' ?>">
                    <span class="w-3 h-3 rounded-full bg-green-500"></span>
                    <span class="text-sm font-medium">Online</span>
                  </button>
                  <button name="status" value="offline" class="w-full flex items-center gap-3 px-4 py-3 rounded-xl text-gray-700 hover:bg-gray-50 focus:bg-gray-50 <?= $currentStatus === 'offline' ? 'bg-gray-50 border border-gray-200' : '' ?>">
                    <span class="w-3 h-3 rounded-full bg-gray-400"></span>
                    <span class="text-sm font-medium">Offline</span>
                  </button>
                  <button name="status" value="dnd" class="w-full flex items-center gap-3 px-4 py-3 rounded-xl text-red-700 hover:bg-red-50 focus:bg-red-50 <?= $currentStatus === 'dnd' ? 'bg-red-50 border border-red-200' : '' ?>">
                    <span class="w-3 h-3 rounded-full bg-red-500"></span>
                    <span class="text-sm font-medium">Do Not Disturb</span>
                  </button>
                  <button name="status" value="invisible" class="w-full flex items-center gap-3 px-4 py-3 rounded-xl text-slate-700 hover:bg-slate-50 focus:bg-slate-50 <?= $currentStatus === 'invisible' ? 'bg-slate-50 border border-slate-200' : '' ?>">
                    <span class="w-3 h-3 rounded-full bg-slate-500"></span>
                    <span class="text-sm font-medium">Invisible</span>
                  </button>
                </form>
              </div>
            </div>
          <?php endif; ?>
        </div>
      </div>

      <!-- About Me Section -->
      <div class="mt-8 bg-gradient-to-br from-slate-50 to-white border-2 border-slate-200/60 rounded-2xl p-6 relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 bg-gradient-to-br from-violet-50/30 to-transparent opacity-50"></div>
        
        <div class="relative z-10">
          <div class="flex items-center justify-between mb-4">
            <h2 class="text-sm font-bold text-slate-600 uppercase tracking-wider flex items-center gap-2">
              <span class="w-2 h-2 bg-violet-500 rounded-full"></span>
              About Me
            </h2>
            <button type="button" id="about-edit-open" class="group flex items-center gap-2 rounded-xl border-2 border-slate-300 bg-white px-4 py-2 text-sm text-slate-700 hover:border-violet-300 hover:text-violet-700 font-medium">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
              </svg>
              Edit
            </button>
          </div>
          
          <?php if (!empty($user['about_me'])): ?>
            <p class="text-base text-slate-700 leading-relaxed font-medium">
              <?= nl2br(htmlspecialchars($user['about_me'])) ?>
            </p>
          <?php else: ?>
            <p class="text-sm text-slate-500 italic font-medium">
              This user hasn't written anything yet. Click Edit to add a description.
            </p>
          <?php endif; ?>
        </div>
      </div>
  </div>
</div>

<!-- About Me Edit Modal -->
<div id="about-edit-modal" class="fixed inset-0 z-50 hidden">
  <div class="absolute inset-0 bg-black/60 backdrop-blur-sm"></div>
  <div class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 w-[90vw] max-w-2xl rounded-2xl bg-white border border-slate-200 p-8">
    <div class="flex items-center justify-between mb-6">
      <h3 class="text-xl font-bold text-slate-900 flex items-center gap-3">
        <span class="w-8 h-8 bg-gradient-to-br from-violet-500 to-purple-600 rounded-lg flex items-center justify-center">
          <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
          </svg>
        </span>
        Edit About Me
      </h3>
      <button type="button" id="about-edit-close" class="text-slate-400 hover:text-slate-600 hover:bg-slate-100 w-8 h-8 rounded-lg flex items-center justify-center">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
      </button>
    </div>
    
    <form action="index.php?page=profile&action=updateInfo" method="POST" class="space-y-6">
      <div>
        <label for="about_me" class="block text-sm font-semibold text-slate-700 mb-3">Tell us about yourself</label>
        <textarea 
          id="about_me" 
          name="about_me" 
          rows="8" 
          class="block w-full rounded-xl border-2 border-slate-300 bg-white p-4 text-sm text-slate-800 focus:border-violet-500 focus:ring-4 focus:ring-violet-500/10 resize-none" 
          placeholder="Share your story, interests, and what makes you unique..."
        ><?= htmlspecialchars($user['about_me'] ?? '') ?></textarea>
      </div>
      
      <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-200">
        <button 
          type="button" 
          id="about-edit-cancel" 
          class="px-6 py-3 rounded-xl border-2 border-slate-300 text-slate-700 hover:bg-slate-50 hover:border-slate-400 font-medium"
        >
          Cancel
        </button>
        <button 
          type="submit" 
          class="px-6 py-3 rounded-xl bg-gradient-to-r from-violet-600 to-purple-600 text-white hover:from-violet-700 hover:to-purple-700 font-semibold"
        >
          Save Changes
        </button>
      </div>
    </form>
  </div>
  
  <script>
    (function(){
      var modal = document.getElementById('about-edit-modal');
      var openBtn = document.getElementById('about-edit-open');
      var closeBtn = document.getElementById('about-edit-close');
      var cancelBtn = document.getElementById('about-edit-cancel');
      
      if(!modal || !openBtn) return;
      
      function open(){ modal.classList.remove('hidden'); }
      function close(){ modal.classList.add('hidden'); }
      
      openBtn.addEventListener('click', function(e){ e.stopPropagation(); open(); });
      if(closeBtn) closeBtn.addEventListener('click', close);
      if(cancelBtn) cancelBtn.addEventListener('click', close);
      
      modal.addEventListener('click', function(e){
        if(e.target === modal) close();
      });
      
      document.addEventListener('keydown', function(e){ 
        if(e.key === 'Escape'){ close(); }
      });
    })();
  </script>
</div>