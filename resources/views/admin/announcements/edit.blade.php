@extends('layouts.app')

@section('title', 'Edit Announcement')

@section('content')

<section class="admin-page">

```
<div class="container">

    {{-- Header --}}
    <div class="admin-page-header">

        <div>
            <span class="admin-label">
                <i class="bi bi-megaphone"></i>
                Content Management
            </span>

            <h1>Edit Announcement</h1>

            <p>
                Update this public advisory or official announcement.
            </p>
        </div>

        <a
            href="{{ route('admin.announcements.index') }}"
            class="btn btn-outline-secondary"
        >
            <i class="bi bi-arrow-left"></i>
            Back to Announcements
        </a>

    </div>


    {{-- Validation Errors --}}
    @if($errors->any())

        <div class="alert alert-danger">

            <strong>Please correct the following:</strong>

            <ul class="mb-0 mt-2">

                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

            </ul>

        </div>

    @endif


    {{-- Edit Form --}}
    <div class="admin-form-card">

        <form
            action="{{ route(
                'admin.announcements.update',
                $announcement
            ) }}"
            method="POST"
        >

            @csrf
            @method('PUT')


            {{-- Title --}}
            <div class="mb-4">

                <label
                    for="title"
                    class="form-label"
                >
                    Title
                </label>

                <input
                    type="text"
                    name="title"
                    id="title"
                    class="form-control"
                    value="{{ old('title', $announcement->title) }}"
                    required
                >

            </div>


            {{-- Excerpt --}}
            <div class="mb-4">

                <label
                    for="excerpt"
                    class="form-label"
                >
                    Short Description
                </label>

                <textarea
                    name="excerpt"
                    id="excerpt"
                    class="form-control"
                    rows="3"
                    placeholder="Enter a short description..."
                >{{ old('excerpt', $announcement->excerpt) }}</textarea>

                <div class="form-text">
                    A short summary displayed on the homepage.
                </div>

            </div>


            {{-- Content --}}
            <div class="mb-4">

                <label
                    for="content"
                    class="form-label"
                >
                    Announcement Content
                </label>

                <textarea
                    name="content"
                    id="content"
                    class="form-control"
                    rows="8"
                    placeholder="Write the full announcement here..."
                >{{ old('content', $announcement->content) }}</textarea>

            </div>


            <div class="row">

                {{-- Category --}}
                <div class="col-md-6 mb-4">

                    <label
                        for="category"
                        class="form-label"
                    >
                        Category
                    </label>

                    <select
                        name="category"
                        id="category"
                        class="form-select"
                    >

                        <option
                            value="Announcement"
                            {{ old('category', $announcement->category) === 'Announcement' ? 'selected' : '' }}
                        >
                            Announcement
                        </option>

                        <option
                            value="Public Advisory"
                            {{ old('category', $announcement->category) === 'Public Advisory' ? 'selected' : '' }}
                        >
                            Public Advisory
                        </option>

                        <option
                            value="Notice"
                            {{ old('category', $announcement->category) === 'Notice' ? 'selected' : '' }}
                        >
                            Notice
                        </option>

                        <option
                            value="Advisory"
                            {{ old('category', $announcement->category) === 'Advisory' ? 'selected' : '' }}
                        >
                            Advisory
                        </option>

                    </select>

                </div>


                {{-- Author --}}
                <div class="col-md-6 mb-4">

                    <label
                        for="author"
                        class="form-label"
                    >
                        Author / Office
                    </label>

                    <input
                        type="text"
                        name="author"
                        id="author"
                        class="form-control"
                        value="{{ old('author', $announcement->author) }}"
                        placeholder="Author or office"
                    >

                </div>

            </div>


            <div class="row">

                {{-- Status --}}
                <div class="col-md-6 mb-4">

                    <label
                        for="status"
                        class="form-label"
                    >
                        Status
                    </label>

                    <select
                        name="status"
                        id="status"
                        class="form-select"
                    >

                        <option
                            value="draft"
                            {{ old('status', $announcement->status) === 'draft' ? 'selected' : '' }}
                        >
                            Draft
                        </option>

                        <option
                            value="published"
                            {{ old('status', $announcement->status) === 'published' ? 'selected' : '' }}
                        >
                            Published
                        </option>

                    </select>

                </div>


                {{-- Publication Date --}}
                <div class="col-md-6 mb-4">

                    <label
                        for="published_at"
                        class="form-label"
                    >
                        Publication Date
                    </label>

                    <input
                        type="datetime-local"
                        name="published_at"
                        id="published_at"
                        class="form-control"
                        value="{{ old(
                            'published_at',
                            $announcement->published_at
                                ? $announcement->published_at->format('Y-m-d\TH:i')
                                : ''
                        ) }}"
                    >

                    <div class="form-text">
                        Leave blank to use the current date and time when publishing.
                    </div>

                </div>

            </div>


            {{-- Current URL --}}
            <div class="mb-4">

                <label class="form-label">
                    Public URL
                </label>

                <div class="input-group">

                    <span class="input-group-text">
                        /announcements/
                    </span>

                    <input
                        type="text"
                        class="form-control"
                        value="{{ $announcement->slug }}"
                        readonly
                    >

                </div>

                <div class="form-text">
                    The URL updates automatically if you change the title.
                </div>

            </div>


            {{-- Actions --}}
            <div class="d-flex gap-2 pt-2">

                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    <i class="bi bi-check-lg"></i>
                    Update Announcement
                </button>

                <a
                    href="{{ route('admin.announcements.index') }}"
                    class="btn btn-outline-secondary"
                >
                    Cancel
                </a>

            </div>

        </form>

    </div>

</div>
```

</section>

@endsection
