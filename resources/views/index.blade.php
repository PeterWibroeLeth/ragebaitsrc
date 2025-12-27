@extends('layouts.app')

@section('content')

<h1>Browse Meta Ragebait</h1>

<button>Create</button>

<button>Create</button>

@if (session('ragebait'))
    <div class="card">
        <h3 class="card-title">{{ session('ragebait.title') }}</h3>
        <p class="card-meta">Tier: {{ session('ragebait.tier') }}</p>
        <p>{{ session('ragebait.description') }}</p>
    </div>
@endif

<div class="card-grid">
    <article class="card">
        <h3 class="card-title">Source?</h3>
        <img src="{{ asset('img/cards/knowledge.png') }}" alt="Source?">
        <p class="card-meta">Tier: S+</p>

        <div class="card-actions">
            <a href="#">View</a>
            <a href="#">Edit</a>
            <button>Delete</button>
        </div>
    </article>
        <article class="card">
        <h3 class="card-title">Source?</h3>
        <img src="{{ asset('img/cards/knowledge.png') }}" alt="Source?">
        <p class="card-meta">Tier: S+</p>

        <div class="card-actions">
            <a href="#">View</a>
            <a href="#">Edit</a>
            <button>Delete</button>
        </div>
    </article>
</div>

<h2>Create ragebait</h2>

<form method="POST" action="/create">
    @csrf

    <input type="text" name="title" placeholder="Title">
    <input type="text" name="tier" placeholder="Tier">
    <textarea name="description" placeholder="Description"></textarea>

    <button type="submit">Create</button>
</form>


@endsection
