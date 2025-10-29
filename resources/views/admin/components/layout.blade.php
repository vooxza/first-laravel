<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-gray-50 dark:bg-gray-900">

    {{-- Navbar --}}
    @include('admin.components.navbar')

    {{-- Sidebar --}}
    @include('admin.components.sidebar')

    {{-- Konten utama --}}
    <main class="p-4 md:ml-64 h-auto pt-20">
        @yield('content')
    </main>

</body>
</html>
