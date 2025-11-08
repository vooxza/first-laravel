<x-layout>
    <x-slot:judul>{{ $title }}</x-slot:judul>

    <div class="flex items-center justify-center min-h-screen">
        <div class="text-center">
            <h1 class="text-3xl font-bold mb-6">Halo ini adalah tampilan Home</h1>
        </div>
    </div>

    <style>
        body {
            background-color: #0b1a2a;
            color: white;
            font-family: Arial, sans-serif;
        }
    </style>
</x-layout>