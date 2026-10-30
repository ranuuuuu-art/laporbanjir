<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Laporan Banjir
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm rounded-lg p-6">

                <h3 class="text-lg font-bold mb-6">Ubah Data Laporan</h3>

                @if ($errors->any())
                    <div class="mb-4 bg-red-100 text-red-700 p-4 rounded">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <form action="{{ route('laporan.update', $laporan->id) }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block font-medium mb-2">Nama Pelapor</label>
                        <input type="text" name="nama_pelapor"
                            value="{{ old('nama_pelapor', $laporan->nama_pelapor) }}"
                            class="w-full border border-gray-300 rounded-md p-2" required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium mb-2">Nomor HP</label>
                        <input type="text" name="no_hp"
                            value="{{ old('no_hp', $laporan->no_hp) }}"
                            class="w-full border border-gray-300 rounded-md p-2" required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium mb-2">Lokasi Banjir</label>
                        <input type="text" name="lokasi"
                            value="{{ old('lokasi', $laporan->lokasi) }}"
                            class="w-full border border-gray-300 rounded-md p-2" required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium mb-2">Kecamatan</label>
                        <input type="text" name="kecamatan"
                            value="{{ old('kecamatan', $laporan->kecamatan) }}"
                            class="w-full border border-gray-300 rounded-md p-2" required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium mb-2">Tinggi Air (cm)</label>
                        <input type="number" name="tinggi_air"
                            value="{{ old('tinggi_air', $laporan->tinggi_air) }}"
                            class="w-full border border-gray-300 rounded-md p-2" required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium mb-2">Keterangan</label>
                        <textarea name="keterangan"
                            class="w-full border border-gray-300 rounded-md p-2"
                            rows="4">{{ old('keterangan', $laporan->keterangan) }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium mb-2">Status Laporan</label>
                        <select name="status"
                            class="w-full border border-gray-300 rounded-md p-2" required>
                            @foreach (['Menunggu', 'Diproses', 'Selesai'] as $status)
                                <option value="{{ $status }}"
                                    {{ old('status', $laporan->status) == $status ? 'selected' : '' }}>
                                    {{ $status }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium mb-2">Foto Saat Ini</label>
                        @if ($laporan->foto)
                            <img src="{{ asset('storage/' . $laporan->foto) }}"
                                class="w-48 rounded-md mb-3" alt="Foto banjir">
                        @endif
                    </div>

                    <div class="mb-6">
                        <label class="block font-medium mb-2">Ganti Foto (Opsional)</label>
                        <input type="file" name="foto"
                            accept=".jpg,.jpeg,.png"
                            class="w-full border border-gray-300 rounded-md p-2">
                    </div>

                    <div class="flex flex-wrap gap-3 mt-6">
                        <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white font-bold px-6 py-3 rounded-md">
                            Simpan Perubahan
                        </button>

                        <a href="{{ route('laporan.index') }}"
                            class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-md">
                            Kembali
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>