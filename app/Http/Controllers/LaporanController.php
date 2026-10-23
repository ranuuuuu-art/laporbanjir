<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanController extends Controller
{
    // Data contoh laporan (belum pakai database)
    private function dataLaporan()
    {
        return [
            [
                'nama'   => 'Budi Santoso',
                'lokasi' => 'Dayeuhkolot, Kabupaten Bandung',
                'tinggi' => 25,
            ],
            [
                'nama'   => 'Siti Rahma',
                'lokasi' => 'Baleendah, Kabupaten Bandung',
                'tinggi' => 50,
            ],
            [
                'nama'   => 'Asep Sunandar',
                'lokasi' => 'Bojongsoang, Kabupaten Bandung',
                'tinggi' => 85,
            ],
        ];
    }

    // Halaman daftar laporan
    public function index()
    {
        $laporan = $this->dataLaporan();

        return view('laporan.index', compact('laporan'));
    }

    // Halaman form pelaporan
    public function create()
    {
        return view('laporan.form');
    }

    // Memproses form (method POST) lalu menampilkan halaman konfirmasi
    public function store(Request $request)
    {
        $request->validate([
            'nama'   => 'required|string|max:100',
            'lokasi' => 'required|string|max:150',
            'tinggi' => 'required|numeric|min:0',
        ]);

        $data = [
            'nama'   => $request->nama,
            'lokasi' => $request->lokasi,
            'tinggi' => $request->tinggi,
        ];

        return view('laporan.konfirmasi', compact('data'));
    }
}