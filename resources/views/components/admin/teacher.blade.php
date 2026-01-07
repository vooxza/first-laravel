<x-admin.layout :title="$title">

    <div class="flex justify-between items-center mt-10 mb-6">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Teacher List</h1>

        <button data-modal-target="addTeacherModal" data-modal-toggle="addTeacherModal"
            class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5">
            + Add Teacher
        </button>
    </div>

    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="mb-4 p-4 bg-red-100 border border-red-400 text-black rounded">
            {{ session('error') }}
        </div>
    @endif  

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">No</th>
                    <th scope="col" class="px-6 py-3">Nama</th>
                    <th scope="col" class="px-6 py-3">Mata Pelajaran</th>
                    <th scope="col" class="px-6 py-3">Telepon</th>
                    <th scope="col" class="px-6 py-3">Alamat</th>
                    <th scope="col" class="px-6 py-3 text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($teacher as $item)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4">{{ $loop->iteration }}</td>

                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                            {{ $item->name }}
                        </td>

                        <td class="px-6 py-4 text-gray-700 dark:text-gray-300">
                            {{ $item->subject->name ?? 'N/A' }}
                        </td>

                        <td class="px-6 py-4 text-gray-700 dark:text-gray-300">
                            {{ $item->phone }}
                        </td>

                        <td class="px-6 py-4 text-gray-700 dark:text-gray-300">
                            {{ $item->address }}
                        </td>

                        <td class="px-6 py-4 text-center">
                            <div class="relative inline-block text-left">
                                <button type="button" 
                                    class="inline-flex justify-center w-8 h-8 rounded-full hover:bg-gray-200 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    id="menu-button-{{ $item->id }}" 
                                    aria-expanded="false" 
                                    aria-haspopup="true"
                                    onclick="toggleMenu('{{ $item->id }}')">
                                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                                    </svg>
                                </button>
                                <div class="hidden absolute right-0 z-10 mt-2 w-40 origin-top-right rounded-md bg-white dark:bg-gray-700 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                    id="dropdown-menu-{{ $item->id }}" 
                                    role="menu" 
                                    aria-orientation="vertical" 
                                    tabindex="-1">
                                    <div class="py-1" role="none">
                                        <button 
                                            data-modal-target="editTeacherModal{{ $item->id }}"
                                            data-modal-toggle="editTeacherModal{{ $item->id }}"
                                            class="flex items-center w-full px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-600"
                                            role="menuitem">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                            Edit
                                        </button>
                                        
                                        <form action="{{ route('admin.teacher.destroy', $item->id) }}" method="POST" class="w-full">
                                            @csrf
                                            @method('DELETE')
                                            <button 
                                                type="submit"
                                                class="flex items-center w-full px-4 py-2 text-sm text-red-600 dark:text-red-400 hover:bg-gray-100 dark:hover:bg-gray-600"
                                                role="menuitem"
                                                onclick="return confirm('Are you sure you want to delete this teacher?')">
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <div id="editTeacherModal{{ $item->id }}" tabindex="-1" aria-hidden="true"
                        class="hidden fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/60">

                        <div class="w-full max-w-md bg-[#344156] rounded-lg shadow-lg p-6">

                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-lg font-semibold text-white">Edit Teacher</h3>
                                <button type="button" data-modal-hide="editTeacherModal{{ $item->id }}"
                                    class="text-white text-xl hover:text-gray-300">✕</button>
                            </div>

                            <form action="{{ route('admin.teacher.update', $item->id) }}" method="POST" class="space-y-4">
                                @csrf
                                @method('PUT')

                                <div>
                                    <label class="text-white text-sm">Name</label>
                                    <input type="text" name="name" value="{{ $item->name }}" required
                                        class="w-full px-3 py-2 bg-white border rounded text-black">
                                </div>

                                <div>
                                    <label class="text-white text-sm">Subject</label>
                                    <select name="subject_id" required class="w-full px-3 py-2 bg-white border rounded text-black">
                                        <option value="">-- Pilih Subject --</option>
                                        @foreach ($subject as $subj)
                                            <option value="{{ $subj->id }}" {{ $item->subject_id == $subj->id ? 'selected' : '' }}>{{ $subj->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <label class="text-white text-sm">Email</label>
                                    <input type="email" name="email" value="{{ $item->email }}" required
                                        class="w-full px-3 py-2 bg-white border rounded text-black">
                                </div>

                                <div>
                                    <label class="text-white text-sm">Phone</label>
                                    <input type="text" name="phone" value="{{ $item->phone }}" required
                                        class="w-full px-3 py-2 bg-white border rounded text-black">
                                </div>

                                <div>
                                    <label class="text-white text-sm">Address</label>
                                    <input type="text" name="address" value="{{ $item->address }}" required
                                        class="w-full px-3 py-2 bg-white border rounded text-black">
                                </div>

                                <div class="flex justify-end gap-2 pt-2">
                                    <button type="button" data-modal-hide="editTeacherModal{{ $item->id }}"
                                        class="px-4 py-2 bg-gray-200 text-black rounded hover:bg-gray-300">
                                        Cancel
                                    </button>

                                    <button type="submit"
                                        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                                        Update
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>

    <div id="addTeacherModal" tabindex="-1" aria-hidden="true"
        class="hidden fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/60">

        <div class="w-full max-w-md bg-[#344156] rounded-lg shadow-lg p-6">

            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold text-white">Add Teacher</h3>
                <button type="button" data-modal-hide="addTeacherModal"
                    class="text-white text-xl hover:text-gray-300">✕</button>
            </div>

            <form action="{{ route('admin.teacher.store') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label class="text-white text-sm">Name</label>
                    <input type="text" name="name" required
                        class="w-full px-3 py-2 bg-white border rounded text-black">
                </div>

                <div>
                    <label class="text-white text-sm">Subject</label>
                    <select name="subject_id" required class="w-full px-3 py-2 bg-white border rounded text-black">
                            <option value="">-- Pilih Subject --</option>
                                @foreach ($subject as $subj)
                            <option value="{{ $subj->id }}">{{ $subj->name }}</option>
                        @endforeach
                    </select>
                </div>


                <div>
                    <label class="text-white text-sm">Email</label>
                    <input type="email" name="email" required
                        class="w-full px-3 py-2 bg-white border rounded text-black">
                </div>

                <div>
                    <label class="text-white text-sm">Phone</label>
                    <input type="text" name="phone" required
                        class="w-full px-3 py-2 bg-white border rounded text-black">
                </div>

                <div>
                    <label class="text-white text-sm">Address</label>
                    <input type="text" name="address" required
                        class="w-full px-3 py-2 bg-white border rounded text-black">
                </div>

                <div class="flex justify-end gap-2 pt-2">
                    <button type="button" data-modal-hide="addTeacherModal"
                        class="px-4 py-2 bg-gray-200 text-black rounded hover:bg-gray-300">
                        Cancel
                    </button>

                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                        Save
                    </button>
                </div>

            </form>
        </div>
    </div>

    <script>
        function toggleMenu(id) {
            const menu = document.getElementById(`dropdown-menu-${id}`);
            menu.classList.toggle('hidden');
            
            document.querySelectorAll('[id^="dropdown-menu-"]').forEach(otherMenu => {
                if (otherMenu.id !== `dropdown-menu-${id}`) {
                    otherMenu.classList.add('hidden');
                }
            });
        }

        document.addEventListener('click', function(event) {
            if (!event.target.closest('.relative.inline-block.text-left')) {
                document.querySelectorAll('[id^="dropdown-menu-"]').forEach(menu => {
                    menu.classList.add('hidden');
                });
            }
        });
    </script>

</x-admin.layout>