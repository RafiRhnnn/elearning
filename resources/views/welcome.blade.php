<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Learning Platform</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>

<body class="bg-gray-100 text-gray-800">
    <header class="bg-white shadow">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-xl font-bold">E-Learning Platform</h1>
            <nav class="flex items-center space-x-4">
                @if (Route::has('login'))
                    @auth
                        @if (Auth::user()->role === 'guru')
                            <a href="{{ url('/guru/dashboard') }}" class="text-blue-500 hover:underline">Guru Dashboard</a>
                        @elseif (Auth::user()->role === 'admin')
                            <a href="{{ url('/admin/dashboard') }}" class="text-blue-500 hover:underline">Admin
                                Dashboard</a>
                        @elseif (Auth::user()->role === 'siswa')
                            <a href="{{ url('/siswa/dashboard') }}" class="text-blue-500 hover:underline">Siswa
                                Dashboard</a>
                        @else
                            <a href="{{ url('/dashboard') }}" class="text-blue-500 hover:underline">Dashboard</a>
                        @endif
                    @else
                        <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Register</a>
                        @endif
                    @endauth
                @endif
            </nav>
        </div>
    </header>

    <main class="container mx-auto px-4 py-8 min-h-screen">
        <section class="text-center">
            <h2 class="text-3xl font-bold mb-4">Welcome to Our E-Learning Platform</h2>
            <p class="text-lg mb-6">Learn anytime, anywhere with our comprehensive courses and resources.</p>
            <a href="{{ route('register') }}" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600">Get
                Started</a>
        </section>

        <section class="mt-12">
            <h3 class="text-2xl font-bold mb-4">Features</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white shadow rounded p-4">
                    <h4 class="text-xl font-bold mb-2">Interactive Courses</h4>
                    <p>Engage with interactive lessons designed to enhance your learning experience.</p>
                </div>
                <div class="bg-white shadow rounded p-4">
                    <h4 class="text-xl font-bold mb-2">Expert Instructors</h4>
                    <p>Learn from industry experts who are passionate about teaching.</p>
                </div>
                <div class="bg-white shadow rounded p-4">
                    <h4 class="text-xl font-bold mb-2">Flexible Learning</h4>
                    <p>Access courses at your own pace and schedule.</p>
                </div>
            </div>
        </section>
    </main>

    <footer class="bg-gray-800 text-white py-4">
        <div class="container mx-auto text-center">
            <p>&copy; {{ date('Y') }} E-Learning Platform. All rights reserved.</p>
        </div>
    </footer>
</body>

</html>
