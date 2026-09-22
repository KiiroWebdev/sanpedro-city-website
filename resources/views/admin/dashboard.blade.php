@extends('layouts.app')

@section('title', 'Admin Dashboard - City Government of San Pedro')

@section('content')

<section class="admin-page">

    <div class="container">

        {{-- Dashboard Header --}}
        <div class="admin-page-header">

            <div>
                <span class="admin-label">
                    ADMINISTRATION
                </span>

                <h1>
                    Dashboard
                </h1>

                <p>
                    Welcome, {{ session('admin_name') }}.
                </p>
            </div>

            <div>

                <form
                    action="{{ route('admin.logout') }}"
                    method="POST"
                >
                    @csrf

                    <button
                        type="submit"
                        class="btn btn-outline-danger"
                    >
                        <i class="bi bi-box-arrow-right"></i>
                        Logout
                    </button>
                </form>

            </div>

        </div>


        {{-- Dashboard Cards --}}
        <div class="row g-4">

    {{-- Posts --}}
    <div class="col-lg-3 col-md-6">

        <a
            href="{{ route('admin.posts.index') }}"
            class="admin-card"
        >

            <div class="admin-card-icon">
                <i class="bi bi-newspaper"></i>
            </div>

            <div>
                <h3>Posts</h3>

                <p>
                    Manage news and updates
                </p>
            </div>

        </a>

    </div>


    {{-- New Post --}}
    <div class="col-lg-3 col-md-6">

        <a
            href="{{ route('admin.posts.create') }}"
            class="admin-card"
        >

            <div class="admin-card-icon">
                <i class="bi bi-plus-circle"></i>
            </div>

            <div>
                <h3>New Post</h3>

                <p>
                    Create a new news article
                </p>
            </div>

        </a>

    </div>


    {{-- Announcements --}}
    <div class="col-lg-3 col-md-6">

        <a
            href="{{ route('admin.announcements.index') }}"
            class="admin-card"
        >

            <div class="admin-card-icon">
                <i class="bi bi-megaphone"></i>
            </div>

            <div>
                <h3>Announcements</h3>

                <p>
                    Manage public announcements
                </p>
            </div>

        </a>

    </div>


    {{-- Media --}}
    <div class="col-lg-3 col-md-6">

        <a
            href="{{ route('admin.media.index') }}"
            class="admin-card"
        >

            <div class="admin-card-icon">
                <i class="bi bi-images"></i>
            </div>

            <div>
                <h3>Media</h3>

                <p>
                    Manage website images
                </p>
            </div>

        </a>

    </div>

</div>
</section>

@endsection