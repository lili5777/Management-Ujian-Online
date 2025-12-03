<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.05);
        }

        ::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 3px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        /* Smooth transitions */
        * {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Mobile menu animation */
        @keyframes slideIn {
            from {
                transform: translateX(-100%);
            }

            to {
                transform: translateX(0);
            }
        }

        .sidebar-open {
            animation: slideIn 0.3s ease-out;
        }
    </style>
</head>

<body class="bg-gradient-to-br from-gray-50 to-gray-100">
    <!-- Mobile Menu Button -->
    <button id="mobile-menu-btn"
        class="lg:hidden fixed top-4 left-4 z-50 p-2 bg-white rounded-lg shadow-lg hover:shadow-xl">
        <svg class="w-6 h-6 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>

    <!-- Overlay for mobile -->
    <div id="sidebar-overlay" class="lg:hidden hidden fixed inset-0 bg-black/50 z-40"></div>

    <!-- Main Container -->
    <div class="min-h-screen flex">
        <!-- Sidebar (Updated with scrollable navigation) -->
        <aside id="sidebar"
            class="w-64 bg-gradient-to-b from-gray-900 via-gray-800 to-gray-900 text-white fixed inset-y-0 left-0 z-40 transform -translate-x-full lg:translate-x-0 shadow-2xl flex flex-col h-screen">

            <!-- Logo Section -->
            <div class="p-6 border-b border-white/10 relative flex-shrink-0">
                <div class="flex items-center space-x-3">
                    <div
                        class="w-10 h-10 bg-gradient-to-br from-amber-500 to-amber-600 rounded-lg flex items-center justify-center shadow-lg">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 14l9-5-9-5-9 5 9 5z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <h2
                            class="text-xl font-bold bg-gradient-to-r from-amber-400 to-amber-300 bg-clip-text text-transparent">
                            Headstart
                        </h2>
                        <p class="text-xs text-gray-400">Admin Panel</p>
                    </div>
                </div>

                <!-- Close button for mobile -->
                <button id="close-sidebar" class="lg:hidden absolute top-6 right-6 text-gray-400 hover:text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- User Profile Section -->
            <div class="p-6 border-b border-white/10 flex-shrink-0">
                <div class="flex items-center space-x-3">
                    <div
                        class="w-12 h-12 bg-gradient-to-br from-amber-500 to-amber-600 rounded-full flex items-center justify-center text-white font-bold text-lg shadow-lg ring-4 ring-amber-500/20">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-semibold text-white truncate">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-gray-400 capitalize">{{ Auth::user()->level }}</p>
                    </div>
                </div>
            </div>

            <!-- Navigation (Scrollable area) -->
            <nav class="flex-1 p-4 space-y-2 overflow-y-auto overscroll-contain">
                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider px-3 mb-3">Menu Utama</p>

                <a href="{{ route('masuk') }}"
                    class="flex items-center space-x-3 px-4 py-3 rounded-xl hover:bg-white/10 group {{ request()->routeIs('masuk') ? 'bg-amber-600 shadow-lg shadow-amber-600/50' : '' }}">
                    <svg class="w-5 h-5 {{ request()->routeIs('masuk') ? 'text-white' : 'text-gray-400 group-hover:text-amber-400' }}"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span
                        class="font-medium {{ request()->routeIs('masuk') ? 'text-white' : 'text-gray-300' }}">Dashboard</span>
                </a>

                @if (Auth::user()->level == 'admin')
                    <a href="{{ route('dataguru') }}"
                        class="flex items-center space-x-3 px-4 py-3 rounded-xl hover:bg-white/10 group {{ request()->routeIs('dataguru') ? 'bg-amber-600 shadow-lg shadow-amber-600/50' : '' }}">
                        <svg class="w-5 h-5 {{ request()->routeIs('dataguru') ? 'text-white' : 'text-gray-400 group-hover:text-amber-400' }}"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        <span class="font-medium {{ request()->routeIs('dataguru') ? 'text-white' : 'text-gray-300' }}">Data
                            Guru</span>
                    </a>
                @endif

                @if (Auth::user()->level == 'admin' || Auth::user()->level == 'guru')
                    <a href="{{ route('datasiswa') }}"
                        class="flex items-center space-x-3 px-4 py-3 rounded-xl hover:bg-white/10 group {{ request()->routeIs('datasiswa') ? 'bg-amber-600 shadow-lg shadow-amber-600/50' : '' }}">
                        <svg class="w-5 h-5 {{ request()->routeIs('datasiswa') ? 'text-white' : 'text-gray-400 group-hover:text-amber-400' }}"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        <span
                            class="font-medium {{ request()->routeIs('datasiswa') ? 'text-white' : 'text-gray-300' }}">Data
                            Siswa</span>
                    </a>
                @endif

                @if (Auth::user()->level == 'admin' || Auth::user()->level == 'guru' || Auth::user()->level == 'siswa')
                    <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider px-3 mb-3 mt-6">Akademik</p>

                    <a href="{{ route('datamapel') }}"
                        class="flex items-center space-x-3 px-4 py-3 rounded-xl hover:bg-white/10 group {{ request()->routeIs('datamapel') ? 'bg-amber-600 shadow-lg shadow-amber-600/50' : '' }}">
                        <svg class="w-5 h-5 {{ request()->routeIs('datamapel') ? 'text-white' : 'text-gray-400 group-hover:text-amber-400' }}"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                        <span
                            class="font-medium {{ request()->routeIs('datamapel') ? 'text-white' : 'text-gray-300' }}">Data
                            Mapel</span>
                    </a>

                    <a href="{{ route('showRoomKelas') }}"
                        class="flex items-center space-x-3 px-4 py-3 rounded-xl hover:bg-white/10 group">
                        <svg class="w-5 h-5 text-gray-400 group-hover:text-amber-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                        <span class="font-medium text-gray-300">Kelas</span>
                    </a>
                @endif
            </nav>

            <!-- Logout Button -->
            <div class="p-4 border-t border-white/10 flex-shrink-0">
                <a href="{{ route('logout') }}"
                    class="flex items-center space-x-3 px-4 py-3 rounded-xl bg-red-500/10 hover:bg-red-500 group">
                    <svg class="w-5 h-5 text-red-400 group-hover:text-white" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    <span class="font-medium text-red-400 group-hover:text-white">Log Out</span>
                </a>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 lg:ml-64">
            @yield('content')
        </div>
    </div>

    <script>
        // Mobile menu toggle
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebar-overlay');
        const closeSidebar = document.getElementById('close-sidebar');

        function openSidebar() {
            sidebar.classList.remove('-translate-x-full');
            sidebar.classList.add('sidebar-open');
            overlay.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeSidebarFunc() {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
            document.body.style.overflow = '';
        }

        mobileMenuBtn.addEventListener('click', openSidebar);
        closeSidebar.addEventListener('click', closeSidebarFunc);
        overlay.addEventListener('click', closeSidebarFunc);

        // Close sidebar on escape key
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') {
                closeSidebarFunc();
            }
        });

        // Auto close on mobile when resizing to desktop
        window.addEventListener('resize', function () {
            if (window.innerWidth >= 1024) {
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.add('hidden');
                document.body.style.overflow = '';
            } else {
                sidebar.classList.add('-translate-x-full');
            }
        });
    </script>
</body>

</html>