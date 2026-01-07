<x-admin.layout :title="$title">

    <div class="flex justify-between items-center mt-10 mb-6">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Classroom List</h1>

        <button data-modal-target="addClassroomModal" data-modal-toggle="addClassroomModal"
            class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
            + Tambah Kelas
        </button>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">No</th>
                    <th scope="col" class="px-6 py-3">Nama Kelas</th>
                    <th scope="col" class="px-6 py-3">Siswa</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($classroom as $room)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4">{{ $loop->iteration }}</td>

                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                            {{ $room->name }}
                        </td>

                        <td class="px-6 py-4 text-gray-700 dark:text-gray-300">
                            @if ($room->students->count())
                                <ul class="list-disc list-inside">
                                    @foreach ($room->students as $student)
                                        <li>{{ $student->name }}</li>
                                    @endforeach
                                </ul>
                            @else
                                <span class="text-gray-400 italic">Belum ada siswa</span>
                            @endif
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>


    <div id="addClassroomModal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full inset-0 h-full">

        <div class="relative p-4 w-full max-w-md">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">

                <div class="flex items-center justify-between p-4 border-b dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Add Classroom
                    </h3>
                    <button type="button" class="text-gray-400 hover:text-gray-900 dark:hover:text-white"
                        data-modal-hide="addClassroomModal">
                        ✕
                    </button>
                </div>

                <form action="{{ route('admin.classroom.store') }}" method="POST" class="p-4">
                    @csrf

                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">
                            Classroom Name
                        </label>
                        <input type="text" name="name" required
                            class="w-full px-3 py-2 border rounded-lg dark:bg-gray-800 dark:text-white">
                    </div>

                    <button type="submit"
                        class="w-full py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                        Save
                    </button>
                </form>

            </div>
        </div>
    </div>

</x-admin.layout>