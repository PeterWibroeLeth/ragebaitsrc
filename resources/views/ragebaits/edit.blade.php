@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/ragebait-card.css') }}">
@endpush

@section('content')
<div class="create-wrap">
    <div class="create-card">
        <h1>Edit Ragebait</h1>

        {{-- Validation errors --}}
        @if ($errors->any())
            <ul class="errors">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form method="POST"
              action="{{ route('ragebaits.update', $ragebait) }}"
              enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="field">
                <label>Title</label>
                <input name="title" value="{{ old('title', $ragebait->title) }}" required>
            </div>

            <div class="field">
                <label>Image (optional)</label>
                <input type="file" name="image" accept="image/*">
            </div>

            <div class="field">
                <label>Frame</label>
                <select name="frame" required>
                    @foreach (['gold','silver','bronze'] as $frame)
                        <option value="{{ $frame }}"
                            @selected(old('frame', $ragebait->frame) === $frame)>
                            {{ ucfirst($frame) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="field">
                <label>Tier</label>
                <select name="tier" required>
                    @foreach (['s','a','b','c','d'] as $tier)
                        <option value="{{ $tier }}"
                            @selected(old('tier', $ragebait->tier) === $tier)>
                            {{ strtoupper($tier) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="field">
                <label>Tier buff</label>
                <select name="tier_tier">
                    <option value="">None</option>
                    @for ($i = 1; $i <= 2; $i++)
                        <option value="{{ $i }}"
                            @selected((int) old('tier_tier', $ragebait->tier_tier) === $i)>
                            {{ str_repeat('+', $i) }}
                        </option>
                    @endfor
                </select>
            </div>

            <div class="field">
                <label>Description</label>
                <textarea name="description" required>{{ old('description', $ragebait->description) }}</textarea>
            </div>

            <button type="submit">Update</button>
        </form>
    </div>
</div>
@endsection
