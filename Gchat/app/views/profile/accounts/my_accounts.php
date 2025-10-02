<div class="max-w-4xl mx-auto space-y-8">
  <!-- Preview Akun -->
  <div class="bg-white rounded-xl shadow p-6">
    <h2 class="text-lg font-semibold text-gray-900 mb-4">Account Overview</h2>
    <div class="flex items-center gap-6">
      <img src="uploads/profile_image/<?= htmlspecialchars($user['profile_image'] ?? 'default.png') ?>" 
           alt="Avatar" class="w-20 h-20 rounded-full object-cover shadow">
      <div class="flex-1 space-y-4">
        <!-- Username -->
        <div class="flex items-center justify-between">
          <div>
            <p class="text-sm text-gray-500">Username</p>
            <p class="text-base font-medium text-gray-900"><?= htmlspecialchars($user['username']) ?></p>
          </div>
          <button type="button" data-modal-target="#modal-username" class="px-4 py-1.5 rounded-lg bg-gray-100 hover:bg-gray-200 text-sm text-gray-700">Edit</button>
        </div>
        <!-- Email -->
        <div class="flex items-center justify-between">
          <div>
            <p class="text-sm text-gray-500">Email</p>
            <p class="text-base font-medium text-gray-900">
              <?= htmlspecialchars($user['email']) ?>
            </p>
          </div>
          <button type="button" data-modal-target="#modal-email" class="px-4 py-1.5 rounded-lg bg-gray-100 hover:bg-gray-200 text-sm text-gray-700">Edit</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Account Actions -->
  <div class="bg-white rounded-xl shadow p-6 space-y-4">
    <h2 class="text-lg font-semibold text-gray-900">Account Actions</h2>

    <div class="flex justify-between items-center border-t border-gray-200 pt-4">
      <div>
        <p class="font-medium text-gray-900">Change Password</p>
        <p class="text-sm text-gray-500">Update your account password.</p>
      </div>
      <button type="button" data-modal-target="#modal-password" class="px-4 py-2 text-sm rounded-lg bg-yellow-500 text-white hover:bg-yellow-600">Change</button>
    </div>

    <div class="flex justify-between items-center border-t border-gray-200 pt-4">
      <div>
        <p class="font-medium text-gray-900">Change Account</p>
        <p class="text-sm text-gray-500">Switch to another account.</p>
      </div>
      <a href="index.php?page=auth&action=switch" 
         class="px-4 py-2 text-sm rounded-lg bg-violet-600 text-white hover:bg-violet-700">
        Change
      </a>
    </div>

    <div class="flex justify-between items-center border-t border-gray-200 pt-4">
      <div>
        <p class="font-medium text-gray-900">Logout</p>
        <p class="text-sm text-gray-500">Sign out from your account.</p>
      </div>
      <a href="index.php?page=logout" 
         class="px-4 py-2 text-sm rounded-lg bg-gray-600 text-white hover:bg-gray-700">
        Logout
      </a>
    </div>
  </div>

  <!-- Danger Zone -->
  <div class="bg-white rounded-xl shadow p-6 border border-red-200 space-y-4">
    <h2 class="text-lg font-semibold text-red-600">Danger Zone</h2>
    <div class="flex justify-between items-center border-t border-gray-200 pt-4">
      <div>
        <p class="font-medium text-gray-900">Delete Account</p>
        <p class="text-sm text-gray-500">Permanently delete your account.</p>
      </div>
      <button type="button" data-modal-target="#modal-delete-step1" class="px-4 py-2 text-sm rounded-lg bg-red-600 text-white hover:bg-red-700">
        Delete
      </button>
    </div>
  </div>
</div>

<!-- Modals -->
<div id="modal-username" class="fixed inset-0 hidden items-center justify-center bg-black/50 z-50">
  <div class="bg-white w-full max-w-md rounded-xl shadow-lg p-6">
    <div class="flex items-center justify-between mb-4">
      <h3 class="text-lg font-semibold text-gray-900">Edit Username</h3>
      <button type="button" class="text-gray-500 hover:text-gray-700" data-modal-close="#modal-username">✕</button>
    </div>
    <form action="index.php?page=profile&action=updateUsername" method="post" class="space-y-4">
      <div>
        <label class="block text-sm text-gray-600 mb-1">Username</label>
        <input type="text" name="username" value="<?= htmlspecialchars($user['username']) ?>" class="w-full px-3 py-2 border rounded-lg" required>
      </div>
      <div class="flex items-center justify-end gap-2">
        <button type="button" class="px-4 py-2 rounded-lg border text-gray-700 hover:bg-gray-50" data-modal-close="#modal-username">Cancel</button>
        <button type="submit" class="px-4 py-2 rounded-lg bg-gray-900 text-white hover:bg-gray-800">Save</button>
      </div>
    </form>
  </div>
  </div>

<div id="modal-email" class="fixed inset-0 hidden items-center justify-center bg-black/50 z-50">
  <div class="bg-white w-full max-w-md rounded-xl shadow-lg p-6">
    <div class="flex items-center justify-between mb-4">
      <h3 class="text-lg font-semibold text-gray-900">Edit Email</h3>
      <button type="button" class="text-gray-500 hover:text-gray-700" data-modal-close="#modal-email">✕</button>
    </div>
    <form action="index.php?page=profile&action=updateEmail" method="post" class="space-y-4">
      <div>
        <label class="block text-sm text-gray-600 mb-1">Email</label>
        <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" class="w-full px-3 py-2 border rounded-lg" required>
      </div>
      <div class="flex items-center justify-end gap-2">
        <button type="button" class="px-4 py-2 rounded-lg border text-gray-700 hover:bg-gray-50" data-modal-close="#modal-email">Cancel</button>
        <button type="submit" class="px-4 py-2 rounded-lg bg-gray-900 text-white hover:bg-gray-800">Save</button>
      </div>
    </form>
  </div>
  </div>

<div id="modal-password" class="fixed inset-0 hidden items-center justify-center bg-black/50 z-50">
  <div class="bg-white w-full max-w-md rounded-xl shadow-lg p-6">
    <div class="flex items-center justify-between mb-4">
      <h3 class="text-lg font-semibold text-gray-900">Change Password</h3>
      <button type="button" class="text-gray-500 hover:text-gray-700" data-modal-close="#modal-password">✕</button>
    </div>
    <form action="index.php?page=profile&action=changePassword" method="post" class="space-y-4">
      <div>
        <label class="block text-sm text-gray-600 mb-1">Current Password</label>
        <input type="password" name="current_password" class="w-full px-3 py-2 border rounded-lg" required>
      </div>
      <div>
        <label class="block text-sm text-gray-600 mb-1">New Password</label>
        <input type="password" name="new_password" class="w-full px-3 py-2 border rounded-lg" required>
      </div>
      <div>
        <label class="block text-sm text-gray-600 mb-1">Confirm New Password</label>
        <input type="password" name="confirm_password" class="w-full px-3 py-2 border rounded-lg" required>
      </div>
      <div class="flex items-center justify-end gap-2">
        <button type="button" class="px-4 py-2 rounded-lg border text-gray-700 hover:bg-gray-50" data-modal-close="#modal-password">Cancel</button>
        <button type="submit" class="px-4 py-2 rounded-lg bg-yellow-500 text-white hover:bg-yellow-600">Update</button>
      </div>
    </form>
  </div>
  </div>

<script>
document.addEventListener('DOMContentLoaded', function() {
  function openModal(id) {
    var el = document.querySelector(id);
    if (!el) return;
    el.classList.remove('hidden');
    el.classList.add('flex');
  }
  function closeModal(id) {
    var el = document.querySelector(id);
    if (!el) return;
    el.classList.add('hidden');
    el.classList.remove('flex');
  }
  document.querySelectorAll('[data-modal-target]').forEach(function(btn) {
    btn.addEventListener('click', function() {
      var target = btn.getAttribute('data-modal-target');
      openModal(target);
    });
  });
  document.querySelectorAll('[data-modal-close]').forEach(function(btn) {
    btn.addEventListener('click', function() {
      var target = btn.getAttribute('data-modal-close');
      closeModal(target);
    });
  });
  // Close when clicking backdrop
  ['#modal-username','#modal-email','#modal-password'].forEach(function(id){
    var el = document.querySelector(id);
    if (!el) return;
    el.addEventListener('click', function(e){
      if (e.target === el) { closeModal(id); }
    });
  });
  // ESC to close
  document.addEventListener('keydown', function(e){
    if (e.key === 'Escape') {
      ['#modal-username','#modal-email','#modal-password'].forEach(function(id){ closeModal(id); });
    }
  });
});
</script>

<!-- Delete step 1: phrase confirmation -->
<div id="modal-delete-step1" class="fixed inset-0 hidden items-center justify-center bg-black/50 z-50">
  <div class="bg-white w-full max-w-md rounded-xl shadow-lg p-6">
    <div class="flex items-center justify-between mb-4">
      <h3 class="text-lg font-semibold text-gray-900">Confirm Deletion</h3>
      <button type="button" class="text-gray-500 hover:text-gray-700" data-modal-close="#modal-delete-step1">✕</button>
    </div>
    <p class="text-sm text-gray-600 mb-4">Type the following to continue:</p>
    <p class="text-sm font-mono bg-gray-100 rounded px-2 py-1 mb-4">delete "<?= htmlspecialchars($user['username']) ?>"</p>
    <div class="space-y-4">
      <input id="deletePhraseInput" type="text" class="w-full px-3 py-2 border rounded-lg" placeholder='delete "<?= htmlspecialchars($user['username']) ?>"'>
      <div class="flex items-center justify-end gap-2">
        <button type="button" class="px-4 py-2 rounded-lg border text-gray-700 hover:bg-gray-50" data-modal-close="#modal-delete-step1">Cancel</button>
        <button type="button" id="deleteStep1Next" class="px-4 py-2 rounded-lg bg-red-600 text-white hover:bg-red-700" disabled>Next</button>
      </div>
    </div>
  </div>
  </div>

<!-- Delete step 2: password confirmation -->
<div id="modal-delete-step2" class="fixed inset-0 hidden items-center justify-center bg-black/50 z-50">
  <div class="bg-white w-full max-w-md rounded-xl shadow-lg p-6">
    <div class="flex items-center justify-between mb-4">
      <h3 class="text-lg font-semibold text-gray-900">Confirm With Password</h3>
      <button type="button" class="text-gray-500 hover:text-gray-700" data-modal-close="#modal-delete-step2">✕</button>
    </div>
    <form action="index.php?page=profile&action=deleteAccount" method="post" class="space-y-4">
      <input type="hidden" name="phrase" id="deletePhraseHidden">
      <div>
        <label class="block text-sm text-gray-600 mb-1">Password</label>
        <input type="password" name="password" class="w-full px-3 py-2 border rounded-lg" required>
      </div>
      <div class="flex items-center justify-end gap-2">
        <button type="button" class="px-4 py-2 rounded-lg border text-gray-700 hover:bg-gray-50" data-modal-close="#modal-delete-step2">Cancel</button>
        <button type="submit" class="px-4 py-2 rounded-lg bg-red-600 text-white hover:bg-red-700">Delete</button>
      </div>
    </form>
  </div>
  </div>

<script>
document.addEventListener('DOMContentLoaded', function(){
  var step1 = document.querySelector('#modal-delete-step1');
  var step2 = document.querySelector('#modal-delete-step2');
  var phraseInput = document.querySelector('#deletePhraseInput');
  var phraseHidden = document.querySelector('#deletePhraseHidden');
  var btnNext = document.querySelector('#deleteStep1Next');
  var expected = 'delete "<?= addslashes($user['username']) ?>"';

  function open(id){ var el=document.querySelector(id); if(!el) return; el.classList.remove('hidden'); el.classList.add('flex'); }
  function close(id){ var el=document.querySelector(id); if(!el) return; el.classList.add('hidden'); el.classList.remove('flex'); }

  // Enable Next only when phrase matches exactly
  phraseInput && phraseInput.addEventListener('input', function(){
    btnNext.disabled = (phraseInput.value.trim().toLowerCase() !== expected.toLowerCase());
  });

  btnNext && btnNext.addEventListener('click', function(){
    phraseHidden.value = phraseInput.value;
    close('#modal-delete-step1');
    open('#modal-delete-step2');
  });
});
</script>
