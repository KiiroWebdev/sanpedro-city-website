@extends('layouts.app')

@section('title', 'Media Management - City Government of San Pedro')

@section('content')

<section class="admin-page">

    <div class="container">

        <div class="admin-page-header">

            <div>
                <span class="admin-label">
                    ADMINISTRATION
                </span>

                <h1>
                    Media Management
                </h1>

                <p>
                    Upload and manage images used by the website.
                </p>
            </div>

            <div class="admin-page-actions">

                <a
                    href="{{ route('admin.dashboard') }}"
                    class="btn btn-outline-secondary"
                >
                    <i class="bi bi-arrow-left"></i>
                    Dashboard
                </a>

            </div>

        </div>


        {{-- Messages --}}

        @if(session('success'))

            <div class="alert alert-success alert-dismissible fade show">
                <i class="bi bi-check-circle me-2"></i>

                {{ session('success') }}

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"
                ></button>
            </div>

        @endif


        @if(session('error'))

            <div class="alert alert-danger alert-dismissible fade show">
                <i class="bi bi-exclamation-circle me-2"></i>

                {{ session('error') }}

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"
                ></button>
            </div>

        @endif


        @if($errors->any())

            <div class="alert alert-danger">

                <strong>Please check the following:</strong>

                <ul class="mb-0 mt-2">

                    @foreach($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif


        {{-- Upload --}}

        <div class="admin-form-card mb-4">

            <h4 class="mb-3">
                <i class="bi bi-cloud-arrow-up me-2"></i>
                Upload Image
            </h4>

            <form
                action="{{ route('admin.media.store') }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf

                <div class="row align-items-end g-3">

                    <div class="col-md-9">

                        <label
                            for="image"
                            class="form-label"
                        >
                            Select Image
                        </label>

                        <input
                            type="file"
                            name="image"
                            id="image"
                            class="form-control"
                            accept=".jpg,.jpeg,.png,.webp,.gif"
                            required
                        >

                        <div class="form-text">
                            JPG, PNG, WebP or GIF. Maximum size: 5 MB.
                        </div>

                    </div>

                    <div class="col-md-3">

                        <button
                            type="submit"
                            class="btn btn-primary w-100"
                        >
                            <i class="bi bi-upload me-1"></i>
                            Upload Image
                        </button>

                    </div>

                </div>

            </form>

        </div>


      {{-- Media Search --}}

<div class="media-filter-card mb-4">

    <div class="row align-items-center g-3">

        <div class="col-md-8">

            <label for="mediaSearch" class="form-label mb-1">
                <i class="bi bi-search me-1"></i>
                Search Media
            </label>

            <input
                type="search"
                id="mediaSearch"
                class="form-control"
                placeholder="Search by filename..."
                autocomplete="off"
            >

        </div>

        <div class="col-md-4">

            <div class="media-count text-md-end">

                Showing
                <strong id="mediaVisibleCount">
                    {{ count($images) }}
                </strong>
                of
                <strong>{{ count($images) }}</strong>
                images

            </div>

        </div>

    </div>

</div>


{{-- Media Grid --}}

<div class="media-grid" id="mediaGrid">

            @forelse($images as $image)

                <div
    class="media-card"
    data-filename="{{ strtolower($image['filename']) }}"
>

                    <div class="media-preview">

                        <img
                            src="{{ $image['url'] }}"
                            alt="{{ $image['filename'] }}"
                        >

                    </div>

                    <div class="media-info">

                        <div
                            class="media-filename"
                            title="{{ $image['filename'] }}"
                        >
                            {{ $image['filename'] }}
                        </div>

                        <small class="text-muted">

                            @if($image['width'] && $image['height'])
                                {{ $image['width'] }} × {{ $image['height'] }} px
                            @endif

                            @if($image['size'])
                                · {{ number_format($image['size'] / 1024, 1) }} KB
                            @endif

                        </small>


                        <div class="media-actions mt-3">

                            <a
                                href="{{ $image['url'] }}"
                                target="_blank"
                                class="btn btn-sm btn-outline-success"
                                title="View Image"
                            >
                                <i class="bi bi-eye"></i>
                            </a>


                            @if($image['used'])

                                <span
                                    class="badge text-bg-success"
                                    title="This image is currently used by a post"
                                >
                                    <i class="bi bi-link-45deg"></i>
                                    In Use
                                </span>

                            @else

                                <form
                                    action="{{ route('admin.media.destroy', $image['filename']) }}"
                                    method="POST"
                                    class="d-inline"
                                    onsubmit="return confirm('Are you sure you want to delete this image?');"
                                >

                                    @csrf

                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-sm btn-outline-danger"
                                        title="Delete Image"
                                    >
                                        <i class="bi bi-trash"></i>
                                    </button>

                                </form>

                            @endif

                        </div>

                    </div>

                </div>

            @empty

                <div class="media-empty">

                    <i class="bi bi-images"></i>

                    <h4>
                        No images found
                    </h4>

                    <p>
                        Upload your first image above.
                    </p>

                </div>

            @endforelse

            <div
    id="mediaNoResults"
    class="media-empty d-none"
>
    <i class="bi bi-search"></i>

    <h4>
        No images found
    </h4>

    <p>
        Try a different filename or search term.
    </p>
</div>

        </div>

    </div>

</section>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const searchInput = document.getElementById('mediaSearch');
    const mediaCards = document.querySelectorAll('.media-card');
    const visibleCount = document.getElementById('mediaVisibleCount');
    const noResults = document.getElementById('mediaNoResults');

    if (!searchInput) {
        return;
    }

    function filterMedia() {

        const searchTerm = searchInput.value
            .trim()
            .toLowerCase();

        let visible = 0;

        mediaCards.forEach(function (card) {

            const filename =
                card.dataset.filename || '';

            if (filename.includes(searchTerm)) {

                card.style.display = '';

                visible++;

            } else {

                card.style.display = 'none';

            }

        });

        visibleCount.textContent = visible;

        if (visible === 0 && searchTerm !== '') {

            noResults.classList.remove('d-none');

        } else {

            noResults.classList.add('d-none');

        }

    }

    searchInput.addEventListener(
        'input',
        filterMedia
    );

});
</script>

@endsection