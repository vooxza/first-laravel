<x-admin.layout :title="$title">

    <div class="flex justify-between items-center mt-10 mb-6">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Student List</h1>

        <button data-modal-target="addStudentModal" data-modal-toggle="addStudentModal"
            class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5">
            + Tambah Student
        </button>
    </div>

    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th class="px-6 py-3">#</th>
                    <th class="px-6 py-3">Nama</th>
                    <th class="px-6 py-3">Email</th>
                    <th class="px-6 py-3">Alamat</th>
                    <th class="px-6 py-3">Kelas</th>
                    <th class="px-6 py-3">Tanggal Lahir</th>
                    <th class="px-6 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $i => $student)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">{{ $i + 1 }}</td>
                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">{{ $student->name }}</td>
                        <td class="px-6 py-4">{{ $student->email }}</td>
                        <td class="px-6 py-4">{{ $student->address }}</td>
                        <td class="px-6 py-4">{{ $student->classroom->name ?? '-' }}</td>
                        <td class="px-6 py-4">{{ $student->birthday }}</td>
                        <td class="px-6 py-4 text-center">
                            <div class="relative inline-block text-left">
                                <button type="button"
                                    class="inline-flex justify-center w-8 h-8 rounded-full hover:bg-gray-200 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    id="student-menu-button-{{ $student->id }}" aria-expanded="false" aria-haspopup="true"
                                    onclick="toggleStudentMenu('{{ $student->id }}')">
                                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path
                                            d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                                    </svg>
                                </button>

                                <div id="student-menu-{{ $student->id }}"
                                    class="hidden absolute right-0 z-10 mt-2 w-32 origin-top-right rounded-md bg-white dark:bg-gray-800 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                                    <div class="py-1" role="none">
                                        <button data-modal-target="editStudentModal{{ $student->id }}"
                                            data-modal-toggle="editStudentModal{{ $student->id }}"
                                            class="block w-full px-4 py-2 text-sm text-left text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700"
                                            role="menuitem">
                                            Edit
                                        </button>

                                        <form action="{{ route('admin.student.destroy', $student->id) }}" method="POST"
                                            class="inline w-full">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="block w-full px-4 py-2 text-sm text-left text-red-600 dark:text-red-400 hover:bg-gray-100 dark:hover:bg-gray-700"
                                                role="menuitem"
                                                onclick="return confirm('Are you sure you want to delete {{ $student->name }}?')">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>

                    {{-- EDIT MODAL --}}
                    <div id="editStudentModal{{ $student->id }}" tabindex="-1"
                        class="hidden fixed inset-0 z-50 flex justify-center items-center bg-black/50">
                        <div class="bg-white rounded-lg shadow dark:bg-gray-700 w-full max-w-md p-6">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Edit Student</h3>

                            <form action="{{ route('admin.student.update', $student->id) }}" method="POST"
                                class="space-y-4">
                                @csrf
                                @method('PUT')

                                <div>
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                                    <input type="text" name="name" value="{{ $student->name }}" required
                                        class="w-full p-2.5 border rounded-lg bg-gray-50 dark:bg-gray-600 dark:text-white" />
                                </div>

                                <div>
                                    <label
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                    <input type="email" name="email" value="{{ $student->email }}" required
                                        class="w-full p-2.5 border rounded-lg bg-gray-50 dark:bg-gray-600 dark:text-white" />
                                </div>

                                <div>
                                    <label
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                                    <input type="text" name="address" value="{{ $student->address }}" required
                                        class="w-full p-2.5 border rounded-lg bg-gray-50 dark:bg-gray-600 dark:text-white" />
                                </div>

                                <div>
                                    <label
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kelas</label>
                                    <select name="classroom_id" required
                                        class="w-full p-2.5 border rounded-lg bg-gray-50 dark:bg-gray-600 dark:text-white">
                                        @foreach ($classrooms as $classroom)
                                            <option value="{{ $classroom->id }}" {{ $student->classroom_id == $classroom->id ? 'selected' : '' }}>
                                                {{ $classroom->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                        Lahir</label>
                                    <input type="date" name="birthday" value="{{ $student->birthday }}" required
                                        class="w-full p-2.5 border rounded-lg bg-gray-50 dark:bg-gray-600 dark:text-white" />
                                </div>
                                
                                <div class="flex justify-end gap-2">
                                    <button type="button" data-modal-toggle="editStudentModal{{ $student->id }}"
                                        class="px-4 py-2 bg-gray-200 text-black rounded hover:bg-gray-300">Batal</button>
                                    <button type="submit"
                                        class="px-4 py-2 bg-blue-700 text-white rounded hover:bg-blue-800">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>

    <div id="addStudentModal" tabindex="-1" aria-hidden="true"
        class="hidden fixed inset-0 z-50 flex items-center justify-center w-full p-4 overflow-x-hidden overflow-y-auto bg-black/50">
        <div class="relative w-full max-w-md bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex items-center justify-between p-4 border-b dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Add New Student</h3>
                <button type="button" class="text-gray-400 hover:text-gray-900 dark:hover:text-white"
                    data-modal-toggle="addStudentModal">✕</button>
            </div>
            <form action="{{ route('admin.student.store') }}" method="POST" class="p-6 space-y-4">
                @csrf
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                    <input type="text" name="name" required
                        class="w-full p-2.5 border rounded-lg bg-gray-50 dark:bg-gray-600 dark:text-white">
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                    <input type="email" name="email" required
                        class="w-full p-2.5 border rounded-lg bg-gray-50 dark:bg-gray-600 dark:text-white">
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                    <input type="text" name="address" required
                        class="w-full p-2.5 border rounded-lg bg-gray-50 dark:bg-gray-600 dark:text-white">
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kelas</label>
                    <select name="classroom_id" required
                        class="w-full p-2.5 border rounded-lg bg-gray-50 dark:bg-gray-600 dark:text-white">
                        @foreach ($classrooms as $classroom)
                            <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Lahir</label>
                    <input type="date" name="birthday" required
                        class="w-full p-2.5 border rounded-lg bg-gray-50 dark:bg-gray-600 dark:text-white">
                </div>
                <button type="submit"
                    class="w-full py-2.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300">
                    Save
                </button>
            </form>
        </div>
    </div>

    <script>
        function toggleStudentMenu(studentId) {
            const menu = document.getElementById('student-menu-' + studentId);
            menu.classList.toggle('hidden');

            document.querySelectorAll('[id^="student-menu-"]').forEach(otherMenu => {
                if (otherMenu.id !== 'student-menu-' + studentId) {
                    otherMenu.classList.add('hidden');
                }
            });
        }

        document.addEventListener('click', function (event) {
            if (!event.target.closest('.relative.inline-block.text-left')) {
                document.querySelectorAll('[id^="student-menu-"]').forEach(menu => {
                    menu.classList.add('hidden');
                });
            }
        });
    </script>

</x-admin.layout>