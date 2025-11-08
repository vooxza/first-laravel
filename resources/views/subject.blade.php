<x-layout>
    <x-slot:judul>{{ $title }}</x-slot:judul>

    <div class="max-w-5xl mx-auto bg-gray-800/60 shadow-lg rounded-xl overflow-hidden mt-6 border border-gray-700/40">
        <table class="min-w-full divide-y divide-gray-700">
            <thead class="bg-gray-900/80">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">NO</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">Subject Name</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">Description</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">Teacher(s)</th>
                </tr>
            </thead>
            <tbody class="bg-gray-800/70 divide-y divide-gray-700 text-gray-200">
                @foreach ($subject as $index => $name)
                    <tr class="hover:bg-gray-700/60 transition duration-150">
                        <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $name["name"] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $name["description"] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            @foreach ($name->teachers as $teacher)
                                {{ $teacher->name }}<br>
                            @endforeach
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
