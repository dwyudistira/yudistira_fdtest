<x-app-layout>
    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg p-6">
                <h2 class="text-2xl font-bold mb-6">Buku Tersedia</h2>

                <form method="GET" class="grid grid-cols-1 md:grid-cols-5 gap-4 mb-6">
                    <input type="text" name="title" placeholder="Judul" value="{{ request('title') }}"
                        class="border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 px-3 py-2">

                    <input type="text" name="author" placeholder="Penulis" value="{{ request('author') }}"
                        class="border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 px-3 py-2">

                    <select name="rating"
                        class="border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 px-3 py-2">
                        <option value="">Rating</option>
                        @for ($i = 1; $i <= 5; $i++)
                            <option value="{{ $i }}" {{ request('rating') == $i ? 'selected' : '' }}>{{ $i }}</option>
                        @endfor
                    </select>

                    <input type="date" name="created_at" value="{{ request('created_at') }}"
                        class="border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 px-3 py-2" />

                    <button type="submit"
                        class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 w-full">
                        Filter
                    </button>
                </form>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                    @forelse ($books as $book)
                        <div class="bg-gray-50 border rounded-lg shadow-md overflow-hidden">
                            @if ($book->thumbnail)
                                <img src="{{ asset('storage/' . $book->thumbnail) }}"
                                     alt="{{ $book->title }}"
                                     class="w-full h-60 object-cover">
                            @else
                                <div class="w-full h-60 bg-gray-200 flex items-center justify-center text-gray-500">
                                    Tidak ada gambar
                                </div>
                            @endif

                            <div class="p-4">
                                <h3 class="text-lg font-semibold truncate">{{ $book->title }}</h3>
                                <p class="text-sm text-gray-600">Penulis: {{ $book->author }}</p>
                                <div class="flex justify-between items-center mt-2 text-sm">
                                    <span class="text-yellow-500 font-semibold">{{ $book->rating }}/5</span>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full text-center text-gray-500">
                            Tidak ada buku ditemukan.
                        </div>
                    @endforelse
                </div>

                <div class="mt-6">
                    {{ $books->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
