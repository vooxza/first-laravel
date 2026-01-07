<x-admin.layout :title="$title">
    <div class="flex justify-center items-center min-h-screen">
        <div class="bg-white dark:bg-gray-800 shadow-lg rounded-xl p-8 border border-gray-200 dark:border-gray-700 w-full max-w-md text-center">
            <!-- Isi profil -->
            <img class="w-24 h-24 rounded-full mx-auto mb-4 border-4 border-indigo-500"
                 src="https://i.pinimg.com/736x/35/19/1a/35191a7f65fe42bcb31dd84fa189663c.jpg"
                 alt="Foto Profil">
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Profil Diri</h1>
            <div class="text-left space-y-3">
                <div class="flex justify-between">
                    <span class="text-gray-600 dark:text-gray-300">Nama:</span>
                    <span class="font-semibold text-gray-900 dark:text-white">{{ $nama }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600 dark:text-gray-300">Kelas:</span>
                    <span class="font-semibold text-gray-900 dark:text-white">{{ $kelas }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600 dark:text-gray-300">Sekolah:</span>
                    <span class="font-semibold text-gray-900 dark:text-white">{{ $sekolah }}</span>
                </div>
            </div>
        </div>
    </div>
</x-admin.layout>