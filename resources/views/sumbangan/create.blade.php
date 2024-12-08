<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Sumbangan Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-8 shadow-lg rounded-lg">

                <!-- Menampilkan error jika ada -->
                @if($errors->any())
                    <div class="mb-6">
                        <ul class="list-disc pl-5 text-red-600">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Form untuk input data sumbangan -->
                <form method="POST" action="{{ route('sumbangan.store') }}">
                    @csrf

                    <!-- Nama Sumbangan -->
                    <div class="mb-4">
                        <label for="nama_sumbangan" class="block text-gray-700">Nama Sumbangan</label>
                        <input type="text" id="nama_sumbangan" name="nama_sumbangan" 
                               class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                               value="{{ old('nama_sumbangan') }}" required>
                    </div>

                    <!-- Nominal -->
                    <div class="mb-4">
                        <label for="nominal" class="block text-gray-700">Nominal</label>
                        <input type="number" id="nominal" name="nominal" 
                               class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                               value="{{ old('nominal') }}" required>
                    </div>

                    <!-- Tombol Submit -->
                    <div class="mt-6">
                        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md">
                            Simpan Sumbangan
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
