@extends('admin.components.layout')

    @section('content')
    <x-slot:judul>{{ $title }} </x-slot:judul>
    <p class="text-3xl font-bold text-white">Nama: {{ $nama }}</p>
    <p class="text-3xl font-bold text-white">Kelas: {{ $kelas }}</p>
    <p class="text-3xl font-bold text-white">Sekolah: {{ $sekolah }}</p>
    @endsection