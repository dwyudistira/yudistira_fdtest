<x-app-layout>
    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-4 text-green-700 bg-green-100 border border-green-300 p-3 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white shadow-lg rounded-lg p-6 space-y-6">
                <div class="flex justify-between items-center">
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800">Daftar Pengguna</h3>
                        <p class="text-sm text-gray-500">Kelola pengguna yang terdaftar.</p>
                    </div>
                </div>

                <form method="GET" class="grid grid-cols-1 md:grid-cols-5 gap-4">
                    <input type="text" name="name" placeholder="Nama" value="{{ request('name') }}"
                        class="border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">

                    <input type="email" name="email" placeholder="Email" value="{{ request('email') }}"
                        class="border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">

                    <select name="status"
                        class="border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="">Semua Status</option>
                        <option value="1" {{ request('status') === '1' ? 'selected' : '' }}>Terverifikasi</option>
                        <option value="0" {{ request('status') === '0' ? 'selected' : '' }}>Belum Terverifikasi</option>
                    </select>

                    <div class="md:col-span-2">
                        <button type="submit"
                            class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 w-full md:w-auto">
                            Filter
                        </button>
                    </div>
                </form>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-100 text-left">
                            <tr>
                                <th class="px-4 py-2 text-sm font-semibold text-gray-700">Nama</th>
                                <th class="px-4 py-2 text-sm font-semibold text-gray-700">Email</th>
                                <th class="px-4 py-2 text-sm font-semibold text-gray-700">Verifikasi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse ($users as $user)
                                <tr>
                                    <td class="px-4 py-2">{{ $user->name }}</td>
                                    <td class="px-4 py-2">{{ $user->email }}</td>
                                    <td class="px-4 py-2">
                                        @if ($user->email_verified_at)
                                            <span class="text-green-600">Terverifikasi</span>
                                        @else
                                            <span class="text-red-600">Belum</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4 text-gray-500">Tidak ada data pengguna.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $users->links() }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
