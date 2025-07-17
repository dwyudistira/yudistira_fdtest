<x-app-layout>
    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-4 text-green-700 bg-green-100 border border-green-300 p-3 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white shadow-lg rounded-lg p-6 mb-6">
                <div class="flex justify-between items-center mb-4">
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800">Daftar Buku</h3>
                        <p class="text-sm text-gray-500">Kelola data buku Anda.</p>
                    </div>
                    <a href="{{ route('books.create') }}"
                    class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
                        + Tambah Buku
                    </a>
                </div>

                <form method="GET" class="grid grid-cols-1 md:grid-cols-5 gap-4 mb-4">
                    <input type="text" name="title" placeholder="Judul" value="{{ request('title') }}"
                        class="border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">

                    <input type="text" name="author" placeholder="Penulis" value="{{ request('author') }}"
                        class="border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">

                    <select name="rating"
                        class="border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="">Rating</option>
                        @for ($i = 1; $i <= 5; $i++)
                            <option value="{{ $i }}" {{ request('rating') == $i ? 'selected' : '' }}>{{ $i }}</option>
                        @endfor
                    </select>

                    <input type="date" name="created_at" value="{{ request('created_at') }}"
                        class="border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />

                    <button type="submit"
                        class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 w-full">
                        Filter
                    </button>
                </form>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-100 text-left">
                            <tr>
                                <th class="px-4 py-2 text-sm font-semibold text-gray-700">Thumbnail</th>
                                <th class="px-4 py-2 text-sm font-semibold text-gray-700">Judul</th>
                                <th class="px-4 py-2 text-sm font-semibold text-gray-700">Penulis</th>
                                <th class="px-4 py-2 text-sm font-semibold text-gray-700">Rating</th>
                                <th class="px-4 py-2 text-sm font-semibold text-gray-700">Tanggal Upload</th>
                                <th class="px-4 py-2 text-sm font-semibold text-gray-700">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse ($books as $book)
                                <tr>
                                    <td class="px-4 py-2">
                                        @if ($book->thumbnail)
                                            <img src="{{ asset('storage/' . $book->thumbnail) }}" alt="Thumbnail" class="w-16 h-16 object-cover rounded">
                                        @else
                                            <span class="text-gray-400 italic">Tidak ada</span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-2">{{ $book->title }}</td>
                                    <td class="px-4 py-2">{{ $book->author }}</td>
                                    <td class="px-4 py-2">{{ $book->rating }}</td>
                                    <td class="px-4 py-2">{{ \Carbon\Carbon::parse($book->created_at)->format('d M Y') }}</td>
                                    <td class="px-4 py-2 space-x-2">
                                        <a href="{{ route('books.show', $book->id) }}" class="text-green-600 hover:underline">Lihat</a>
                                        <a href="{{ route('books.edit', $book->id) }}" class="text-blue-500 hover:underline">Edit</a>
                                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="return confirm('Yakin ingin menghapus?')" class="text-red-500 hover:underline">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-gray-500 py-4">Belum ada data buku.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="mt-4 bg-white p-4 rounded  shadow text-gray-800">
                    {{ $books->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
