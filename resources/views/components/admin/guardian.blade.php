<x-admin.layout :title="$title">

    <div class="flex justify-between items-center mt-10 mb-6"> 
        {{-- Tambahkan mt-10 agar agak turun dari navbar --}}
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Guardian List</h1>

        {{-- ✅ Tombol tambah guardian --}}
        <button data-modal-target="addGuardianModal" data-modal-toggle="addGuardianModal"
            class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 transition">
            + Add Guardian
        </button>
    </div>

    {{-- ✅ Tabel data guardian --}}
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">No</th>
                    <th scope="col" class="px-6 py-3">Nama</th>
                    <th scope="col" class="px-6 py-3">Pekerjaan</th>
                    <th scope="col" class="px-6 py-3">Email</th>
                    <th scope="col" class="px-6 py-3">Alamat</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($guardian as $item)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">{{ $item->name }}</td>
                        <td class="px-6 py-4 text-gray-700 dark:text-gray-300">{{ $item->job }}</td>
                        <td class="px-6 py-4 text-gray-700 dark:text-gray-300">{{ $item->email }}</td>
                        <td class="px-6 py-4 text-gray-700 dark:text-gray-300">{{ $item->address }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- ✅ Modal tambah guardian --}}
    <div id="addGuardianModal" tabindex="-1" aria-hidden="true"
        class="hidden fixed inset-0 z-50 flex items-center justify-center w-full p-4 overflow-x-hidden overflow-y-auto bg-black/50">
        <div class="relative w-full max-w-md bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex items-center justify-between p-4 border-b dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Add New Guardian</h3>
                <button type="button" class="text-gray-400 hover:text-gray-900 dark:hover:text-white" data-modal-toggle="addGuardianModal">✕</button>
            </div>

            <form action="{{ route('admin.guardian.store') }}" method="POST" class="p-6 space-y-4">
                @csrf

                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                    <input type="text" name="name" id="name" required
                        class="w-full p-2.5 border rounded-lg bg-gray-50 dark:bg-gray-600 dark:text-white" />
                </div>

                <div>
                    <label for="job" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Job</label>
                    <input type="text" name="job" id="job" required
                        class="w-full p-2.5 border rounded-lg bg-gray-50 dark:bg-gray-600 dark:text-white" />
                </div>

                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                    <input type="email" name="email" id="email" required
                        class="w-full p-2.5 border rounded-lg bg-gray-50 dark:bg-gray-600 dark:text-white" />
                </div>

                <div>
                    <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                    <textarea name="address" id="address" rows="3" required
                        class="w-full p-2.5 border rounded-lg bg-gray-50 dark:bg-gray-600 dark:text-white"></textarea>
                </div>

                <button type="submit"
                    class="w-full py-2.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300">
                    Save
                </button>
            </form>
        </div>
    </div>

</x-admin.layout>