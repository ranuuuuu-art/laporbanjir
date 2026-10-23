@extends('layouts.app')

@section('title', 'Profil Petugas')

@section('content')
<div class="card">
    <h2>Profil Petugas</h2>
    <p>Nama: {{ Auth::user()->name }}</p>
    <p>Email: {{ Auth::user()->email }}</p>
    <p>Akun dibuat: {{ Auth::user()->created_at->format('d-m-Y H:i') }} ({{ Auth::user()->created_at->diffForHumans() }})</p>
</div>
@endsection