@extends('admin.components.layout')

    @section('content')
    <x-slot:judul>{{ $title }} </x-slot:judul>
    <p class="text-2xl font-bold text-white">Email: {{ $email }}</p>
    <p class="text-2xl font-bold text-white">Nomor: {{ $nomor }}</p>
    @endsection