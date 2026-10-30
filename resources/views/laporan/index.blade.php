<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Daftar Laporan Banjir</h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-4 p-3 rounded bg-green-100 text-green-800 text-sm">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white shadow-sm sm:rounded-lg p-6 overflow-x-auto">
                <table class="min-w-full text-sm text-left">
                    <thead class="border-b font-semibold text-gray-700">
                        <tr>
                            <th class="py-2 pr-4">No</th>
                            <th class="py-2 pr-4">Foto</th>
                            <th class="py-2 pr-4">Pelapor</th>
                            <th class="py-2 pr-4">Lokasi</th>
                            <th class="py-2 pr-4">Kecamatan</th>
                            <th class="py-2 pr-4">Tinggi Air</th>
                            <th class="py-2 pr-4">Status</th>
                            <th class="py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($laporans as $laporan)
                            <tr class="border-b">
                                <td class="py-2 pr-4">{{ $laporans->firstItem() + $loop->index }}</td>
                                <td class="py-2 pr-4">
                                    <img src="{{ asset('storage/' . $laporan->foto) }}" alt="Foto banjir" class="w-16 h-16 object-cover rounded">
                                </td>
                                <td class="py-2 pr-4">{{ $laporan->nama_pelapor }}</td>
                                <td class="py-2 pr-4">{{ $laporan->lokasi }}</td>
                                <td class="py-2 pr-4">{{ $laporan->kecamatan }}</td>
                                <td class="py-2 pr-4">{{ $laporan->tinggi_air }} cm</td>
                                <td class="py-2 pr-4">{{ $laporan->status }}</td>
                                <td class="py-2">
                                    <a href="{{ route('laporan.show', $laporan) }}" class="text-blue-600 underline">Detail</a>
                                    <a href="{{ route('laporan.edit', $laporan) }}" class="text-yellow-600 underline ml-2">Edit</a>
                                    <form action="{{ route('laporan.destroy', $laporan) }}" method="POST" class="inline" onsubmit="return confirm('Yakin mau hapus laporan ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 underline ml-2">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="py-4 text-center text-gray-500">Belum ada laporan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mt-4">
                    {{ $laporans->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>