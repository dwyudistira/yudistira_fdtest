<x-app-layout>
    <div class="py-10">
        <div class="max-w-3xl mx-auto bg-white p-6 rounded shadow-md">
            <div class="mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Tambah Buku</h2>
                <p class="text-sm text-gray-500">Isi formulir berikut untuk menambahkan buku baru.</p>
            </div>

            <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="space-y-4">
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700">Judul</label>
                        <input type="text" name="title" id="title" value="{{ old('title') }}"
                            class="mt-1 block w-full border-gray-300 rounded shadow-sm" required>
                    </div>

                    <div>
                        <label for="author" class="block text-sm font-medium text-gray-700">Penulis</label>
                        <input type="text" name="author" id="author" value="{{ old('author') }}"
                            class="mt-1 block w-full border-gray-300 rounded shadow-sm" required>
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                        <textarea name="description" id="description" rows="3"
                            class="mt-1 block w-full border-gray-300 rounded shadow-sm">{{ old('description') }}</textarea>
                    </div>

                    <div>
                        <label for="rating" class="block text-sm font-medium text-gray-700">Rating</label>
                        <select name="rating" id="rating"
                            class="mt-1 block w-full border-gray-300 rounded shadow-sm" required>
                            <option value="">Pilih rating</option>
                            @for ($i = 1; $i <= 5; $i++)
                                <option value="{{ $i }}" {{ old('rating') == $i ? 'selected' : '' }}>
                                    {{ $i }}
                                </option>
                            @endfor
                        </select>
                    </div>

                    <div>
                        <label for="thumbnail" class="block text-sm font-medium text-gray-700">Thumbnail</label>
                        <input type="file" name="thumbnail" id="thumbnail"
                            class="mt-1 block w-full border-gray-300 rounded shadow-sm">
                    </div>
                </div>

                <div class="mt-6 flex justify-end gap-3">
                    <a href="{{ route('books.index') }}"
                        class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400">Batal</a>
                    <button type="submit"
                        class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
