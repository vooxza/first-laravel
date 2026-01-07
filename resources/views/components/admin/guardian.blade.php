<x-admin.layout :title="$title">

    <div class="flex justify-between items-center mt-10 mb-6">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Guardian List</h1>

        <button data-modal-target="addGuardianModal" data-modal-toggle="addGuardianModal"
            class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 transition">
            + Add Guardian
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
                    <th scope="col" class="px-6 py-3">No</th>
                    <th scope="col" class="px-6 py-3">Nama</th>
                    <th scope="col" class="px-6 py-3">Pekerjaan</th>
                    <th scope="col" class="px-6 py-3">Email</th>
                    <th scope="col" class="px-6 py-3">Phone</th>
                    <th scope="col" class="px-6 py-3">Alamat</th>
                    <th scope="col" class="px-6 py-3 text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($guardian as $item)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">{{ $item->name }}</td>
                        <td class="px-6 py-4 text-gray-700 dark:text-gray-300">{{ $item->job }}</td>
                        <td class="px-6 py-4 text-gray-700 dark:text-gray-300">{{ $item->email }}</td>
                        <td class="px-6 py-4 text-gray-700 dark:text-gray-300">{{ $item->phone }}</td>
                        <td class="px-6 py-4 text-gray-700 dark:text-gray-300">{{ $item->address }}</td>

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
                                            data-modal-target="editGuardianModal-{{ $item->id }}"
                                            data-modal-toggle="editGuardianModal-{{ $item->id }}"
                                            class="flex items-center w-full px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-600"
                                            role="menuitem">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                            Edit
                                        </button>
                                        
                                        <form action="{{ route('admin.guardian.destroy', $item->id) }}" method="POST" class="w-full">
                                            @csrf
                                            @method('DELETE')
                                            <button 
                                                type="submit"
                                                class="flex items-center w-full px-4 py-2 text-sm text-red-600 dark:text-red-400 hover:bg-gray-100 dark:hover:bg-gray-600"
                                                role="menuitem"
                                                onclick="return confirm('Are you sure you want to delete this guardian?')">
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

                    <div id="editGuardianModal-{{ $item->id }}" tabindex="-1" aria-hidden="true"
                        class="hidden fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/60">

                        <div class="w-full max-w-md bg-[#344156] rounded-lg shadow-lg p-6">

                            <h2 class="text-xl font-semibold text-white mb-4">Edit Guardian</h2>

                            <form action="{{ route('admin.guardian.update', $item->id) }}" method="POST" class="space-y-4">
                                @csrf
                                @method('PUT')

                                <div>
                                    <label class="block mb-1 text-sm font-medium text-white">Name</label>
                                    <input type="text" name="name" value="{{ $item->name }}"
                                        class="w-full px-3 py-2 bg-white border rounded-md text-black" required>
                                </div>

                                <div>
                                    <label class="block mb-1 text-sm font-medium text-white">Job</label>
                                    <input type="text" name="job" value="{{ $item->job }}"
                                    class="w-full px-3 py-2 bg-white border rounded-md text-black" required>
                                </div>

                                <div>
                                    <label class="block mb-1 text-sm font-medium text-white">Email</label>
                                    <input type="email" name="email" value="{{ $item->email }}"
                                        class="w-full px-3 py-2 bg-white border rounded-md text-black" required>
                                </div>

                                <div>
                                    <label class="block mb-1 text-sm font-medium text-white">Phone</label>
                                    <input type="text" name="phone" value="{{ $item->phone }}"
                                        class="w-full px-3 py-2 bg-white border rounded-md text-black" required>
                                </div>

                                <div>
                                    <label class="block mb-1 text-sm font-medium text-white">Address</label>
                                    <textarea name="address" rows="3"
                                        class="w-full px-3 py-2 bg-white border rounded-md text-black"
                                        required>{{ $item->address }}</textarea>
                                </div>

                                <div class="flex justify-end gap-2 pt-2">

                                    <button type="button" data-modal-toggle="editGuardianModal-{{ $item->id }}"
                                        class="px-4 py-2 bg-gray-200 text-black rounded hover:bg-gray-300">
                                        Batal
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

    <div id="addGuardianModal" tabindex="-1" aria-hidden="true"
        class="hidden fixed inset-0 z-50 flex items-center justify-center w-full p-4 overflow-x-hidden overflow-y-auto bg-black/50">
        <div class="relative w-full max-w-md bg-white rounded-lg shadow dark:bg-gray-700">

            <div class="flex items-center justify-between p-4 border-b dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Add New Guardian</h3>
                <button type="button" class="text-gray-400 hover:text-gray-900 dark:hover:text-white"
                    data-modal-toggle="addGuardianModal">✕</button>
            </div>

            <form action="{{ route('admin.guardian.store') }}" method="POST" class="p-6 space-y-4">
                @csrf

                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                    <input type="text" name="name" required
                        class="w-full p-2.5 border rounded-lg bg-gray-50 dark:bg-gray-600 dark:text-white">
                </div>

                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Job</label>
                    <input type="text" name="job" required
                        class="w-full p-2.5 border rounded-lg bg-gray-50 dark:bg-gray-600 dark:text-white">
                </div>

                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                    <input type="email" name="email" required
                        class="w-full p-2.5 border rounded-lg bg-gray-50 dark:bg-gray-600 dark:text-white">
                </div>

                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone</label>
                    <input type="text" name="phone" required
                        class="w-full p-2.5 border rounded-lg bg-gray-50 dark:bg-gray-600 dark:text-white">
                </div>

                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                    <textarea name="address" rows="3" required
                        class="w-full p-2.5 border rounded-lg bg-gray-50 dark:bg-gray-600 dark:text-white"></textarea>
                </div>

                <button type="submit"
                    class="w-full py-2.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300">
                    Save
                </button>
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