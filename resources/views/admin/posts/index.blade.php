@extends('layouts.app')

@section('title', 'Manage Posts - City Government of San Pedro')

@section('content')

<section class="admin-page">
    <div class="container">

        <div class="admin-page-header">
            <div>
                <span class="admin-label">ADMINISTRATION</span>
                <h1>Manage Posts</h1>
                <p>Manage news and updates published on the website.</p>
            </div>

            <div class="admin-page-actions">
                <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i>
                    Dashboard
                </a>

                <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-lg"></i>
                    New Post
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
                            <th>Title</th>
                            <th>Category</th>
                            <th>Author</th>
                            <th>Status</th>
                            <th>Published</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($posts as $post)

                            <tr>

                                <td>
                                    <div class="post-title">
                                        {{ $post->title }}
                                    </div>

                                    <small class="text-muted">
                                        {{ $post->slug }}
                                    </small>
                                </td>

                                <td>
                                    <span class="post-category">
                                        {{ $post->category }}
                                    </span>
                                </td>

                                <td>
                                    {{ $post->author ?? '—' }}
                                </td>

                                <td>

                                    @if($post->status === 'published')

                                        <span class="status-badge status-published">
                                            Published
                                        </span>

                                    @else

                                        <span class="status-badge status-draft">
                                            Draft
                                        </span>

                                    @endif

                                </td>

                                <td>

                                    @if($post->published_at)

                                        {{ $post->published_at->format('M d, Y') }}

                                    @else

                                        —

                                    @endif

                                </td>

                                <td class="text-end">

                                    <a
                                        href="{{ route('news.show', $post->slug) }}"
                                        class="btn btn-sm btn-outline-success"
                                        target="_blank"
                                        title="View Post"
                                    >
                                        <i class="bi bi-eye"></i>
                                    </a>

                                    <a
                                        href="{{ route('admin.posts.edit', $post) }}"
                                        class="btn btn-sm btn-outline-primary"
                                        title="Edit Post"
                                    >
                                        <i class="bi bi-pencil"></i>
                                    </a>

                                    <form
    action="{{ route('admin.posts.destroy', $post) }}"
    method="POST"
    class="d-inline"
    onsubmit="return confirm('Are you sure you want to delete this post? This action cannot be undone.');"
>
    @csrf
    @method('DELETE')

    <button
        type="submit"
        class="btn btn-sm btn-outline-danger"
        title="Delete Post"
    >
        <i class="bi bi-trash"></i>
    </button>
</form>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="6" class="text-center py-5">

                                    <i class="bi bi-newspaper admin-empty-icon"></i>

                                    <h5 class="mt-3">
                                        No posts yet
                                    </h5>

                                    <p class="text-muted">
                                        Create your first news article.
                                    </p>

                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

            @if($posts->hasPages())

                <div class="admin-pagination">
                    {{ $posts->links() }}
                </div>

            @endif

        </div>

    </div>
</section>

@endsection