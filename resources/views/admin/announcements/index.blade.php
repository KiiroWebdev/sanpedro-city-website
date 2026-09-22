@extends('layouts.app')

@section('title', 'Announcements Management')

@section('content')

<section class="admin-page">

    <div class="container-fluid">

        {{-- Header --}}
        <div class="admin-page-header">

            <div>
                <span class="admin-label">
                    <i class="bi bi-megaphone"></i>
                    Content Management
                </span>

                <h1>Announcements</h1>

                <p>
                    Manage public advisories and official announcements.
                </p>
            </div>

            <a
                href="{{ route('admin.announcements.create') }}"
                class="btn btn-primary"
            >
                <i class="bi bi-plus-lg"></i>
                New Announcement
            </a>

        </div>


        {{-- Success Message --}}
        @if(session('success'))

            <div class="alert alert-success">
                <i class="bi bi-check-circle me-2"></i>
                {{ session('success') }}
            </div>

        @endif


        {{-- Announcements Table --}}
        <div class="admin-table-card">

            <div class="table-responsive">

                <table class="table admin-posts-table align-middle">

                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Author</th>
                            <th>Status</th>
                            <th>Published</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($announcements as $announcement)

                            <tr>

                                {{-- Title --}}
                                <td>

                                    <div class="admin-post-title">
                                        {{ $announcement->title }}
                                    </div>

                                    <small class="text-muted">
                                        /announcements/{{ $announcement->slug }}
                                    </small>

                                </td>


                                {{-- Category --}}
                                <td>

                                    <span class="news-category">
                                        {{ $announcement->category }}
                                    </span>

                                </td>


                                {{-- Author --}}
                                <td>
                                    {{ $announcement->author ?? '—' }}
                                </td>


                                {{-- Status --}}
                                <td>

                                    @if($announcement->status === 'published')

                                        <span class="status-badge status-published">
                                            Published
                                        </span>

                                    @else

                                        <span class="status-badge status-draft">
                                            Draft
                                        </span>

                                    @endif

                                </td>


                                {{-- Published Date --}}
                                <td>

                                    @if($announcement->published_at)

                                        {{ $announcement->published_at->format('M d, Y') }}

                                    @else

                                        <span class="text-muted">
                                            —
                                        </span>

                                    @endif

                                </td>


                                {{-- Actions --}}
                                <td>

                                    <div class="admin-table-actions">

                                        {{-- View --}}
                                        @if($announcement->status === 'published')

    <a
        href="{{ route('announcements.show', $announcement->slug) }}"
        class="btn btn-sm btn-outline-primary"
        title="View Announcement"
    >
        <i class="bi bi-eye"></i>
    </a>

@endif


                                        {{-- Edit --}}
                                        <a
                                            href="{{ route(
                                                'admin.announcements.edit',
                                                $announcement
                                            ) }}"
                                            class="btn btn-sm btn-outline-secondary"
                                            title="Edit"
                                        >
                                            <i class="bi bi-pencil"></i>
                                        </a>


                                        {{-- Delete --}}
                                        <form
                                            action="{{ route(
                                                'admin.announcements.destroy',
                                                $announcement
                                            ) }}"
                                            method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm(
                                                'Are you sure you want to delete this announcement?'
                                            );"
                                        >

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="btn btn-sm btn-outline-danger"
                                                title="Delete"
                                            >
                                                <i class="bi bi-trash"></i>
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="6"
                                    class="text-center py-5"
                                >

                                    <div class="text-muted">

                                        <i
                                            class="bi bi-megaphone"
                                            style="font-size: 2rem;"
                                        ></i>

                                        <p class="mt-3 mb-0">
                                            No announcements found.
                                        </p>

                                    </div>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>


            {{-- Pagination --}}
            @if($announcements->hasPages())

                <div class="p-3">
                    {{ $announcements->links() }}
                </div>

            @endif

        </div>

    </div>

</section>

@endsection