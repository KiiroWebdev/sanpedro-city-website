@extends('layouts.app')

@section('title', 'Add Download - City Government of San Pedro')

@section('content')

<section class="admin-page">
    <div class="container">

        <div class="admin-page-header">
            <div>
                <span class="admin-label">ADMINISTRATION</span>
                <h1>Add Document</h1>
                <p>Upload a document or resource for public download.</p>
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
                    action="{{ route('admin.downloads.store') }}"
                    method="POST"
                    enctype="multipart/form-data"
                >

                    @csrf

                    <div class="mb-4">
                        <label for="title" class="form-label">
                            Document Title <span class="text-danger">*</span>
                        </label>

                        <input
                            type="text"
                            name="title"
                            id="title"
                            class="form-control"
                            value="{{ old('title') }}"
                            placeholder="e.g. Business Permit Application Form"
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
                            <option value="">Select a category</option>

                            @foreach($categories as $slug => $name)

                                <option
                                    value="{{ $slug }}"
                                    {{ old('category') === $slug ? 'selected' : '' }}
                                >
                                    {{ $name }}
                                </option>

                            @endforeach

                        </select>
                    </div>

                    <div class="mb-4">
    <label for="service_slug" class="form-label">
        Government Service
    </label>

    <select
        name="service_slug"
        id="service_slug"
        class="form-select"
    >
        <option value="">Not linked to a specific service</option>

        @foreach($services as $slug => $name)

            <option
                value="{{ $slug }}"
                {{ old('service_slug') === $slug ? 'selected' : '' }}
            >
                {{ $name }}
            </option>

        @endforeach
    </select>

    <div class="form-text">
        Select a government service if this document is specifically used for that service.
    </div>
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
                            placeholder="Briefly describe this document..."
                        >{{ old('description') }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label for="file" class="form-label">
                            Document File <span class="text-danger">*</span>
                        </label>

                        <input
                            type="file"
                            name="file"
                            id="file"
                            class="form-control"
                            accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.zip"
                            required
                        >

                        <div class="form-text">
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
                                <option value="draft"
                                    {{ old('status', 'draft') === 'draft' ? 'selected' : '' }}>
                                    Draft
                                </option>

                                <option value="published"
                                    {{ old('status') === 'published' ? 'selected' : '' }}>
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
                                value="{{ old('published_at') }}"
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
                            <i class="bi bi-upload"></i>
                            Upload Document
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>
</section>

@endsection