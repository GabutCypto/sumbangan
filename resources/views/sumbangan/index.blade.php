<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Sumbangan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Tombol untuk menambah sumbangan -->
                    <a href="{{ route('sumbangan.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg mb-4 inline-block">
                        Tambah Sumbangan Baru
                    </a>

                    <!-- Tabel Daftar Sumbangan -->
                    <table class="min-w-full table-auto border-collapse">
                        <thead>
                            <tr>
                                <th class="border px-4 py-2">Nama Sumbangan</th>
                                <th class="border px-4 py-2">Nominal</th>
                                <th class="border px-4 py-2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sumbangans as $sumbangan)
                                <tr>
                                    <td class="border px-4 py-2">{{ $sumbangan->nama_sumbangan }}</td>
                                    <td class="border px-4 py-2">{{ $sumbangan->nominal }}</td>
                                    <td class="border px-4 py-2">
                                        <!-- Edit dan Delete -->
                                        <a href="{{ route('sumbangan.edit', $sumbangan->id) }}" class="text-yellow-500 hover:text-yellow-700">Edit</a>
                                        <form action="{{ route('sumbangan.destroy', $sumbangan->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
