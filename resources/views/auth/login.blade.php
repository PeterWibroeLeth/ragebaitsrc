@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/auth-card.css') }}">
@endpush

@section('content')
<div class="auth-wrap">
    <div class="auth-card frame-gold">
        <h2 class="auth-title">Login</h2>

        <form method="POST" action="/login">
            @csrf

            <div class="field">
                <label>Email</label>
                <input type="email" name="email" required autofocus>
            </div>

            <div class="field">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>

            @error('email')
                <p class="error">{{ $message }}</p>
            @enderror

            <button class="auth-btn">Login</button>
        </form>

        <p class="auth-footer">
            No account?
            <a href="/register">Register</a>
        </p>
    </div>
</div>
@endsection
