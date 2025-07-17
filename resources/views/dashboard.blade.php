<x-app-layout>
    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-4xl mx-auto px-6 lg:px-8">
            <div class="bg-white rounded-xl shadow-md p-8 text-center space-y-6">
                <div>
                    <img
                        class="w-24 h-24 mx-auto rounded-full border border-gray-300"
                        src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}"
                        alt="Avatar"
                    >

                    <h3 class="mt-4 text-2xl font-bold text-gray-800">
                        {{ auth()->user()->name }}
                    </h3>

                    <p class="text-base text-gray-500 mt-1">
                        {{ auth()->user()->email }}
                    </p>

                    <p class="mt-3 text-base font-semibold text-{{ auth()->user()->email_verified_at ? 'green' : 'red' }}-600">
                        {{ auth()->user()->email_verified_at ? 'Terverifikasi' : 'Belum Terverifikasi' }}
                    </p>

                    @if(auth()->user()->email_verified_at)
                        <p class="text-sm text-gray-500 mt-1">
                            Terverifikasi pada {{ auth()->user()->email_verified_at->format('d M Y') }}
                        </p>
                    @endif
                </div>

                <div class="grid grid-cols-2 gap-4 mt-6">
                    <div class="bg-indigo-50 p-4 rounded-lg shadow-sm">
                        <h4 class="text-sm text-gray-500 uppercase">Total Buku</h4>
                        <p class="mt-2 text-2xl font-bold text-indigo-700">
                            {{ $totalBooks ?? 0 }}
                        </p>
                    </div>

                    <div class="bg-indigo-50 p-4 rounded-lg shadow-sm">
                        <h4 class="text-sm text-gray-500 uppercase">Rata Rata Rating</h4>
                        <p class="mt-2 text-2xl font-bold text-indigo-700">
                            {{ $rataRataRating ?? 0 }}
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
