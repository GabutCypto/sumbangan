<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Pembayaran') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-8 shadow-lg rounded-lg">

                <!-- Menampilkan error jika ada -->
                @if($errors->any())
                    <div class="bg-red-500 text-white p-3 rounded-lg mb-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Form untuk input data pembayaran -->
                <form method="POST" action="{{ route('pembayaran.store') }}">
                    @csrf
                    
                    <!-- Santri -->
                    <div class="mb-4">
                        <label for="santri_id" class="block text-sm font-medium text-gray-700">Santri</label>
                        <select id="santri_id" name="santri_id" class="mt-1 block w-full p-2.5 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="">Pilih Santri</option>
                            @foreach($santris as $santri)
                                <option value="{{ $santri->id }}">{{ $santri->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Sumbangan -->
                    <div class="mb-4">
                        <label for="sumbangan_id" class="block text-sm font-medium text-gray-700">Sumbangan</label>
                        <select id="sumbangan_id" name="sumbangan_id" class="mt-1 block w-full p-2.5 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" onchange="updateNominal()">
                            <option value="">Pilih Sumbangan</option>
                            @foreach($sumbangans as $sumbangan)
                                <option value="{{ $sumbangan->id }}" data-nominal="{{ $sumbangan->nominal }}">{{ $sumbangan->nama_sumbangan }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Jumlah Pembayaran (diambil dari nominal sumbangan) -->
                    <div class="mb-4">
                        <label for="jumlah_bayar" class="block text-sm font-medium text-gray-700">Jumlah Pembayaran</label>
                        <input id="jumlah_bayar" type="text" name="jumlah_bayar" value="" class="mt-1 block w-full p-2.5 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" readonly>
                    </div>

                    <!-- Submit Button -->
                    <div class="mt-6">
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            Simpan Pembayaran
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Update the nominal amount when the sumbangan is selected
        function updateNominal() {
            var sumbanganSelect = document.getElementById('sumbangan_id');
            var selectedOption = sumbanganSelect.options[sumbanganSelect.selectedIndex];
            var nominal = selectedOption.getAttribute('data-nominal');
            document.getElementById('jumlah_bayar').value = nominal;
        }
    </script>
</x-app-layout>
