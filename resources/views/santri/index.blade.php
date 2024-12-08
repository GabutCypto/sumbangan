<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Santri') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('santri.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Tambah Santri</a>

                    <table class="min-w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 border">Nama</th>
                                <th class="px-4 py-2 border">Wali</th>
                                <th class="px-4 py-2 border">Alamat</th>
                                <th class="px-4 py-2 border">Ruang</th>
                                <th class="px-4 py-2 border">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($santris as $santri)
                                <tr>
                                    <td class="px-4 py-2 border">{{ $santri->nama }}</td>
                                    <td class="px-4 py-2 border">{{ $santri->wali }}</td>
                                    <td class="px-4 py-2 border">{{ $santri->alamat }}</td>
                                    <td class="px-4 py-2 border">{{ $santri->ruang }}</td>
                                    <td class="px-4 py-2 border">
                                        <a href="{{ route('santri.edit', $santri->id) }}" class="text-blue-600">Edit</a> |
                                        <form action="{{ route('santri.destroy', $santri->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600">Hapus</button>
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
