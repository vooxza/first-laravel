@extends('admin.components.layout')

    @section('content')
    <x-slot:judul>{{ $title }} </x-slot:judul>
    <main class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <p class="text-gray-200">Welcome to Home page.</p>
    </main>
@endsection
