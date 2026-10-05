@extends('layouts.app')

@section('title', 'Manage Downloads - City Government of San Pedro')

@section('content')

<section class="admin-page">
    <div class="container">

        <div class="admin-page-header">
            <div>
                <span class="admin-label">ADMINISTRATION</span>
                <h1>Manage Downloads</h1>
                <p>Manage downloadable documents and government resources.</p>
            </div>

            <div class="admin-page-actions">

                <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i>
                    Dashboard
                </a>

                <a href="{{ route('admin.downloads.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-lg"></i>
                    Add Document
                </a>

            </div>
        </div>

        @if(session('success'))

            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-2"></i>
                {{ session('success') }}

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"
                    aria-label="Close"
                ></button>
            </div>

        @endif

        <div class="admin-table-card">

            <div class="table-responsive">

                <table class="table admin-posts-table align-middle">

                    <thead>
                        <tr>
                            <th>Document</th>
                            <th>Category</th>
                            <th>File</th>
                            <th>Status</th>
                            <th>Published</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($documents as $document)

                            <tr>

                                <td>
                                    <div class="post-title">
                                        {{ $document->title }}
                                    </div>

                                    @if($document->description)
                                        <small class="text-muted">
                                            {{ Str::limit($document->description, 80) }}
                                        </small>
                                    @endif
                                </td>

                                <td>
                                    <span class="post-category">
                                        {{ $categories[$document->category] ?? $document->category }}
                                    </span>
                                </td>

                                <td>
                                    <small>
                                        <i class="bi bi-file-earmark"></i>
                                        {{ $document->file_name }}
                                    </small>

                                    @if($document->file_size)
                                        <br>
                                        <small class="text-muted">
                                            {{ number_format($document->file_size / 1024, 1) }} KB
                                        </small>
                                    @endif
                                </td>

                                <td>

                                    @if($document->status === 'published')

                                        <span class="status-badge status-published">
                                            Published
                                        </span>

                                    @else

                                        <span class="status-badge status-draft">
                                            Draft
                                        </span>

                                    @endif

                                    <a
    href="{{ route('admin.downloads.edit', $document) }}"
    class="btn btn-sm btn-outline-primary"
    title="Edit Document"
>
    <i class="bi bi-pencil"></i>
</a>

                                </td>

                                <td>

                                    @if($document->published_at)

                                        {{ $document->published_at->format('M d, Y') }}

                                    @else

                                        &mdash;

                                    @endif

                                </td>

                                <td class="text-end">

                                    @if($document->status === 'published')

                                        <a
                                            href="{{ asset('storage/' . $document->file_path) }}"
                                            class="btn btn-sm btn-outline-success"
                                            target="_blank"
                                            title="View / Download"
                                        >
                                            <i class="bi bi-download"></i>
                                        </a>

                                    @endif

                                    <form
                                        action="{{ route('admin.downloads.destroy', $document) }}"
                                        method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('Are you sure you want to delete this document? This action cannot be undone.');"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn btn-sm btn-outline-danger"
                                            title="Delete Document"
                                        >
                                            <i class="bi bi-trash"></i>
                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="6" class="text-center py-5">

                                    <i class="bi bi-file-earmark-arrow-down admin-empty-icon"></i>

                                    <h5 class="mt-3">
                                        No documents yet
                                    </h5>

                                    <p class="text-muted">
                                        Upload your first downloadable document.
                                    </p>

                                    <a
                                        href="{{ route('admin.downloads.create') }}"
                                        class="btn btn-primary"
                                    >
                                        <i class="bi bi-upload"></i>
                                        Upload Document
                                    </a>

                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>
</section>

@endsection