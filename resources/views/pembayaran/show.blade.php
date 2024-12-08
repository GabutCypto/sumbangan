<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Pembayaran') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-8 shadow-lg rounded-lg">
                <h3 class="text-lg font-semibold">Santri: {{ $pembayaran->santri->nama }}</h3>
                <p><strong>Sumbangan: </strong>{{ $pembayaran->sumbangan->nama }}</p>
                <p><strong>Jumlah Bayar: </strong>{{ number_format($pembayaran->jumlah_bayar, 2) }}</p>
                <p><strong>Tanggal: </strong>{{ $pembayaran->created_at->format('d-m-Y H:i') }}</p>
            </div>
        </div>
    </div>
</x-app-layout>
