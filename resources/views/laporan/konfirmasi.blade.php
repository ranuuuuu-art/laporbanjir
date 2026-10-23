@extends('layouts.lapor')

@section('title', 'Konfirmasi Laporan')

@section('content')
    <h2>Konfirmasi Laporan</h2>

    <x-alert type="success" message="Laporan banjir berhasil dikirim. Terima kasih sudah melapor." />

    <div class="card">
        <h3>Data yang Anda kirim</h3>
        <p><strong>Nama Pelapor:</strong> {{ $data['nama'] }}</p>
        <p><strong>Lokasi Kejadian:</strong> {{ $data['lokasi'] }}</p>
        <p><strong>Tinggi Genangan:</strong> {{ $data['tinggi'] }} cm</p>
    </div>

    <p><a href="{{ route('laporan.index') }}">Lihat Daftar Laporan</a></p>
@endsection