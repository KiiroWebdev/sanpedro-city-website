@extends('layouts.app')

@section('title', 'New Post - City Government of San Pedro')

@section('content')

<section class="admin-page">
    <div class="container">

        <div class="admin-page-header">
            <div>
                <span class="admin-label">ADMINISTRATION</span>
                <h1>New Post</h1>
                <p>Create a new news article or announcement.</p>
            </div>

            <div class="admin-page-actions">
                <a href="{{ route('admin.posts.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i>
                    Back to Posts
                </a>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Please check the following:</strong>

                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="admin-form-card">

            <form
                action="{{ route('admin.posts.store') }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf

                <div class="row g-4">

                    {{-- Title --}}
                    <div class="col-12">
                        <label for="title" class="form-label">
                            Title <span class="text-danger">*</span>
                        </label>

                        <input
                            type="text"
                            id="title"
                            name="title"
                            class="form-control"
                            value="{{ old('title') }}"
                            placeholder="Enter the article title"
                            required
                        >
                    </div>

                    {{-- Excerpt --}}
                    <div class="col-12">
                        <label for="excerpt" class="form-label">
                            Excerpt
                        </label>

                        <textarea
                            id="excerpt"
                            name="excerpt"
                            class="form-control"
                            rows="3"
                            placeholder="Short description of the article..."
                        >{{ old('excerpt') }}</textarea>

                        <div class="form-text">
                            A short summary displayed on the News page and homepage.
                        </div>
                    </div>

                    {{-- Content --}}
                    <div class="col-12">
                        <label for="content" class="form-label">
                            Article Content <span class="text-danger">*</span>
                        </label>

                        <textarea
                            id="content"
                            name="content"
                            class="form-control"
                            rows="12"
                            placeholder="Write your article here..."
                            required
                        >{{ old('content') }}</textarea>
                    </div>

                    {{-- Category --}}
                    <div class="col-md-4">
                        <label for="category" class="form-label">
                            Category <span class="text-danger">*</span>
                        </label>

                        <select
                            id="category"
                            name="category"
                            class="form-select"
                            required
                        >
                            <option value="News" {{ old('category', 'News') === 'News' ? 'selected' : '' }}>
                                News
                            </option>

                            <option value="Announcement" {{ old('category') === 'Announcement' ? 'selected' : '' }}>
                                Announcement
                            </option>

                            <option value="Events" {{ old('category') === 'Events' ? 'selected' : '' }}>
                                Events
                            </option>

                            <option value="Government" {{ old('category') === 'Government' ? 'selected' : '' }}>
                                Government
                            </option>
                        </select>
                    </div>

                    {{-- Author --}}
                    <div class="col-md-4">
                        <label for="author" class="form-label">
                            Author
                        </label>

                        <input
                            type="text"
                            id="author"
                            name="author"
                            class="form-control"
                            value="{{ old('author', session('admin_name')) }}"
                            placeholder="Author name"
                        >
                    </div>

                    {{-- Status --}}
                    <div class="col-md-4">
                        <label for="status" class="form-label">
                            Status <span class="text-danger">*</span>
                        </label>

                        <select
                            id="status"
                            name="status"
                            class="form-select"
                            required
                        >
                            <option value="draft" {{ old('status') === 'draft' ? 'selected' : '' }}>
                                Draft
                            </option>

                            <option value="published" {{ old('status', 'published') === 'published' ? 'selected' : '' }}>
                                Published
                            </option>
                        </select>
                    </div>

                    {{-- Published Date --}}
                    <div class="col-md-6">
                        <label for="published_at" class="form-label">
                            Publication Date
                        </label>

                        <input
                            type="datetime-local"
                            id="published_at"
                            name="published_at"
                            class="form-control"
                            value="{{ old('published_at') }}"
                        >

                        <div class="form-text">
                            Leave blank to use the current date when publishing.
                        </div>
                    </div>

                    {{-- Featured Image --}}

<div class="col-12">

    <label class="form-label">
        Featured Image
    </label>

    <input
        type="hidden"
        name="featured_image"
        id="featured_image"
        value="{{ old('featured_image') }}"
    >

    <div class="featured-image-selector">

        <div
            id="selected-image-preview"
            class="selected-image-preview d-none"
        >
            <img
                id="selected-image"
                src=""
                alt="Selected featured image"
            >

            <div class="selected-image-info">
                <strong id="selected-image-name"></strong>

                <button
                    type="button"
                    class="btn btn-sm btn-outline-danger"
                    id="remove-selected-image"
                >
                    <i class="bi bi-x-lg"></i>
                    Remove
                </button>
            </div>
        </div>


        <div class="featured-image-buttons">

            <button
                type="button"
                class="btn btn-outline-primary"
                data-bs-toggle="modal"
                data-bs-target="#mediaLibraryModal"
            >
                <i class="bi bi-images me-1"></i>
                Choose from Media Library
            </button>

            <span class="text-muted">
                or
            </span>

            <label
                for="featured_image_upload"
                class="btn btn-outline-success mb-0"
            >
                <i class="bi bi-upload me-1"></i>
                Upload New Image
            </label>

            <input
                type="file"
                id="featured_image_upload"
                name="featured_image_upload"
                class="d-none"
                accept=".jpg,.jpeg,.png,.webp,.gif"
            >

        </div>

        <div class="form-text">
            Choose an existing image or upload a new one. Maximum size: 5 MB.
        </div>

    </div>

</div>

                </div>

                <hr class="my-4">

                <div class="d-flex justify-content-end gap-2">

                    <a
                        href="{{ route('admin.posts.index') }}"
                        class="btn btn-outline-secondary"
                    >
                        Cancel
                    </a>

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        <i class="bi bi-check-lg"></i>
                        Save Post
                    </button>

                </div>

            </form>

        </div>

    </div>
</section>

{{-- Media Library Modal --}}

<div
    class="modal fade"
    id="mediaLibraryModal"
    tabindex="-1"
    aria-labelledby="mediaLibraryModalLabel"
    aria-hidden="true"
>

    <div class="modal-dialog modal-xl modal-dialog-scrollable">

        <div class="modal-content">

            <div class="modal-header">

                <h5
                    class="modal-title"
                    id="mediaLibraryModalLabel"
                >
                    <i class="bi bi-images me-2"></i>
                    Select Featured Image
                </h5>

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                ></button>

            </div>


            <div class="modal-body">

                <div class="row g-3">

                    @forelse($images as $image)

                        <div class="col-6 col-md-4 col-lg-3">

                            <button
                                type="button"
                                class="media-selector"
                                data-filename="{{ $image['filename'] }}"
                                data-url="{{ $image['url'] }}"
                            >

                                <img
                                    src="{{ $image['url'] }}"
                                    alt="{{ $image['filename'] }}"
                                >

                                <span>
                                    {{ $image['filename'] }}
                                </span>

                            </button>

                        </div>

                    @empty

                        <div class="col-12 text-center py-5">

                            <i class="bi bi-images fs-1 text-muted"></i>

                            <p class="mt-3 text-muted">
                                No images are currently available.
                            </p>

                        </div>

                    @endforelse

                </div>

            </div>

        </div>

    </div>

</div>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const featuredImage = document.getElementById('featured_image');
    const uploadInput = document.getElementById('featured_image_upload');

    const previewContainer =
        document.getElementById('selected-image-preview');

    const previewImage =
        document.getElementById('selected-image');

    const previewName =
        document.getElementById('selected-image-name');

    const removeButton =
        document.getElementById('remove-selected-image');


    document.querySelectorAll('.media-selector').forEach(function (button) {

        button.addEventListener('click', function () {

            const filename = this.dataset.filename;
            const url = this.dataset.url;

            featuredImage.value = filename;

            previewImage.src = url;
            previewName.textContent = filename;

            previewContainer.classList.remove('d-none');

            uploadInput.value = '';

            const modal =
                bootstrap.Modal.getInstance(
                    document.getElementById('mediaLibraryModal')
                );

            if (modal) {
                modal.hide();
            }

        });

    });


    uploadInput.addEventListener('change', function () {

        if (this.files.length > 0) {

            featuredImage.value = '';

            const file = this.files[0];

            previewImage.src = URL.createObjectURL(file);
            previewName.textContent = file.name;

            previewContainer.classList.remove('d-none');

        }

    });


    removeButton.addEventListener('click', function () {

        featuredImage.value = '';
        uploadInput.value = '';

        previewImage.src = '';
        previewName.textContent = '';

        previewContainer.classList.add('d-none');

    });

});
</script>

@endsection