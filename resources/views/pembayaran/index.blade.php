<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Pembayaran') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('pembayaran.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                {{ __('Buat Pembayaran Baru') }}
            </a>
            <!-- Daftar pembayaran -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="min-w-full table-auto">
                        <thead>
                            <tr class="border-b border-gray-300">
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-900 uppercase tracking-wider">Nama Santri</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-900 uppercase tracking-wider">Wali</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-900 uppercase tracking-wider">Alamat</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-900 uppercase tracking-wider">Nama Sumbangan</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-900 uppercase tracking-wider">Jumlah Pembayaran</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-900 uppercase tracking-wider">Status Pembayaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($santris as $santri)
                                @foreach($sumbangans as $sumbangan)
                                    @php
                                        $pembayaran = $santri->pembayarans->firstWhere('sumbangan_id', $sumbangan->id);
                                    @endphp
                                    <tr class="border-b border-gray-300">
                                        @if ($loop->first)
                                            <td class="px-6 py-4 whitespace-nowrap text-lg font-medium text-gray-500" rowspan="{{ count($sumbangans) }}">{{ $santri->nama }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-lg font-medium text-gray-500" rowspan="{{ count($sumbangans) }}">{{ $santri->wali }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-lg font-medium text-gray-500" rowspan="{{ count($sumbangans) }}">{{ $santri->alamat }}</td>
                                        @endif
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $sumbangan->nama_sumbangan }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $pembayaran ? number_format($pembayaran->jumlah_bayar, 2) : 'Belum Bayar' }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $pembayaran ? 'Sudah Bayar' : 'Belum Bayar' }}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
