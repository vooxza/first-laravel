<x-layout>
    <x-slot:judul>{{ $title }} </x-slot:judul>

    <div class="w-full max-w-4xl mx-auto p-6 rounded-lg">
        <h1 class="text-2xl font-bold mb-4 text-center text-white">Student List</h1>

        <table class="w-full border border-gray-600 text-sm text-left text-white">
            <thead class="bg-slate-700/50">
                <tr>
                    <th class="border border-gray-600 px-4 py-2">No</th>
                    <th class="border border-gray-600 px-4 py-2">Name</th>
                    <th class="border border-gray-600 px-4 py-2">Email</th>
                    <th class="border border-gray-600 px-4 py-2">Address</th>
                    <th class="border border-gray-600 px-4 py-2">Kelas</th>
                    <th class="border border-gray-600 px-4 py-2">Birthday</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td class="border border-gray-600 px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="border border-gray-600 px-4 py-2">{{ $student->name }}</td>
                        <td class="border border-gray-600 px-4 py-2">{{ $student->email }}</td>
                        <td class="border border-gray-600 px-4 py-2">{{ $student->address }}</td>
                        <td class="border border-gray-600 px-4 py-2">{{ $student->classrooms->name }}</td>
                        <td class="border border-gray-600 px-4 py-2">{{ $student->birthday   }}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>