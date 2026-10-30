<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Detail Laporan Banjir
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm rounded-lg p-6">

                <img src="{{ asset('storage/' . $laporan->foto) }}"
                     class="w-full max-h-96 object-cover rounded mb-6"
                     alt="Foto banjir">

                <table class="min-w-full text-sm text-left">
                    <tr class="border-b">
                        <th class="py-3">Nama Pelapor</th>
                        <td>{{ $laporan->nama_pelapor }}</td>
                    </tr>
                    <tr class="border-b">
                        <th class="py-3">No HP</th>
                        <td>{{ $laporan->no_hp }}</td>
                    </tr>
                    <tr class="border-b">
                        <th class="py-3">Lokasi</th>
                        <td>{{ $laporan->lokasi }}</td>
                    </tr>
                    <tr class="border-b">
                        <th class="py-3">Kecamatan</th>
                        <td>{{ $laporan->kecamatan }}</td>
                    </tr>
                    <tr class="border-b">
                        <th class="py-3">Tinggi Air</th>
                        <td>{{ $laporan->tinggi_air }} cm</td>
                    </tr>
                    <tr class="border-b">
                        <th class="py-3">Keterangan</th>
                        <td>{{ $laporan->keterangan ?? '-' }}</td>
                    </tr>
                    <tr class="border-b">
                        <th class="py-3">Status</th>
                        <td>{{ $laporan->status }}</td>
                    </tr>
                    <tr>
                        <th class="py-3">Tanggal</th>
                        <td>{{ $laporan->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                </table>

                <div class="mt-6 flex gap-4">
                    <a href="{{ route('laporan.index') }}"
                       class="text-gray-600 underline">Kembali</a>

                    <a href="{{ route('laporan.edit', $laporan) }}"
                       class="text-yellow-600 underline">Edit</a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>