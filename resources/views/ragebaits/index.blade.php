@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/ragebait-card.css') }}">
@endpush


@section('content')
<h1>Ragebaits</h1>


<a href="{{ route('ragebaits.create') }}">Create new Ragebait</a>

@if ($ragebaits->isEmpty())
    <p>No ragebaits yet.</p>
@else
<div class="page-wrap">
<div class="ragebait-grid">
@foreach ($ragebaits as $ragebait)

 <div class="ragebait-item">

  <div class="preview-wrapper">

    <a href="{{ route('ragebaits.show', $ragebait) }}"
       class="preview-card frame-{{ $ragebait->frame }}">

      <div class="preview-content">
        <h3>{{ $ragebait->title }}</h3>

        <div class="preview-image">
          <img src="{{ asset('storage/' . $ragebait->image) }}">
        </div>
        <label for="preview-tier">Tier:</label>
        <p class="preview-tier">
          {{ strtoupper($ragebait->tier) }}{{ $ragebait->tier_tier }}
        </p>
        <label for="preview-tier">Description:</label>
        <p class="preview-description">
          {{ \Illuminate\Support\Str::limit($ragebait->description, 120) }}
        </p>
      </div>
    </a>

    <div class="ragebait-actions">
      <a href="{{ route('ragebaits.edit', $ragebait) }}">Edit</a>

      <form action="{{ route('ragebaits.destroy', $ragebait) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
      </form>
    </div>

  </div>

</div>

@endforeach
</div>
</div>

@endif
@endsection
