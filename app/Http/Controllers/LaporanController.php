<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LaporanController extends Controller
{
    public function index()
    {
        $laporans = Laporan::latest()->paginate(5);

        return view('laporan.index', compact('laporans'));
    }

    public function create()
    {
        return view('laporan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_pelapor' => 'required|string|max:100',
            'no_hp'        => 'required|string|max:20',
            'lokasi'       => 'required|string|max:150',
            'kecamatan'    => 'required|string|max:100',
            'tinggi_air'   => 'required|integer|min:0',
            'keterangan'   => 'nullable|string',
            'foto'         => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ], [
            'foto.required' => 'Foto bukti wajib diupload.',
            'foto.image'    => 'File harus berupa gambar.',
            'foto.mimes'    => 'Foto harus berformat jpg, jpeg, atau png.',
            'foto.max'      => 'Ukuran foto maksimal 2 MB.',
        ]);

        $validated['foto'] = $request->file('foto')->store('laporan', 'public');

        Laporan::create($validated);

        return redirect()->route('laporan.create')
            ->with('success', 'Laporan banjir berhasil dikirim.');
    }

    public function show(Laporan $laporan)
    {
        return view('laporan.show', compact('laporan'));
    }

    public function edit(Laporan $laporan)
    {
        return view('laporan.edit', compact('laporan'));
    }

    public function update(Request $request, Laporan $laporan)
    {
        $validated = $request->validate([
            'nama_pelapor' => 'required|string|max:100',
            'no_hp'        => 'required|string|max:20',
            'lokasi'       => 'required|string|max:150',
            'kecamatan'    => 'required|string|max:100',
            'tinggi_air'   => 'required|integer|min:0',
            'keterangan'   => 'nullable|string',
            'status'       => 'required|in:Menunggu,Diproses,Selesai',
            'foto'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ], [
            'foto.image' => 'File harus berupa gambar.',
            'foto.mimes' => 'Foto harus berformat jpg, jpeg, atau png.',
            'foto.max'   => 'Ukuran foto maksimal 2 MB.',
        ]);

        if ($request->hasFile('foto')) {
            Storage::disk('public')->delete($laporan->foto);
            $validated['foto'] = $request->file('foto')->store('laporan', 'public');
        }

        $laporan->update($validated);

        return redirect()->route('laporan.index')
            ->with('success', 'Laporan berhasil diubah.');
    }

    public function destroy(Laporan $laporan)
    {
        Storage::disk('public')->delete($laporan->foto);

        $laporan->delete();

        return redirect()->route('laporan.index')
            ->with('success', 'Laporan berhasil dihapus.');
    }
}