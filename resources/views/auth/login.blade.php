@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="card">
    <h2>Login Petugas</h2>
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <label for="email">Email</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
        @error('email')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="password">Password</label>
        <input id="password" type="password" name="password" required>
        @error('password')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="remember">
            <input id="remember" type="checkbox" name="remember" style="width:auto; display:inline;"> Ingat saya
        </label>

        <button type="submit">Login</button>
    </form>
</div>
@endsection