<x-layout>
    <x-slot:judul>{{ $title }} </x-slot:judul>

    <div class="w-full max-w-4xl mx-auto p-6 rounded-lg">
        <h1 class="text-2xl font-bold mb-4 text-center text-white">Guardian List</h1>

        <table class="w-full border border-gray-600 text-sm text-left text-white">
            <thead class="bg-slate-700/50">
                <tr>
                    <th class="border border-gray-600 px-4 py-2">No</th>
                    <th class="border border-gray-600 px-4 py-2">Name</th>
                    <th class="border border-gray-600 px-4 py-2">Job</th>
                    <th class="border border-gray-600 px-4 py-2">Phone</th>
                    <th class="border border-gray-600 px-4 py-2">Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($guardians as $guardian)
                    <tr>
                        <td class="border border-gray-600 px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="border border-gray-600 px-4 py-2">{{ $guardian["name"] }}</td>
                        <td class="border border-gray-600 px-4 py-2">{{ $guardian["job"] }}</td>
                        <td class="border border-gray-600 px-4 py-2">{{ $guardian["phone"] }}</td>
                        <td class="border border-gray-600 px-4 py-2">{{ $guardian["email"] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>