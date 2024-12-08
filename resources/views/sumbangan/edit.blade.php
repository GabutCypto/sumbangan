<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Sumbangan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-8 shadow-lg rounded-lg">

                <!-- Menampilkan pesan error jika ada -->
                @if ($errors->any())
                    <div class="mb-4">
                        <ul class="list-none text-red-500">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Form untuk mengedit sumbangan -->
                <form method="POST" action="{{ route('sumbangan.update', $sumbangan->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="nama_sumbangan" class="block text-gray-700">Nama Sumbangan</label>
                        <input type="text" name="nama_sumbangan" id="nama_sumbangan" 
                               value="{{ old('nama_sumbangan', $sumbangan->nama_sumbangan) }}" 
                               class="w-full mt-2 p-3 border border-gray-300 rounded-md" required>
                    </div>

                    <div class="mb-4">
                        <label for="nominal" class="block text-gray-700">Nominal</label>
                        <input type="number" name="nominal" id="nominal" 
                               value="{{ old('nominal', $sumbangan->nominal) }}" 
                               class="w-full mt-2 p-3 border border-gray-300 rounded-md" required>
                    </div>

                    <div class="mt-6">
                        <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-3 px-4 rounded-md">
                            Update Sumbangan
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
