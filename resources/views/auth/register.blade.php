@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/auth-card.css') }}">
@endpush

@section('content')
<div class="auth-wrap">
    <div class="auth-card frame-silver">
        <h2 class="auth-title">Register</h2>

        <form method="POST" action="/register">
            @csrf

            <div class="field">
                <label>Name</label>
                <input name="name" required>
            </div>

            <div class="field">
                <label>Email</label>
                <input type="email" name="email" required>
            </div>

            <div class="field">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>

            <div class="field">
                <label>Confirm password</label>
                <input type="password" name="password_confirmation" required>
            </div>

            @if ($errors->any())
                <p class="error">Invalid input</p>
            @endif

            <button class="auth-btn">Create account</button>
        </form>
    </div>
</div>
@endsection
