<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Santri: ') }} {{ $santri->nama }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-8 shadow-lg rounded-lg">
                <!-- Form untuk mengedit data santri -->
                <form method="POST" action="{{ route('santri.update', $santri->id) }}">
                    @csrf
                    @method('PUT')

                    <!-- Input Nama -->
                    <div class="mb-4">
                        <label for="nama" class="block text-sm font-medium text-gray-700">Nama Santri</label>
                        <input type="text" name="nama" id="nama" value="{{ old('nama', $santri->nama) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('nama') border-red-500 @enderror" required>
                        @error('nama')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Input Wali -->
                    <div class="mb-4">
                        <label for="wali" class="block text-sm font-medium text-gray-700">Nama Wali</label>
                        <input type="text" name="wali" id="wali" value="{{ old('wali', $santri->wali) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('wali') border-red-500 @enderror" required>
                        @error('wali')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Input Alamat -->
                    <div class="mb-4">
                        <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                        <input type="text" name="alamat" id="alamat" value="{{ old('alamat', $santri->alamat) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('alamat') border-red-500 @enderror" required>
                        @error('alamat')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Input Ruang -->
                    <div class="mb-4">
                        <label for="ruang" class="block text-sm font-medium text-gray-700">Ruang</label>
                        <input type="text" name="ruang" id="ruang" value="{{ old('ruang', $santri->ruang) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('ruang') border-red-500 @enderror" required>
                        @error('ruang')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Tombol Submit -->
                    <div class="mb-4">
                        <button type="submit" class="w-full px-4 py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                            Update Santri
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
