      <section class="relative isolate overflow-hidden">
        <div class="absolute inset-0 gradient"></div>
        <div class="relative mx-auto max-w-7xl px-4 py-20 sm:px-6 md:py-28 lg:px-8">
          <h1 class="text-4xl font-extrabold tracking-tight sm:text-6xl">
            Find and join gaming servers on Gchat
          </h1>
          <p class="mt-4 max-w-2xl text-lg text-slate-600">
            Discover active communities for your favorite titles. Chat, squad up, and level up together.
          </p>

          <!-- Search -->
          <form class="mt-8 flex max-w-2xl items-center gap-2" action="https://Gchat.app/search" method="get">
            <div class="relative flex-1">
              <input
                type="search"
                name="q"
                placeholder="Search for games, genres, or server names"
                aria-label="Search servers"
                class="h-12 w-full rounded-md border border-slate-200 bg-white px-4 pr-10 text-slate-900 shadow-sm outline-none ring-0 placeholder:text-slate-400 focus:border-slate-300 focus:ring-2 focus:ring-violet-200"
                required
              />
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="pointer-events-none absolute right-3 top-1/2 h-5 w-5 -translate-y-1/2 text-slate-400"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
            </div>
            <button type="submit" class="h-12 rounded-md bg-slate-900 px-5 font-medium text-white shadow-sm transition hover:bg-slate-800">
              Search
            </button>
          </form>

          <!-- Trending -->
          <div class="mt-6 flex flex-wrap items-center gap-2">
            <span class="mr-1 text-sm text-slate-600">Trending:</span>
            <a href="#" class="inline-flex items-center rounded-full border border-slate-200 px-3 py-1 text-xs text-slate-700">Valorant</a>
            <a href="#" class="inline-flex items-center rounded-full border border-slate-200 px-3 py-1 text-xs text-slate-700">Minecraft</a>
            <a href="#" class="inline-flex items-center rounded-full border border-slate-200 px-3 py-1 text-xs text-slate-700">Fortnite</a>
            <a href="#" class="inline-flex items-center rounded-full border border-slate-200 px-3 py-1 text-xs text-slate-700">GTA RP</a>
          </div>
        </div>
      </section>

<?php $status = $_GET['status'] ?? null; ?>
<?php if (in_array($status, ['logged_out','account_deleted'])): ?>
<div class="fixed inset-0 flex items-center justify-center bg-black/50 z-50">
  <div class="bg-white w-full max-w-sm rounded-xl shadow-lg p-6 text-center space-y-3">
    <h3 class="text-lg font-semibold text-gray-900">Success</h3>
    <p class="text-sm text-gray-600">
      <?php if ($status === 'logged_out'): ?>You have been logged out.<?php endif; ?>
      <?php if ($status === 'account_deleted'): ?>Your account has been deleted.<?php endif; ?>
    </p>
    <a href="index.php?page=home" class="inline-block px-4 py-2 rounded-lg bg-gray-900 text-white hover:bg-gray-800">OK</a>
  </div>
</div>
<?php endif; ?>



          <!-- Featured Servers Section -->
    <section class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
        <div class="mb-8">
            <h2 class="text-3xl font-bold tracking-tight text-slate-900">Featured Communities</h2>
            <p class="mt-2 text-slate-600">Join the most active gaming servers right now</p>
        </div>
        
        <!-- Server Cards Grid - 2x2 layout -->
        <div class="grid gap-6 md:grid-cols-2">
            <!-- Valorant Server Card -->
            <div class="group relative overflow-hidden rounded-lg border border-slate-200 bg-white card-shadow transition-smooth hover:card-shadow-hover hover:-translate-y-0.5">
                <!-- Banner Image -->
                <div class="relative h-32 overflow-hidden">
                    <div class="h-full w-full gaming-gradient"></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent"></div>
                    
                    <!-- Game Badge -->
                    <div class="absolute top-3 right-3 rounded-full bg-white/90 px-3 py-1 text-xs font-medium text-slate-700 backdrop-blur-sm">
                        Valorant
                    </div>
                </div>

                <!-- Content -->
                <div class="p-4">
                    <!-- Server Logo and Name -->
                    <div class="flex items-start gap-3 mb-3">
                        <div class="relative">
                            <div class="h-12 w-12 rounded-full border-2 border-slate-200 gaming-gradient flex items-center justify-center">
                                <span class="text-black font-bold text-sm">VP</span>
                            </div>
                            <div class="absolute -bottom-1 -right-1 h-4 w-4 rounded-full bg-green-500 border-2 border-white"></div>
                        </div>
                        <div class="flex-1 min-w-0">
                            <h3 class="font-semibold text-slate-900 truncate group-hover:text-gaming-primary transition-colors">
                                ValorantPro Esports
                            </h3>
                            <p class="text-sm text-slate-600 line-clamp-2 leading-relaxed">
                                Competitive Valorant community with daily scrims, tournaments, and coaching sessions. Join us to improve your gameplay!
                            </p>
                        </div>
                    </div>

                    <!-- Stats -->
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-4 text-sm text-slate-500">
                            <div class="flex items-center gap-1.5">
                                <div class="h-2 w-2 rounded-full bg-green-500"></div>
                                <span class="font-medium text-slate-700">1,247</span>
                                <span>online</span>
                            </div>
                            <div class="flex items-center gap-1.5">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                                </svg>
                                <span class="font-medium text-slate-700">15,630</span>
                                <span>members</span>
                            </div>
                        </div>
                        
                        <button class="inline-flex items-center gap-1.5 rounded-md gaming-gradient px-3 py-1.5 text-xs font-medium text-white transition-colors hover:opacity-90">
                            <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                            Join
                        </button>
                    </div>
                </div>
            </div>

            <!-- Minecraft Server Card -->
            <div class="group relative overflow-hidden rounded-lg border border-slate-200 bg-white card-shadow transition-smooth hover:card-shadow-hover hover:-translate-y-0.5">
                <!-- Banner Image -->
                <div class="relative h-32 overflow-hidden">
                    <div class="h-full w-full bg-gradient-to-r from-green-500 to-emerald-600"></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent"></div>
                    
                    <!-- Game Badge -->
                    <div class="absolute top-3 right-3 rounded-full bg-white/90 px-3 py-1 text-xs font-medium text-slate-700 backdrop-blur-sm">
                        Minecraft
                    </div>
                </div>

                <!-- Content -->
                <div class="p-4">
                    <!-- Server Logo and Name -->
                    <div class="flex items-start gap-3 mb-3">
                        <div class="relative">
                            <div class="h-12 w-12 rounded-full border-2 border-slate-200 bg-gradient-to-r from-green-500 to-emerald-600 flex items-center justify-center">
                                <span class="text-white font-bold text-sm">CW</span>
                            </div>
                            <div class="absolute -bottom-1 -right-1 h-4 w-4 rounded-full bg-green-500 border-2 border-white"></div>
                        </div>
                        <div class="flex-1 min-w-0">
                            <h3 class="font-semibold text-slate-900 truncate group-hover:text-gaming-primary transition-colors">
                                CraftWorld Builders
                            </h3>
                            <p class="text-sm text-slate-600 line-clamp-2 leading-relaxed">
                                Creative Minecraft server focused on massive builds, community projects, and collaborative construction. All skill levels welcome!
                            </p>
                        </div>
                    </div>

                    <!-- Stats -->
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-4 text-sm text-slate-500">
                            <div class="flex items-center gap-1.5">
                                <div class="h-2 w-2 rounded-full bg-green-500"></div>
                                <span class="font-medium text-slate-700">892</span>
                                <span>online</span>
                            </div>
                            <div class="flex items-center gap-1.5">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                                </svg>
                                <span class="font-medium text-slate-700">23,401</span>
                                <span>members</span>
                            </div>
                        </div>
                        
                        <button class="inline-flex items-center gap-1.5 rounded-md gaming-gradient px-3 py-1.5 text-xs font-medium text-white transition-colors hover:opacity-90">
                            <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                            Join
                        </button>
                    </div>
                </div>
            </div>

            <!-- Fortnite Server Card -->
            <div class="group relative overflow-hidden rounded-lg border border-slate-200 bg-white card-shadow transition-smooth hover:card-shadow-hover hover:-translate-y-0.5">
                <!-- Banner Image -->
                <div class="relative h-32 overflow-hidden">
                    <div class="h-full w-full bg-gradient-to-r from-purple-500 to-pink-600"></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent"></div>
                    
                    <!-- Game Badge -->
                    <div class="absolute top-3 right-3 rounded-full bg-white/90 px-3 py-1 text-xs font-medium text-slate-700 backdrop-blur-sm">
                        Fortnite
                    </div>
                </div>

                <!-- Content -->
                <div class="p-4">
                    <!-- Server Logo and Name -->
                    <div class="flex items-start gap-3 mb-3">
                        <div class="relative">
                            <div class="h-12 w-12 rounded-full border-2 border-slate-200 bg-gradient-to-r from-purple-500 to-pink-600 flex items-center justify-center">
                                <span class="text-white font-bold text-sm">VR</span>
                            </div>
                            <div class="absolute -bottom-1 -right-1 h-4 w-4 rounded-full bg-green-500 border-2 border-white"></div>
                        </div>
                        <div class="flex-1 min-w-0">
                            <h3 class="font-semibold text-slate-900 truncate group-hover:text-gaming-primary transition-colors">
                                Victory Royale Squad
                            </h3>
                            <p class="text-sm text-slate-600 line-clamp-2 leading-relaxed">
                                Fortnite battle royale community with squad matchmaking, custom games, and weekly tournaments for all skill levels.
                            </p>
                        </div>
                    </div>

                    <!-- Stats -->
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-4 text-sm text-slate-500">
                            <div class="flex items-center gap-1.5">
                                <div class="h-2 w-2 rounded-full bg-green-500"></div>
                                <span class="font-medium text-slate-700">2,156</span>
                                <span>online</span>
                            </div>
                            <div class="flex items-center gap-1.5">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                                </svg>
                                <span class="font-medium text-slate-700">31,205</span>
                                <span>members</span>
                            </div>
                        </div>
                        
                        <button class="inline-flex items-center gap-1.5 rounded-md gaming-gradient px-3 py-1.5 text-xs font-medium text-white transition-colors hover:opacity-90">
                            <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                            Join
                        </button>
                    </div>
                </div>
            </div>

            <!-- GTA Server Card -->
            <div class="group relative overflow-hidden rounded-lg border border-slate-200 bg-white card-shadow transition-smooth hover:card-shadow-hover hover:-translate-y-0.5">
                <!-- Banner Image -->
                <div class="relative h-32 overflow-hidden">
                    <div class="h-full w-full bg-gradient-to-r from-orange-500 to-red-600"></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent"></div>
                    
                    <!-- Game Badge -->
                    <div class="absolute top-3 right-3 rounded-full bg-white/90 px-3 py-1 text-xs font-medium text-slate-700 backdrop-blur-sm">
                        GTA V
                    </div>
                </div>

                <!-- Content -->
                <div class="p-4">
                    <!-- Server Logo and Name -->
                    <div class="flex items-start gap-3 mb-3">
                        <div class="relative">
                            <div class="h-12 w-12 rounded-full border-2 border-slate-200 bg-gradient-to-r from-orange-500 to-red-600 flex items-center justify-center">
                                <span class="text-white font-bold text-sm">LS</span>
                            </div>
                            <div class="absolute -bottom-1 -right-1 h-4 w-4 rounded-full bg-green-500 border-2 border-white"></div>
                        </div>
                        <div class="flex-1 min-w-0">
                            <h3 class="font-semibold text-slate-900 truncate group-hover:text-gaming-primary transition-colors">
                                Los Santos Roleplay
                            </h3>
                            <p class="text-sm text-slate-600 line-clamp-2 leading-relaxed">
                                Serious GTA RP server with realistic gameplay, active police force, and immersive storylines. 18+ community only.
                            </p>
                        </div>
                    </div>

                    <!-- Stats -->
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-4 text-sm text-slate-500">
                            <div class="flex items-center gap-1.5">
                                <div class="h-2 w-2 rounded-full bg-green-500"></div>
                                <span class="font-medium text-slate-700">743</span>
                                <span>online</span>
                            </div>
                            <div class="flex items-center gap-1.5">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                                </svg>
                                <span class="font-medium text-slate-700">9,847</span>
                                <span>members</span>
                            </div>
                        </div>
                        
                        <button class="inline-flex items-center gap-1.5 rounded-md gaming-gradient px-3 py-1.5 text-xs font-medium text-white transition-colors hover:opacity-90">
                            <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                            Join
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>


          <section id="features" class="mx-auto max-w-7xl px-4 py-16 sm:px-6 md:py-24 lg:px-8">
        <h2 class="text-3xl font-bold tracking-tight sm:text-4xl">Built for gamers and communities</h2>
        <p class="mt-3 max-w-2xl text-slate-600">Everything you need to discover, join, and hang out with your crew.</p>
  
        <div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
          <article class="rounded-lg border border-slate-200 p-6 shadow-sm transition-transform duration-200 hover:-translate-y-0.5">
            <div class="text-slate-800">🎮</div>
            <h3 class="mt-4 text-xl font-semibold">Discover servers</h3>
            <p class="mt-2 text-slate-600">Powerful search and curated categories help you find the right fit fast.</p>
          </article>
          <article class="rounded-lg border border-slate-200 p-6 shadow-sm transition-transform duration-200 hover:-translate-y-0.5">
            <div class="text-slate-800">💬</div>
            <h3 class="mt-4 text-xl font-semibold">Crystal-clear chat</h3>
            <p class="mt-2 text-slate-600">Text, voice, and party channels built for seamless gaming.</p>
          </article>
          <article class="rounded-lg border border-slate-200 p-6 shadow-sm transition-transform duration-200 hover:-translate-y-0.5">
            <div class="text-slate-800">🛡️</div>
            <h3 class="mt-4 text-xl font-semibold">Safe & moderated</h3>
            <p class="mt-2 text-slate-600">Modern tools and controls keep your community welcoming.</p>
          </article>
        </div>
      </section>
