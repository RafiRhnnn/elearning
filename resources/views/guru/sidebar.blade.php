<!-- Mobile menu button -->
<div class="sm:hidden fixed top-4 left-4 z-50">
    <button id="mobile-menu-btn" class="bg-green-600 text-white p-2 rounded-md">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
    </button>
</div>

<!-- Sidebar -->
<aside id="sidebar"
    class="w-64 bg-white shadow-md fixed sm:relative inset-y-0 left-0 transform -translate-x-full sm:translate-x-0 transition-transform duration-300 ease-in-out z-40 sm:block">
    <!-- Close button for mobile -->
    <div class="sm:hidden flex justify-end p-4">
        <button id="close-sidebar" class="text-gray-600">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </div>

    <div class="p-6 border-b border-gray-200">
        <img src="{{ asset('img/logo.png') }}" alt="Logo UTB" class="h-10 mx-auto mb-2">
        <h1 class="text-xl font-bold text-center text-green-700">Panel Guru</h1>
        <p class="text-sm text-center text-gray-600 mt-1">{{ Auth::user()->name }}</p>
    </div>
    <nav class="p-4">
        <ul class="space-y-2">
            <li>
                <a href="{{ route('guru.dashboard') }}"
                    class="block py-2 px-4 rounded hover:bg-green-100 {{ request()->routeIs('guru.dashboard') ? 'bg-green-100 text-green-700 font-semibold' : 'text-gray-700' }}">
                    Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('guru.pengumpulan.index') }}"
                    class="block py-2 px-4 rounded hover:bg-green-100 {{ request()->routeIs('guru.pengumpulan.*') ? 'bg-green-100 text-green-700 font-semibold' : 'text-gray-700' }}">
                    📋 Pengumpulan Tugas
                </a>
            </li>
            <li>
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    class="block py-2 px-4 rounded text-red-600 hover:bg-red-100">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
            </li>
        </ul>
    </nav>
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
