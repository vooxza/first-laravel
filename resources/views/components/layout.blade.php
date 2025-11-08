<div>
    <!DOCTYPE html>
    <html lang="en" class="h-full bg-gray-900">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        @vite('resources/css/app.css')
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
        <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>
    </head>
    <body class="h-full">
        <div class="min-h-full">
          <x-navbar></x-navbar>
          <x-header>{{ $judul ?? 'Home' }}</x-header>
<main class="flex-1 max-w-7xl mx-auto w-full px-6 pt-4 pb-8">
    {{ $slot }}
</main>
        </div>
    </body>
    </html>
</div>