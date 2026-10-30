<x-guest-layout>
    <h1 class="text-xl font-bold mb-4 text-gray-800">Lapor Banjir</h1>

    @if (session('success'))
        <div class="mb-4 p-3 rounded bg-green-100 text-green-800 text-sm">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('laporan.store') }}" enctype="multipart/form-data">
        @csrf

        <div>
            <x-input-label for="nama_pelapor" value="Nama Pelapor" />
            <x-text-input id="nama_pelapor" name="nama_pelapor" type="text" class="mt-1 block w-full" :value="old('nama_pelapor')" />
            <x-input-error :messages="$errors->get('nama_pelapor')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="no_hp" value="No HP" />
            <x-text-input id="no_hp" name="no_hp" type="text" class="mt-1 block w-full" :value="old('no_hp')" />
            <x-input-error :messages="$errors->get('no_hp')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="lokasi" value="Lokasi Kejadian" />
            <x-text-input id="lokasi" name="lokasi" type="text" class="mt-1 block w-full" :value="old('lokasi')" />
            <x-input-error :messages="$errors->get('lokasi')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="kecamatan" value="Kecamatan" />
            <x-text-input id="kecamatan" name="kecamatan" type="text" class="mt-1 block w-full" :value="old('kecamatan')" />
            <x-input-error :messages="$errors->get('kecamatan')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="tinggi_air" value="Tinggi Air (cm)" />
            <x-text-input id="tinggi_air" name="tinggi_air" type="number" min="0" class="mt-1 block w-full" :value="old('tinggi_air')" />
            <x-input-error :messages="$errors->get('tinggi_air')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="keterangan" value="Keterangan (boleh dikosongkan)" />
            <textarea id="keterangan" name="keterangan" rows="3" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ old('keterangan') }}</textarea>
            <x-input-error :messages="$errors->get('keterangan')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="foto" value="Foto Bukti (jpg, jpeg, png, maks 2 MB)" />
            <input id="foto" name="foto" type="file" class="mt-1 block w-full text-sm text-gray-700 border border-gray-300 rounded-md" />
            <x-input-error :messages="$errors->get('foto')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between mt-6">
            <a href="{{ route('login') }}" class="text-sm text-gray-600 underline">Login Petugas</a>
            <x-primary-button>Kirim Laporan</x-primary-button>
        </div>
    </form>
</x-guest-layout>