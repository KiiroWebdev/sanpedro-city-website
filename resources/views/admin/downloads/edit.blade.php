@extends('layouts.app')

@section('title', 'Edit Download - City Government of San Pedro')

@section('content')

<section class="admin-page">
    <div class="container">

        <div class="admin-page-header">
            <div>
                <span class="admin-label">ADMINISTRATION</span>
                <h1>Edit Document</h1>
                <p>Update the downloadable document and its information.</p>
            </div>

            <div class="admin-page-actions">

                <a
                    href="{{ route('admin.downloads.index') }}"
                    class="btn btn-outline-secondary"
                >
                    <i class="bi bi-arrow-left"></i>
                    Back to Downloads
                </a>

            </div>
        </div>

        @if($errors->any())

            <div class="alert alert-danger">
                <strong>Please correct the following errors:</strong>

                <ul class="mb-0 mt-2">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>

        @endif

        <div class="admin-table-card">

            <div class="p-4">

                <form
                    action="{{ route('admin.downloads.update', $download) }}"
                    method="POST"
                    enctype="multipart/form-data"
                >

                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="title" class="form-label">
                            Document Title <span class="text-danger">*</span>
                        </label>

                        <input
                            type="text"
                            name="title"
                            id="title"
                            class="form-control"
                            value="{{ old('title', $download->title) }}"
                            required
                        >
                    </div>

                    <div class="mb-4">
                        <label for="category" class="form-label">
                            Category <span class="text-danger">*</span>
                        </label>

                        <select
                            name="category"
                            id="category"
                            class="form-select"
                            required
                        >
                            @foreach($categories as $slug => $name)

                                <option
                                    value="{{ $slug }}"
                                    {{ old('category', $download->category) === $slug ? 'selected' : '' }}
                                >
                                    {{ $name }}
                                </option>

                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="description" class="form-label">
                            Description
                        </label>

                        <textarea
                            name="description"
                            id="description"
                            class="form-control"
                            rows="4"
                        >{{ old('description', $download->description) }}</textarea>
                    </div>

                    <div class="mb-4">

                        <label class="form-label">
                            Current File
                        </label>

                        <div class="p-3 border rounded bg-light">

                            <i class="bi bi-file-earmark-pdf me-2"></i>

                            <strong>{{ $download->file_name }}</strong>

                            @if($download->file_size)
                                <span class="text-muted ms-2">
                                    ({{ number_format($download->file_size / 1024, 1) }} KB)
                                </span>
                            @endif

                        </div>

                    </div>

                    <div class="mb-4">

                        <label for="file" class="form-label">
                            Replace File
                        </label>

                        <input
                            type="file"
                            name="file"
                            id="file"
                            class="form-control"
                            accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.zip"
                        >

                        <div class="form-text">
                            Leave blank to keep the current file.
                            Allowed formats: PDF, Word, Excel, PowerPoint, and ZIP.
                            Maximum file size: 20 MB.
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-6 mb-4">

                            <label for="status" class="form-label">
                                Status <span class="text-danger">*</span>
                            </label>

                            <select
                                name="status"
                                id="status"
                                class="form-select"
                                required
                            >

                                <option
                                    value="draft"
                                    {{ old('status', $download->status) === 'draft' ? 'selected' : '' }}
                                >
                                    Draft
                                </option>

                                <option
                                    value="published"
                                    {{ old('status', $download->status) === 'published' ? 'selected' : '' }}
                                >
                                    Published
                                </option>

                            </select>

                        </div>

                        <div class="col-md-6 mb-4">

                            <label for="published_at" class="form-label">
                                Publish Date
                            </label>

                            <input
                                type="datetime-local"
                                name="published_at"
                                id="published_at"
                                class="form-control"
                                value="{{ old('published_at', $download->published_at?->format('Y-m-d\TH:i')) }}"
                            >

                            <div class="form-text">
                                Leave blank to publish immediately when status is Published.
                            </div>

                        </div>

                    </div>

                    <div class="d-flex justify-content-end gap-2">

                        <a
                            href="{{ route('admin.downloads.index') }}"
                            class="btn btn-outline-secondary"
                        >
                            Cancel
                        </a>

                        <button
                            type="submit"
                            class="btn btn-primary"
                        >
                            <i class="bi bi-check-lg"></i>
                            Save Changes
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>
</section>

@endsection