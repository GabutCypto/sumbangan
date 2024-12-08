<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Santri Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-8 shadow-lg rounded-lg">

                @if($errors->any())
                    <div class="bg-red-500 text-white p-4 rounded-lg mb-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('santri.store') }}">
                    @csrf

                    <div class="mb-4">
                        <label for="nama" class="block text-gray-700">Nama</label>
                        <input type="text" name="nama" id="nama" class="w-full px-4 py-2 border rounded-lg" value="{{ old('nama') }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="wali" class="block text-gray-700">Wali</label>
                        <input type="text" name="wali" id="wali" class="w-full px-4 py-2 border rounded-lg" value="{{ old('wali') }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="alamat" class="block text-gray-700">Alamat</label>
                        <input type="text" name="alamat" id="alamat" class="w-full px-4 py-2 border rounded-lg" value="{{ old('alamat') }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="ruang" class="block text-gray-700">Ruang</label>
                        <input type="text" name="ruang" id="ruang" class="w-full px-4 py-2 border rounded-lg" value="{{ old('ruang') }}" required>
                    </div>

                    <button type="submit" class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-700">Tambah Santri</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
