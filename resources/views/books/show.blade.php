<x-app-layout>
    <div class="max-w-xl mx-auto py-10 px-4">
        <div class="bg-white shadow-lg rounded-xl overflow-hidden">
            <div class="w-full bg-gray-100 flex justify-center p-4">
                @if ($book->thumbnail)
                    <img src="{{ asset('storage/' . $book->thumbnail) }}" alt="Thumbnail"
                         class="object-cover w-full max-h-96 rounded-md">
                @else
                    <div class="text-gray-400 text-center py-10">
                        Tidak ada gambar
                    </div>
                @endif
            </div>

            <div class="p-6 space-y-4 text-gray-800">
                <div>
                    <h3 class="text-2xl font-bold mb-1">{{ $book->title }}</h3>
                    <p class="text-sm text-gray-600">Penulis: <span class="font-medium">{{ $book->author }}</span></p>
                </div>

                <div>
                    <p class="text-gray-700">{{ $book->description }}</p>
                </div>

                <div>
                    <span class="text-sm font-semibold text-gray-600">Rating:</span>
                    <span class="text-yellow-500">{{ $book->rating }}/5</span>
                </div>

                <div>
                    <span class="text-sm text-gray-500">Ditambahkan pada: {{ $book->created_at->format('d M Y') }}</span>
                </div>

                <div class="pt-4 flex items-center justify-between">
                    <a href="{{ route('books.index') }}"
                       class="text-sm text-blue-600 hover:underline">
                        ← Kembali
                    </a>

                    <a href="{{ route('books.edit', $book->id) }}"
                       class="px-4 py-2 bg-yellow-500 text-white text-sm rounded-md hover:bg-yellow-600">
                        ✏️ Edit
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
