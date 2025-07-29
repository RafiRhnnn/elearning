<!-- Mobile menu button -->
<div class="sm:hidden fixed top-4 left-4 z-50">
    <button id="mobile-menu-btn" class="bg-green-600 text-white p-2 rounded-md shadow-lg">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
    </button>
</div>

<!-- Sidebar -->
<aside id="sidebar"
    class="w-72 h-screen bg-gradient-to-b from-green-700 to-green-500 shadow-xl
           fixed sm:sticky sm:top-0 inset-y-0 left-0 transform -translate-x-full sm:translate-x-0
           transition-transform duration-300 ease-in-out z-40 sm:block flex flex-col">
    <!-- Close button for mobile -->
    <div class="sm:hidden flex justify-end p-4">
        <button id="close-sidebar" class="text-white">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </div>

    <!-- Branding & Siswa Info -->
    <div class="p-6 border-b border-green-400 flex flex-col items-center">
        <img src="{{ asset('img/logo.png') }}" alt="Logo UTB" class="h-14 mb-2 rounded-full shadow-lg bg-white p-1">
        <h1 class="text-2xl font-extrabold text-white tracking-wide">Panel Siswa</h1>
        <div class="mt-4 flex flex-col items-center">
            <span class="mt-2 text-white font-semibold text-sm">{{ Auth::user()->name }}</span>
        </div>
    </div>

    <nav class="flex-1 p-4 overflow-y-auto">
        <ul class="space-y-2">
            <li>
                <a href="{{ route('siswa.dashboard') }}"
                    class="flex items-center gap-3 py-2 px-4 rounded-lg transition {{ request()->routeIs('siswa.dashboard') ? 'bg-white text-green-700 font-bold shadow' : 'text-white hover:bg-green-600/70' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0h6">
                        </path>
                    </svg>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('siswa.materi') }}"
                    class="flex items-center gap-3 py-2 px-4 rounded-lg transition {{ request()->routeIs('siswa.materi') ? 'bg-white text-green-700 font-bold shadow' : 'text-white hover:bg-green-600/70' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M12 20h9"></path>
                        <path d="M12 4v16m0 0H3"></path>
                    </svg>
                    Materi
                </a>
            </li>
            <li>
                <a href="{{ route('siswa.tugas') }}"
                    class="flex items-center gap-3 py-2 px-4 rounded-lg transition {{ request()->routeIs('siswa.tugas') ? 'bg-white text-green-700 font-bold shadow' : 'text-white hover:bg-green-600/70' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M9 17v-6a2 2 0 012-2h2a2 2 0 012 2v6"></path>
                        <path d="M7 17v-2a2 2 0 012-2h6a2 2 0 012 2v2"></path>
                    </svg>
                    Tugas
                </a>
            </li>
            {{-- <li>
                <a href="#"
                    class="flex items-center gap-3 py-2 px-4 rounded-lg transition text-white hover:bg-green-600/70">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M8 17v-1a4 4 0 014-4h0a4 4 0 014 4v1"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                    Absensi
                </a>
            </li> --}}
        </ul>
    </nav>

    <!-- Logout dan Footer di paling bawah (sekarang di dalam aside, gunakan mt-auto) -->
    <div class="mt-auto">
        <a href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
            class="flex items-center gap-3 py-2 px-4 rounded-lg text-red-200 hover:bg-red-100 hover:text-red-700 transition mb-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M17 16l4-4m0 0l-4-4m4 4H7"></path>
                <path d="M3 12a9 9 0 0118 0 9 9 0 01-18 0z"></path>
            </svg>
            Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
            @csrf
        </form>
        <div
            class="p-4 border-t border-green-400 text-xs text-white text-center bg-gradient-to-b from-green-700 to-green-500">
            &copy; {{ date('Y') }} E-Learning Kelompok 9.
        </div>
    </div>
</aside>

<!-- Overlay for mobile -->
<div id="sidebar-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-30 sm:hidden hidden"></div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const sidebar = document.getElementById('sidebar');
        const closeSidebar = document.getElementById('close-sidebar');
        const overlay = document.getElementById('sidebar-overlay');

        function openSidebar() {
            sidebar.classList.remove('-translate-x-full');
            overlay.classList.remove('hidden');
        }

        function closeSidebarMenu() {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
        }

        mobileMenuBtn?.addEventListener('click', openSidebar);
        closeSidebar?.addEventListener('click', closeSidebarMenu);
        overlay?.addEventListener('click', closeSidebarMenu);
    });
</script>
