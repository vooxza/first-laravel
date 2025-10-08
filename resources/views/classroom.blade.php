<x-layout>
    <x-slot:judul>{{ $title }}</x-slot:judul>

    <div class="w-full max-w-4xl mx-auto p-6 rounded-lg">
        <h1 class="text-2xl font-bold mb-6 text-center text-white">Jumlah Siswa per Kelas</h1>

        <table class="w-full border border-gray-600 text-sm text-left text-white">
            <thead class="bg-slate-700/50">
                <tr>
                    <th class="border border-gray-600 px-4 py-2">No</th>
                    <th class="border border-gray-600 px-4 py-2">Nama Kelas</th>
                    <th class="border border-gray-600 px-4 py-2">Jumlah Siswa</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($classrooms->groupBy('name') as $className => $groupedClassrooms)
                    @php
                        $allStudents = $groupedClassrooms->flatMap(fn($class) => $class->students);
                    @endphp
                    <tr>
                        <td class="border border-gray-600 px-4 py-2 text-center">{{ $loop->iteration }}</td>
                        <td class="border border-gray-600 px-4 py-2 font-semibold ">{{ $className }}</td>
                        <td class="border border-gray-600 px-4 py-2">
                            <ul class="list-disc list-inside">
                                @foreach ($allStudents as $student)
                                    <li>{{ $student->name }}</li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
