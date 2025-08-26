<nav x-data="{ open: false, showNotifications: false }"
     class="bg-gradient-to-r from-slate-900 via-blue-900 to-slate-900 backdrop-blur-xl border-b border-blue-800/30 shadow-2xl sticky top-0 z-50">

    <!-- Main Navigation Container -->
    <div class="max-w-7xl mx-auto">
        <div class="flex justify-between h-16 lg:h-20">

            <!-- Left Section: Logo + Desktop Navigation -->
            <div class="flex items-center">
                <!-- Enhanced Logo -->
                <div class="flex-shrink-0 px-4 lg:px-6">
                    <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 group">
                        <div class="relative">
                            <div class="w-10 h-10 lg:w-12 lg:h-12 bg-gradient-to-br from-blue-400 to-blue-600 rounded-2xl shadow-lg group-hover:shadow-blue-500/25 transition-all duration-300 group-hover:scale-105 flex items-center justify-center">
                                <svg class="w-6 h-6 lg:w-7 lg:h-7 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
                                </svg>
                            </div>
                            <div class="absolute -top-1 -right-1 w-4 h-4 bg-green-400 rounded-full border-2 border-slate-900 animate-pulse"></div>
                        </div>
                        <div class="hidden sm:block">
                            <div class="text-white font-bold text-xl lg:text-2xl group-hover:text-blue-300 transition-colors duration-200">
                                Movers<span class="text-blue-400">Laredo</span>
                            </div>
                            <div class="text-blue-300/80 text-xs lg:text-sm font-medium">Admin Dashboard</div>
                        </div>
                    </a>
                </div>

                <!-- Desktop Navigation Links -->
                <div class="hidden lg:flex lg:items-center lg:space-x-2 lg:ml-8">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                               class="nav-item-modern group">
                        <div class="flex items-center space-x-2">
                            <div class="p-1.5 bg-blue-500/20 rounded-lg group-hover:bg-blue-500/30 transition-all duration-200">
                                <svg class="w-5 h-5 text-blue-300 group-hover:text-white transition-colors duration-200" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-9 9a1 1 0 001.414 1.414L2 12.414V17a1 1 0 001 1h14a1 1 0 001-1v-4.586l.293.293a1 1 0 001.414-1.414l-9-9z"/>
                                </svg>
                            </div>
                            <span class="text-white/90 group-hover:text-white font-medium">{{ __('Dashboard') }}</span>
                        </div>
                    </x-nav-link>

                    @if(Route::has('admin.invoices.index'))
                    <x-nav-link :href="route('admin.invoices.index')" :active="request()->routeIs('admin.invoices.*')"
                               class="nav-item-modern group">
                        <div class="flex items-center space-x-2">
                            <div class="p-1.5 bg-blue-500/20 rounded-lg group-hover:bg-blue-500/30 transition-all duration-200">
                                <svg class="w-5 h-5 text-blue-300 group-hover:text-white transition-colors duration-200" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 110 2h-3a1 1 0 01-1-1v-2a1 1 0 00-1-1H9a1 1 0 00-1 1v2a1 1 0 01-1 1H4a1 1 0 110-2V4zm3 1h2v2H7V5zm2 4H7v2h2V9zm2-4h2v2h-2V5zm2 4h-2v2h2V9z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <span class="text-white/90 group-hover:text-white font-medium">{{ __('Invoices') }}</span>
                        </div>
                    </x-nav-link>
                    @endif

                    <x-nav-link :href="route('quote')"
                               class="nav-item-modern group">
                        <div class="flex items-center space-x-2">
                            <div class="p-1.5 bg-blue-500/20 rounded-lg group-hover:bg-blue-500/30 transition-all duration-200">
                                <svg class="w-5 h-5 text-blue-300 group-hover:text-white transition-colors duration-200" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <span class="text-white/90 group-hover:text-white font-medium">{{ __('Quotes') }}</span>
                        </div>
                    </x-nav-link>

                    <a href="{{ route('home') }}" target="_blank"
                       class="nav-item-modern group">
                        <div class="flex items-center space-x-2">
                            <div class="p-1.5 bg-blue-500/20 rounded-lg group-hover:bg-blue-500/30 transition-all duration-200">
                                <svg class="w-5 h-5 text-blue-300 group-hover:text-white transition-colors duration-200" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <span class="text-white/90 group-hover:text-white font-medium">{{ __('View Site') }}</span>
                        </div>
                    </a>
                </div>
            </div>
                                    <!-- Right Section: Actions + User Menu -->
            <div class="flex items-center space-x-3 lg:space-x-4 px-4 lg:px-6">

                <!-- Quick Actions (Desktop only) -->
                <div class="hidden lg:flex items-center space-x-2">
                    <button class="relative p-2 text-white/70 hover:text-white hover:bg-white/10 rounded-xl transition-all duration-200 group">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"/>
                        </svg>
                        <span class="sr-only">Quick Add</span>
                    </button>
                </div>

                <!-- Notifications -->
                <div class="relative">
                    <button @click="showNotifications = !showNotifications"
                            class="relative p-2.5 text-white/70 hover:text-white hover:bg-white/10 rounded-xl transition-all duration-200 group">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"/>
                        </svg>
                        <span class="absolute top-1 right-1 w-3 h-3 bg-red-500 rounded-full border border-slate-900 animate-pulse"></span>
                    </button>

                    <!-- Enhanced Notifications Dropdown -->
                    <div x-show="showNotifications"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 scale-95 translate-y-2"
                         x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                         x-transition:leave-end="opacity-0 scale-95 translate-y-2"
                         @click.away="showNotifications = false"
                         class="absolute right-0 mt-3 w-80 lg:w-96 bg-white/95 backdrop-blur-xl rounded-2xl shadow-2xl border border-gray-200/50 z-50 overflow-hidden">

                        <div class="p-4 bg-gradient-to-r from-blue-50 to-indigo-50 border-b border-gray-200/50">
                            <div class="flex items-center justify-between">
                                <h3 class="text-lg font-semibold text-gray-900">Notifications</h3>
                                <span class="px-2 py-1 text-xs font-medium bg-blue-100 text-blue-800 rounded-full">3 new</span>
                            </div>
                        </div>

                        <div class="max-h-80 overflow-y-auto">
                            <div class="p-3 hover:bg-blue-50/50 border-b border-gray-100/50 cursor-pointer transition-colors duration-200">
                                <div class="flex items-start space-x-3">
                                    <div class="flex-shrink-0 mt-1">
                                        <div class="w-2 h-2 bg-blue-500 rounded-full animate-pulse"></div>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-medium text-gray-900">New quote request received</p>
                                        <p class="text-sm text-gray-600 truncate">From John Doe - Laredo to Austin move</p>
                                        <p class="text-xs text-gray-400 mt-1">2 minutes ago</p>
                                    </div>
                                </div>
                            </div>

                            <div class="p-3 hover:bg-green-50/50 border-b border-gray-100/50 cursor-pointer transition-colors duration-200">
                                <div class="flex items-start space-x-3">
                                    <div class="flex-shrink-0 mt-1">
                                        <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-medium text-gray-900">Payment received</p>
                                        <p class="text-sm text-gray-600 truncate">Invoice #INV-001 has been paid - $1,250.00</p>
                                        <p class="text-xs text-gray-400 mt-1">1 hour ago</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="p-3 bg-gray-50/50 border-t border-gray-200/50">
                            <a href="#" class="block text-center text-sm text-blue-600 hover:text-blue-800 font-medium transition-colors duration-200">
                                View all notifications
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Enhanced User Menu -->
                <x-dropdown align="right" width="64">
                    <x-slot name="trigger">
                        <button class="flex items-center space-x-3 px-3 py-2 bg-white/10 hover:bg-white/20 rounded-2xl transition-all duration-200 border border-white/20 hover:border-white/30 group">
                            <div class="w-8 h-8 lg:w-10 lg:h-10 bg-gradient-to-br from-blue-400 to-blue-600 rounded-xl flex items-center justify-center shadow-lg">
                                <span class="text-white font-semibold text-sm lg:text-base">
                                    {{ substr(Auth::user()->name, 0, 1) }}
                                </span>
                            </div>
                            <div class="hidden sm:block text-left">
                                <div class="text-white font-medium text-sm lg:text-base truncate max-w-32">{{ Auth::user()->name }}</div>
                                <div class="text-blue-300/80 text-xs">Administrator</div>
                            </div>
                            <svg class="w-4 h-4 text-white/70 group-hover:text-white transition-colors duration-200" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="bg-white/95 backdrop-blur-xl rounded-2xl shadow-2xl border border-gray-200/50 overflow-hidden">
                            <!-- User Info Header -->
                            <div class="px-6 py-4 bg-gradient-to-r from-blue-50 to-indigo-50 border-b border-gray-200/50">
                                <div class="flex items-center space-x-4">
                                    <div class="w-12 h-12 bg-gradient-to-br from-blue-400 to-blue-600 rounded-xl flex items-center justify-center shadow-lg">
                                        <span class="text-white font-bold text-lg">{{ substr(Auth::user()->name, 0, 1) }}</span>
                                    </div>
                                    <div>
                                        <p class="text-lg font-semibold text-gray-900">{{ Auth::user()->name }}</p>
                                        <p class="text-sm text-gray-600">{{ Auth::user()->email }}</p>
                                        <p class="text-xs text-blue-600 font-medium">System Administrator</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Menu Items -->
                            <div class="py-2">
                                <x-dropdown-link :href="route('profile.edit')"
                                               class="flex items-center px-6 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-all duration-200 group">
                                    <div class="p-2 bg-gray-100 group-hover:bg-blue-100 rounded-lg mr-3 transition-colors duration-200">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="font-medium">{{ __('Profile Settings') }}</div>
                                        <div class="text-xs text-gray-500">Manage your account</div>
                                    </div>
                                </x-dropdown-link>

                                <div class="mx-6 my-2 border-t border-gray-200"></div>

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')"
                                                   onclick="event.preventDefault(); this.closest('form').submit();"
                                                   class="flex items-center px-6 py-3 text-red-600 hover:bg-red-50 hover:text-red-700 transition-all duration-200 group">
                                        <div class="p-2 bg-red-100 group-hover:bg-red-200 rounded-lg mr-3 transition-colors duration-200">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <div class="font-medium">{{ __('Sign Out') }}</div>
                                            <div class="text-xs text-red-400">End your session</div>
                                        </div>
                                    </x-dropdown-link>
                                </form>
                            </div>
                        </div>
                    </x-slot>
                </x-dropdown>

                <!-- Mobile Menu Button -->
                <button @click="open = !open"
                        class="lg:hidden p-2.5 text-white/70 hover:text-white hover:bg-white/10 rounded-xl transition-all duration-200">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': !open }"
                              class="inline-flex"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': !open, 'inline-flex': open }"
                              class="hidden"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Revolutionary Mobile Menu -->
    <div :class="{'translate-x-0': open, 'translate-x-full': !open}"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="translate-x-full"
         x-transition:enter-end="translate-x-0"
         x-transition:leave="transition ease-in duration-250"
         x-transition:leave-start="translate-x-0"
         x-transition:leave-end="translate-x-full"
         class="lg:hidden fixed inset-y-0 right-0 w-80 bg-gradient-to-b from-slate-900 via-blue-900 to-slate-900 backdrop-blur-xl shadow-2xl z-50 transform translate-x-full">

        <!-- Mobile Menu Header -->
        <div class="p-6 border-b border-white/10">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-400 to-blue-600 rounded-2xl shadow-lg flex items-center justify-center">
                        <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
                        </svg>
                    </div>
                    <div>
                        <div class="text-white font-bold text-xl">Movers<span class="text-blue-400">Laredo</span></div>
                        <div class="text-blue-300/80 text-sm">Admin Panel</div>
                    </div>
                </div>
                <button @click="open = false" class="p-2 text-white/70 hover:text-white hover:bg-white/10 rounded-xl transition-all duration-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Navigation Items -->
        <div class="p-6 space-y-3 flex-1 overflow-y-auto">
            <!-- Dashboard -->
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                                  class="mobile-nav-item group" @click="open = false">
                <div class="flex items-center space-x-4 p-4 rounded-2xl bg-white/5 group-hover:bg-white/10 border border-white/10 group-hover:border-white/20 transition-all duration-300">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-500/20 to-blue-600/20 rounded-xl flex items-center justify-center group-hover:from-blue-500/30 group-hover:to-blue-600/30 transition-all duration-300">
                        <svg class="w-6 h-6 text-blue-400 group-hover:text-blue-300 transition-colors duration-300" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-9 9a1 1 0 001.414 1.414L2 12.414V17a1 1 0 001 1h14a1 1 0 001-1v-4.586l.293.293a1 1 0 001.414-1.414l-9-9z"/>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <div class="text-white font-semibold text-lg group-hover:text-blue-300 transition-colors duration-300">{{ __('Dashboard') }}</div>
                        <div class="text-white/60 text-sm">Overview & analytics</div>
                    </div>
                    <div class="w-2 h-2 bg-green-400 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </div>
            </x-responsive-nav-link>

            @if(Route::has('admin.invoices.index'))
            <!-- Invoices -->
            <x-responsive-nav-link :href="route('admin.invoices.index')" :active="request()->routeIs('admin.invoices.*')"
                                  class="mobile-nav-item group" @click="open = false">
                <div class="flex items-center space-x-4 p-4 rounded-2xl bg-white/5 group-hover:bg-white/10 border border-white/10 group-hover:border-white/20 transition-all duration-300">
                    <div class="w-12 h-12 bg-gradient-to-br from-purple-500/20 to-purple-600/20 rounded-xl flex items-center justify-center group-hover:from-purple-500/30 group-hover:to-purple-600/30 transition-all duration-300">
                        <svg class="w-6 h-6 text-purple-400 group-hover:text-purple-300 transition-colors duration-300" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 110 2h-3a1 1 0 01-1-1v-2a1 1 0 00-1-1H9a1 1 0 00-1 1v2a1 1 0 01-1 1H4a1 1 0 110-2V4zm3 1h2v2H7V5zm2 4H7v2h2V9zm2-4h2v2h-2V5zm2 4h-2v2h2V9z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <div class="text-white font-semibold text-lg group-hover:text-purple-300 transition-colors duration-300">{{ __('Invoices') }}</div>
                        <div class="text-white/60 text-sm">Billing & payments</div>
                    </div>
                    <div class="w-2 h-2 bg-green-400 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </div>
            </x-responsive-nav-link>
            @endif

            <!-- Quotes -->
            <x-responsive-nav-link :href="route('quote')"
                                  class="mobile-nav-item group" @click="open = false">
                <div class="flex items-center space-x-4 p-4 rounded-2xl bg-white/5 group-hover:bg-white/10 border border-white/10 group-hover:border-white/20 transition-all duration-300">
                    <div class="w-12 h-12 bg-gradient-to-br from-green-500/20 to-green-600/20 rounded-xl flex items-center justify-center group-hover:from-green-500/30 group-hover:to-green-600/30 transition-all duration-300">
                        <svg class="w-6 h-6 text-green-400 group-hover:text-green-300 transition-colors duration-300" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <div class="text-white font-semibold text-lg group-hover:text-green-300 transition-colors duration-300">{{ __('Quotes') }}</div>
                        <div class="text-white/60 text-sm">Customer requests</div>
                    </div>
                    <div class="w-2 h-2 bg-green-400 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </div>
            </x-responsive-nav-link>

            <!-- View Site -->
            <a href="{{ route('home') }}" target="_blank"
               class="mobile-nav-item group block" @click="open = false">
                <div class="flex items-center space-x-4 p-4 rounded-2xl bg-white/5 group-hover:bg-white/10 border border-white/10 group-hover:border-white/20 transition-all duration-300">
                    <div class="w-12 h-12 bg-gradient-to-br from-orange-500/20 to-orange-600/20 rounded-xl flex items-center justify-center group-hover:from-orange-500/30 group-hover:to-orange-600/30 transition-all duration-300">
                        <svg class="w-6 h-6 text-orange-400 group-hover:text-orange-300 transition-colors duration-300" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <div class="text-white font-semibold text-lg group-hover:text-orange-300 transition-colors duration-300">{{ __('View Site') }}</div>
                        <div class="text-white/60 text-sm">Visit frontend</div>
                    </div>
                    <svg class="w-5 h-5 text-white/40 group-hover:text-white/60 transition-colors duration-300" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                    </svg>
                </div>
            </a>
        </div>

        <!-- Mobile User Section -->
        <div class="p-6 border-t border-white/10 bg-gradient-to-r from-slate-800/50 to-blue-800/50">
            <div class="flex items-center space-x-4 mb-4">
                <div class="w-14 h-14 bg-gradient-to-br from-blue-400 to-blue-600 rounded-2xl flex items-center justify-center shadow-xl">
                    <span class="text-white font-bold text-xl">{{ substr(Auth::user()->name, 0, 1) }}</span>
                </div>
                <div class="flex-1">
                    <div class="text-white font-semibold text-lg">{{ Auth::user()->name }}</div>
                    <div class="text-blue-300/80 text-sm">{{ Auth::user()->email }}</div>
                    <div class="text-blue-400 text-xs font-medium mt-1">System Administrator</div>
                </div>
            </div>

            <div class="space-y-2">
                <x-responsive-nav-link :href="route('profile.edit')"
                                      class="block" @click="open = false">
                    <div class="flex items-center space-x-3 p-3 rounded-xl bg-white/5 hover:bg-white/10 border border-white/10 hover:border-white/20 transition-all duration-300 group">
                        <div class="p-2 bg-blue-500/20 rounded-lg group-hover:bg-blue-500/30 transition-colors duration-300">
                            <svg class="w-5 h-5 text-blue-400 group-hover:text-blue-300 transition-colors duration-300" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div>
                            <div class="text-white font-medium group-hover:text-blue-300 transition-colors duration-300">{{ __('Profile Settings') }}</div>
                            <div class="text-white/60 text-sm">Manage account</div>
                        </div>
                    </div>
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" onclick="event.preventDefault(); this.closest('form').submit();"
                            class="w-full">
                        <div class="flex items-center space-x-3 p-3 rounded-xl bg-red-500/10 hover:bg-red-500/20 border border-red-500/20 hover:border-red-500/30 transition-all duration-300 group">
                            <div class="p-2 bg-red-500/20 rounded-lg group-hover:bg-red-500/30 transition-colors duration-300">
                                <svg class="w-5 h-5 text-red-400 group-hover:text-red-300 transition-colors duration-300" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div>
                                <div class="text-red-300 font-medium group-hover:text-red-200 transition-colors duration-300">{{ __('Sign Out') }}</div>
                                <div class="text-red-400/60 text-sm">End session</div>
                            </div>
                        </div>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Mobile Menu Backdrop -->
    <div x-show="open"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-250"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         @click="open = false"
         class="lg:hidden fixed inset-0 bg-black/60 backdrop-blur-sm z-40"></div>
</nav>

<!-- Enhanced CSS Styles -->
<style>
    .nav-item-modern {
        @apply px-4 py-3 rounded-xl transition-all duration-300 border border-transparent hover:border-white/20 hover:bg-white/10 text-white/90 hover:text-white font-medium relative overflow-hidden;
    }

    .nav-item-modern::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.1), transparent);
        transition: left 0.6s;
    }

    .nav-item-modern:hover::before {
        left: 100%;
    }

    .mobile-nav-item {
        @apply block w-full transition-all duration-300;
    }

    /* Active state styles */
    .nav-item-modern[aria-current="page"] {
        @apply bg-white/15 border-white/30 text-white;
        box-shadow: 0 4px 20px rgba(59, 130, 246, 0.3);
    }

    .mobile-nav-item[aria-current="page"] .bg-white\/5 {
        @apply bg-blue-500/20 border-blue-400/30;
    }

    /* Enhanced animations */
    @keyframes slideInRight {
        from {
            transform: translateX(100%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }

    @keyframes fadeInScale {
        from {
            transform: scale(0.95);
            opacity: 0;
        }
        to {
            transform: scale(1);
            opacity: 1;
        }
    }

    /* Responsive adjustments */
    @media (max-width: 640px) {
        .nav-item-modern {
            @apply px-3 py-2 text-sm;
        }

        .mobile-nav-item .text-lg {
            @apply text-base;
        }
    }

    /* Accessibility improvements */
    .nav-item-modern:focus,
    .mobile-nav-item:focus {
        @apply outline-none ring-2 ring-blue-400 ring-offset-2 ring-offset-slate-900;
    }

    /* Smooth scrolling */
    @media (prefers-reduced-motion: no-preference) {
        .nav-item-modern,
        .mobile-nav-item {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
    }

    /* Performance optimizations */
    .nav-item-modern,
    .mobile-nav-item {
        will-change: transform, opacity;
    }
</style>
                    </div>
                    <div>
                        <div class="font-medium">{{ __('Quotes') }}</div>
                        <div class="text-sm text-blue-200">Customer requests</div>
                    </div>
                </div>
            </x-responsive-nav-link>

            <a href="{{ route('home') }}" target="_blank"
               class="mobile-nav-link group block">
                <div class="flex items-center space-x-3">
                    <div class="p-2 bg-blue-600 rounded-lg group-hover:bg-blue-500 transition-colors duration-200">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div>
                        <div class="font-medium">{{ __('View Site') }}</div>
                        <div class="text-sm text-blue-200">Visit frontend</div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Mobile User Section -->
        <div class="pt-4 pb-4 border-t border-blue-600 bg-blue-800">
            <div class="px-4 flex items-center space-x-3 mb-4">
                <div class="flex-shrink-0">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-400 to-blue-600 rounded-full flex items-center justify-center shadow-lg">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                </div>
                <div class="flex-1">
                    <div class="font-semibold text-white">{{ Auth::user()->name }}</div>
                    <div class="text-sm text-blue-200">{{ Auth::user()->email }}</div>
                    <div class="text-xs text-blue-300 mt-1">Administrator</div>
                </div>
            </div>

            <div class="px-4 space-y-2">
                <x-responsive-nav-link :href="route('profile.edit')"
                                      class="mobile-nav-link group">
                    <div class="flex items-center space-x-3">
                        <div class="p-2 bg-blue-600 rounded-lg group-hover:bg-blue-500 transition-colors duration-200">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div>
                            <div class="font-medium">{{ __('Profile Settings') }}</div>
                            <div class="text-sm text-blue-200">Manage account</div>
                        </div>
                    </div>
                </x-responsive-nav-link>

                <!-- Mobile Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" onclick="event.preventDefault(); this.closest('form').submit();"
                            class="w-full mobile-nav-link group">
                        <div class="flex items-center space-x-3">
                            <div class="p-2 bg-red-600 rounded-lg group-hover:bg-red-500 transition-colors duration-200">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div>
                                <div class="font-medium text-red-200">{{ __('Sign Out') }}</div>
                                <div class="text-sm text-red-300">End session</div>
                            </div>
                        </div>
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>

<!-- Enhanced CSS for Admin Navigation -->
<style>
    .nav-link-admin {
        @apply text-white hover:text-blue-100 hover:bg-blue-700 px-3 lg:px-4 py-2 lg:py-3 rounded-xl transition-all duration-200 border-2 border-transparent hover:border-blue-400 font-medium text-sm lg:text-base;
        position: relative;
        overflow: hidden;
    }

    .nav-link-admin::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.1), transparent);
        transition: left 0.5s;
    }

    .nav-link-admin:hover::before {
        left: 100%;
    }

    .mobile-nav-link {
        @apply text-white hover:text-blue-100 hover:bg-blue-700 px-4 py-3 rounded-xl transition-all duration-200 border border-transparent hover:border-blue-400 font-medium;
        background: rgba(59, 130, 246, 0.1);
        backdrop-filter: blur(10px);
    }

    /* Active state for navigation links */
    .nav-link-admin[aria-current="page"],
    .mobile-nav-link[aria-current="page"] {
        @apply bg-blue-600 border-blue-300 text-white;
        box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);
    }

    /* Responsive breakpoints */
    @media (max-width: 1024px) {
        .nav-link-admin span {
            display: none;
        }
    }

    @media (max-width: 640px) {
        .mobile-nav-link {
            margin-bottom: 0.5rem;
        }
    }

    /* Smooth scrolling for mobile menu */
    @media (prefers-reduced-motion: no-preference) {
        .nav-link-admin,
        .mobile-nav-link {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
    }

    /* Focus states for accessibility */
    .nav-link-admin:focus,
    .mobile-nav-link:focus {
        @apply outline-none ring-2 ring-blue-300 ring-offset-2 ring-offset-blue-600;
    }

    /* Animation for notification badge */
    @keyframes pulse {
        0%, 100% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.1);
        }
    }

    .notification-badge {
        animation: pulse 2s infinite;
    }
</style>
