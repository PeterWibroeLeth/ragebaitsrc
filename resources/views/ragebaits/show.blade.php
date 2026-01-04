@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/ragebait-card.css') }}">
@endpush

@section('content')
<div class="page-wrap">

  <a href="{{ route('ragebaits.index') }}">← Back to list</a>

  <div class="ragebait-show">

    <div class="preview-card frame-{{ $ragebait->frame }}">

      <div class="preview-content">

        <h1>{{ $ragebait->title }}</h1>

        <div class="preview-image">
          <img src="{{ asset('storage/' . $ragebait->image) }}">
        </div>
        <label for="preview-tier">Tier:</label>
        <p class="preview-tier">
          {{ strtoupper($ragebait->tier) }}{{ $ragebait->tier_tier }}
        </p>
        <label for="preview-description">Description:</label>
        <p class="preview-description">
          {{ $ragebait->description }}
        </p>

      </div>
    </div>

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
@endsection