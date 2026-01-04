@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/createragebait.css') }}">
<link rel="stylesheet" href="{{ asset('css/ragebait-card.css') }}">
@endpush

@section('content')
<div class="create-wrap">
    <div class="create-card">
        <h1 class="create-title">Create Ragebait</h1>
        <p class="create-subtitle">Use the form below to create a new ragebait entry.</p>

        <form method="POST" action="{{ route('ragebaits.store') }}" enctype="multipart/form-data">
    @csrf

            <div class="field">
                <label for="title">Title</label>
                <input id="title" name="title" type="text" placeholder="Enter a provocative title" required>
            </div>

            <div class="field">
                <label for="image">Image</label>
                <input id="image" name="image" type="file" accept="image/*" required>
            </div>

            <div class="field">
                <label for="frame">Frame</label>
                <select id="frame" name="frame" required>
                    <option value="gold">Gold</option>
                    <option value="silver">Silver</option>
                    <option value="prismatic">Prismatic</option>
                </select>
            </div>


            <div class="field">
                <label for="tier">Tier</label>
                <select id="tierInput" name="tier" required>
                    <option value="" selected disabled>Select tier…</option>
                    <option value="s">S</option>
                    <option value="a">A</option>
                    <option value="b">B</option>
                    <option value="c">C</option>
                    <option value="d">D</option>
                </select>
            </div>


            <div class="field">
                <label for="tier_tier">Tier buff</label>
                <select id="tierTierInput" name="tier_tier" required>
                    <option value="" selected disabled>Select tier buff…</option>
                    <option value="+">+</option>
                    <option value="">Normal</option>
                    <option value="-">-</option>
                </select>
            </div>

            <div class="field">
                <label for="description">Description</label>
                <textarea id="description" name="description" rows="5" placeholder="Write the ragebait description…" required></textarea>
            </div>

            <div class="actions">
                <button type="button" class="btn btn-ghost" onclick="history.back()">
                    Back
                </button>

                <button class="btn btn-primary" type="submit">Create</button>
            </div>
        </form>
    </div>
    <div class="preview-card tier-default frame-gold" id="previewCard">
        <div class="preview-content">
            <h3 id="previewTitle">Title preview</h3>

            <div class="preview-image">
                <span>No image selected</span>
                <img id="imagePreview" hidden>
            </div>
            <label for="">Tier:</label>
            <p id="previewTier">TIER PREVIEW</p>
            <label for="desc">Description:</label>
            <p id="previewDescription">Description preview</p>
        </div>
    </div>


</div>
<script>
/* Elements */
const previewCard = document.getElementById('previewCard');

const titleInput = document.getElementById('title');
const descInput  = document.getElementById('description');
const tierInput  = document.getElementById('tierInput');
const tierTierInput = document.getElementById('tierTierInput');
const frameSelect = document.getElementById('frame');
const imageInput = document.getElementById('image');

const previewTitle = document.getElementById('previewTitle');
const previewDescription = document.getElementById('previewDescription');
const previewTier = document.getElementById('previewTier');
const imagePreview = document.getElementById('imagePreview');
const imagePlaceholder = imagePreview.previousElementSibling;

/* Update functions */
function updateTitle() {
  previewTitle.textContent = titleInput.value || 'Title preview';
}

function updateDescription() {
  previewDescription.textContent = descInput.value || 'Description preview';
}

function updateTier() {
  const tier = tierInput.value ? tierInput.value.toUpperCase() : '';
  const mod  = tierTierInput.value || '';
  previewTier.textContent = tier ? tier + mod : 'Tier preview';
}

function updateFrame() {
  previewCard.classList.remove('frame-gold','frame-silver','frame-prismatic');
  previewCard.classList.add(`frame-${frameSelect.value}`);
}

function updateImage() {
  const file = imageInput.files[0];
  if (!file) return;

  const reader = new FileReader();
  reader.onload = e => {
    imagePreview.src = e.target.result;
    imagePreview.hidden = false;
    if (imagePlaceholder) imagePlaceholder.style.display = 'none';
  };
  reader.readAsDataURL(file);
}

/* Event listeners */
titleInput.addEventListener('input', updateTitle);
descInput.addEventListener('input', updateDescription);
tierInput.addEventListener('change', updateTier);
tierTierInput.addEventListener('change', updateTier);
frameSelect.addEventListener('change', updateFrame);
imageInput.addEventListener('change', updateImage);

/* Init */
updateTitle();
updateDescription();
updateTier();
updateFrame();
</script>






@endsection
