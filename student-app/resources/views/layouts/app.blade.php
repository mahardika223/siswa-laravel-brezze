<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Data Siswa</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-800">
    <nav class="bg-white border-b shadow-sm">
        <div class="max-w-7xl mx-auto px-4 py-3 flex items-center justify-between">
            <a href="/" class="font-semibold">StudentApp</a>
            <div class="space-x-4">
                <a href="{{ route('students.index') }}" class="text-sm">Data Siswa</a>
                @auth
                    <span class="text-sm">Halo, {{ auth()->user()->name }}</span>
                @endauth
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-4 py-6">
        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4">{{ session('success') }}</div>
        @endif
        @yield('content')
    </main>
</body>
</html>
